<?php
	/**
	 * @uses DALi Class
	 */
	require_once "core/src/DALi.php";
	class ACL extends DALi {

		public static $conf;
		
		public static function init() {
			parent::init();
			self::$conf = parent::$conf;
		}
		/**
		 * @var
		 */
		private static $error_message;
		/**
		 * @return Boolean True if $username and $password are correct
		 */
		public static function login() {
			$username = trim($_POST['username']);
    	    $password = trim($_POST['password']);
    	    if (!isset($_SESSION))
				session_start();
			if (!self::checkLoginInDB($username,$password))
				return false;
			$_SESSION[self::getLoginSessionVar()] = $username;
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
		private static function checkLoginInDB($username, $password) {
	        $nresult = parent::query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
	        $salt = $nresult[0]['salt'];
	        $encrypted_password = $nresult[0]['password'];
	        $hash = self::checkhashSSHA($salt, $password);
	        $query = "SELECT * FROM users WHERE username='$username' AND password='$hash'";
	        $result = parent::query($query);
	        if (!$result) {
	            self::handleError("Error logging in. The username and/or password is incorrect");
	            return false;
	        }
	        $_SESSION['UserID']         = $result[0]['id'];
	        $_SESSION['first_name']     = $result[0]['fname'];
	        $_SESSION['last_name']      = $result[0]['lname'];
	        $_SESSION['name_of_user']   = $result[0]['fname'] ." ". $result[0]['lname'];
	        $_SESSION['username']       = $result[0]['username'];
	        $_SESSION['email_of_user']  = $result[0]['email'];
			self::obtainPermissions($result[0]['id']);
	        return true;
		}
		/**
		 * @param
		 */
		private static function handleError($statement) {
			self::$error_message .= $statement."\r\n";
		}
		/**
		 * @param
		 */
		private static function checkhashSSHA($salt, $pass) {
			return base64_encode(sha1($pass . $salt, true) . $salt);
		}
		/**
		 * @return
		 */
		private static function getLoginSessionVar() {
			$retvar = md5(parent::getRandomKey());
          	return 'usr_'.substr($retvar,0,10);
		}
		/**
		 * @param
		 */
		public static function getErrorMessage() {
			if (empty(self::$error_message)) 
				return '';
			return nl2br(htmlentities(self::$error_message));
		}
		/**
		 * @return
		 */
		public static function checkLogin() {
           $sessionvar = self::getLoginSessionVar();
           if(!isset($_SESSION['UserID']))
              return false;
           return true;
        }
        /**
         * @return
         */
        public static function userFullName() {
            return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
        }
        /**
         * @return
         */
        public static function userFirstName() {
            return isset($_SESSION['first_name'])?$_SESSION['first_name']:'';
        }
        /**
         * @return
         */
        public static function userLastName() {
            return isset($_SESSION['last_name'])?$_SESSION['last_name']:'';
        }
        /**
         * @return
         */
        public static function userEmail() {
            return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
        }
        /**
         * @method
         */
        public static function logOut() {
            session_start();
			session_destroy();
			unlink($_SESSION);
            $sessionvar = self::GetLoginSessionVar();
            $_SESSION[$sessionvar]=NULL;
            unset($_SESSION[$sessionvar]);
    		self::RedirectTo('/Login/');
        }
    		/**
    		 * @method
    		 */
		private static function redirectTo($url) {
			header("Location: $url");
			exit;
		}
        /**
         * @return
         */
        public static function resetPassword() {
            if(empty($_GET['email'])) {
                self::HandleError("Email is empty!");
                return false;
            }
            if(empty($_GET['code'])) {
                self::HandleError("reset code is empty!");
                return false;
            }
            $email = trim($_GET['email']);
            $code = trim($_GET['code']);
            if(self::GetResetPasswordCode($email) != $code) {
                self::HandleError("Bad reset code!");
                return false;
            }
            $user_rec = array();
            if(!self::GetUserFromEmail($email,$user_rec)) {
                return false;
            }
            $new_password = self::ResetUserPasswordInDB($user_rec);
            if(false === $new_password || empty($new_password)) {
                self::HandleError("Error updating new password");
                return false;
            }
           /* if(false == self::SendNewPassword($user_rec,$new_password)) {
                self::HandleError("Error sending new password");
                return false;
            }*/
            return true;
        }
        /**
         * @return
         */
        public function changePassword() {
            if(!self::checkLogin()) {
                self::handleError("Not logged in!");
                return false;
            }
            if(empty($_POST['oldpwd'])) {
                self::handleError("Old password is empty!");
                return false;
            }
            if(empty($_POST['newpwd'])) {
                self::handleError("New password is empty!");
                return false;
            }
            $user_rec = array();
            if(!self::getUserFromEmail($this->userEmail(),$user_rec)) {
                return false;
            }
            $pwd = trim($_POST['oldpwd']);
            $salt = $user_rec['salt'];
            $hash = self::checkhashSSHA($salt, $pwd);
            if($user_rec['password'] != $hash) {
                self::handleError("The old password does not match!");
                return false;
            }
            $newpwd = trim($_POST['newpwd']);
            if(!self::changePasswordInDB($user_rec, $newpwd)) {
                return false;
            }
            return true;
        }
		
		private static function changePasswordInDB($user_rec, $newpwd) {
            $newpwd = $this->sanitizeForSQL($newpwd);
            $hash = $this->hashSSHA($newpwd);
            $new_password = $hash["encrypted"];
            $salt = $hash["salt"];
            $qry = "Update $this->tablename Set password='".$new_password."', salt='".$salt."' Where  id=".$_SESSION['userID']."";
            if (!mysql_query( $qry ,$this->connection)) {
                $this->handleDBError("Error updating the password \nquery:$qry");
                return false;
            }
            return true;
        }

		private static function hashSSHA($password) {
            $salt = sha1(rand());
            $salt = substr($salt, 0, 10);
            $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
           	return array("salt" => $salt, "encrypted" => $encrypted);
        }

		private static function handleDBError($err) {
            $this->handleError($err."\r\n mysqlerror:".mysql_error());
        }

		private static function getResetPasswordCode($email) {
            return substr(md5($email.$this->sitename.$this->rand_key),0,10);
        }

		private static function sanitizeForSQL($str) {
			return addslashes( $str );
        }

		public static function obtainPermissions($UserID) {
			$roles = self::obtainRoles($UserID);
			$permName = array();
			$permID = array();
			$permRef = array();
			foreach ($roles as $role) {
				$sql = "SELECT permissions.ID as permID, permKey, permName
				 				FROM permissions
								INNER JOIN role_perms
								ON role_perms.permID = permissions.ID
								AND role_perms.roleID = $role[0]";
			  $result = parent::query($sql);
				if (!in_array($result[0], $perms))
					array_push($permID, $result[0][0]);
					array_push($permRef, $result[0][1]);
					array_push($permName, $result[0][2]);
			}
			$_SESSION['permID'] = $permID;
			$_SESSION['permRef'] = $permRef;
			$_SESSION['permName'] = $permName;
		}

		public static function obtainRoles($UserID) {
			$sql = "SELECT 	ID as roleID, roleName
					FROM        roles
					INNER JOIN 	user_roles
					WHERE 		user_roles.roleID = roles.ID
					AND 		user_roles.userID = '$UserID'
					ORDER BY 	user_roles.roleID ASC";
			return parent::query($sql);
			// $roles = array();
			// foreach ($result as $role) {
			// 	array_push($roles, $role[1]);
			// }
		}
}
