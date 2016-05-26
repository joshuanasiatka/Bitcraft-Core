<?php
	/**
	* @uses DALi Class
	*
	*/

	require_once 'DALi.php';
	class ACL extends DALi {

		public function __construct() {
			DALi::init();
		}
		/**
		 * @var
		 */
		private static $error_message;
		/**
		 * @return Boolean True if $username and $password are correct
		 */
		public static function Login() {
			$username = trim($_POST['username']);
	    $password = trim($_POST['password']);
	    if (!isset($_SESSION))
				session_start();
			if (!ACL::CheckLoginInDB($username,$password))
				return false;
			$_SESSION[ACL::GetLoginSessionVar()] = $username;
			if (isset($_POST['remember_me']))
				setcookie('remember_me', $username, $year);
			else {
				if (isset($_COOKIE['remember_me'])) {
					$past = time() - 100;
					setcookie('remember_me', gone, $past);
				}
			}
			$_COOKIE['session'] = $_SESSION;
			return true;
		}
		/**
		 * @param
		 * @return
		 */
		private static function CheckLoginInDB($username, $password) {
	        $nresult = parent::query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
	        $salt = $nresult[0]['salt'];
	        $encrypted_password = $nresult[0]['password'];
	        $hash = ACL::checkhashSSHA($salt, $password);
	        $query = "SELECT * FROM users WHERE username='$username' AND password='$hash'";
	        $result = parent::query($query);
	        if (!$result) {
	            ACL::HandleError("Error logging in. The username and/or password is incorrect");
	            return false;
	        }
	        $_SESSION['UserID']         = $result[0]['id'];
	        $_SESSION['first_name']     = $result[0]['fname'];
	        $_SESSION['last_name']      = $result[0]['lname'];
	        $_SESSION['name_of_user']   = $result[0]['fname'] ." ". $result[0]['lname'];
	        $_SESSION['username']       = $result[0]['username'];
	        $_SESSION['email_of_user']  = $result[0]['email'];
	        return true;
		}
		/**
		 * @param
		 */
		private static function HandleError($statement) {
			ACL::$error_message .= $statement."\r\n";
		}
		/**
		 * @param
		 */
		private static function checkhashSSHA($salt, $pass) {
			$hash = base64_encode(sha1($pass . $salt, true) . $salt);
    	return $hash;
		}
		/**
		 * @return
		 */
		private static function GetLoginSessionVar() {
			$retvar = md5(parent::getRandomKey());
      $retvar = 'usr_'.substr($retvar,0,10);
      return $retvar;
		}
		/**
		 * @param
		 */
		public static function GetErrorMessage() {
			if (empty(ACL::$error_message)) {
				return '';
			}
			$errormsg = nl2br(htmlentities(ACL::$error_message));
			return $errormsg;
		}
		/**
		 * @return
		 */
		public static function CheckLogin() {
       $sessionvar = ACL::GetLoginSessionVar();
       if(!isset($_SESSION['UserID']))
          return false;
       return true;
    }
    /**
     * @return
     */
    public static function UserFullName() {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }
    /**
     * @return
     */
    public static function UserFirstName() {

        return isset($_SESSION['first_name'])?$_SESSION['first_name']:'';
    }
    /**
     * @return
     */
    public static function UserLastName() {
        return isset($_SESSION['last_name'])?$_SESSION['last_name']:'';
    }
    /**
     * @return
     */
    public static function UserEmail() {
        return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
    }
    /**
     * @method
     */
    public static function LogOut() {
        session_start();
				session_destroy();
				unlink($_SESSION);
        $sessionvar = ACL::GetLoginSessionVar();
        $_SESSION[$sessionvar]=NULL;
        unset($_SESSION[$sessionvar]);
				ACL::RedirectTo('/Login/');
    }
		/**
		 * @method
		 */
		private static function RedirectTo($url) {
			header("Location: $url");
			exit;
		}
    /**
     * @return
     */
    public static function ResetPassword() {
        if(empty($_GET['email'])) {
            ACL::HandleError("Email is empty!");
            return false;
        }
        if(empty($_GET['code'])) {
            ACL::HandleError("reset code is empty!");
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        if(ACL::GetResetPasswordCode($email) != $code) {
            ACL::HandleError("Bad reset code!");
            return false;
        }
        $user_rec = array();
        if(!ACL::GetUserFromEmail($email,$user_rec)) {
            return false;
        }
        $new_password = ACL::ResetUserPasswordInDB($user_rec);
        if(false === $new_password || empty($new_password)) {
            ACL::HandleError("Error updating new password");
            return false;
        }
       /* if(false == ACL::SendNewPassword($user_rec,$new_password)) {
            ACL::HandleError("Error sending new password");
            return false;
        }*/
        return true;
    }
    /**
     * @return
     */
    function ChangePassword() {
        if(!ACL::CheckLogin()) {
            ACL::HandleError("Not logged in!");
            return false;
        }
        if(empty($_POST['oldpwd'])) {
            ACL::HandleError("Old password is empty!");
            return false;
        }
        if(empty($_POST['newpwd'])) {
            ACL::HandleError("New password is empty!");
            return false;
        }
        $user_rec = array();
        if(!ACL::GetUserFromEmail($this->UserEmail(),$user_rec)) {
            return false;
        }
        $pwd = trim($_POST['oldpwd']);
        $salt = $user_rec['salt'];
        $hash = ACL::checkhashSSHA($salt, $pwd);
        if($user_rec['password'] != $hash) {
            ACL::HandleError("The old password does not match!");
            return false;
        }
        $newpwd = trim($_POST['newpwd']);
        if(!ACL::ChangePasswordInDB($user_rec, $newpwd)) {
            return false;
        }
        return true;
    }
}
