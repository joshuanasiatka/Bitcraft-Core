<?php
  /**
   * Doc
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class AuthPage extends Anatomizer {

     private $conf;

     public function AttachPage() {
       Anatomizer::BuildHead();
       $this->conf = Anatomizer::ObtainConfig();
       return $this->conf;
     }
   }

   /**
    * @todo Get DALi constructor working so ACL::init() isn't necessary
    */
   ACL::init();
   if (isset($_POST['submitted'])) {
     $error = '<div class="alert alert-danger alert-dismissable" id="error">';
     if (ACL::Login()) {
       printf("Successfully logged in!");
       var_dump($_SESSION);
      //  Anatomizer::SendTo("Core");
      // return true;
     } else {
       $error .= "<button type='button' class='close' data-dismiss='alert'>x</button>";
       $error .= ACL::GetErrorMessage() . '</div>';
     }
   }

   $authpage = new AuthPage();
   $conf = $authpage->AttachPage();
?>
<?php
$logo = '/core/cache/custom/img/' . $conf['customize']['main_logo'];
$dark = $conf['customize']['darkmode'];
$dark == "dark" ? $bodydark = "dark" : $bodydark = "";
$dark == "dark" ? $darktext = "darktext" : $darktext = "";
$login_size = '250';
$formatted_coname = $conf['site']['formatted_company_name'];
$loginHeader = "<p style='padding-top:15px;'><img src='$logo' width='$login_size' /></p>";
$loginHeader .= "<h1>$formatted_coname<br /><small>Login</small></h1>";
?>

<body class="hold-transition skin-blue <?= $bodydark ?>">
  <div class="container <?= $darktext ?>">
    <div class="page-header" style="text-align:center">
        <?= $loginHeader; ?>
    </div>
    <?= isset($error) ? $error : "" ?>
    <div id="error-container"></div>
    <form id='login' role="form" class="col-md-12" action='' name="login_form" method='post' accept-charset='UTF-8'>
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      <div class="form-group has-feedback">
          <input type='text' name='username' class="form-control" id='username' value="<?= isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : ''; ?>" placeholder="Username" />
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span id='login_username_errorloc' class='error'></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
          <span id="show_pass_button" class="glyphicon glyphicon-eye-open form-control-feedback"></span>
          <span id='login_password_errorloc' class='error'></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label class="checkbox icheck">
              <input type="checkbox" name="remember_me" value="1" <?= isset($_COOKIE['remember_me']) ? 'checked' : '' ?>/> Remember Me
            </label>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button name="submit" type="submit" onclick="loginFormValidation();" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div><!-- /.col -->
      </div>
      <div class="form-group">
          <!--<span><a href="javascript:;" data-toggle="modal" data-target="#help">Need help?</a></span>-->
          <span><a href="javascript:;" data-toggle="modal" data-target="#forgot">Forgot Password?</a></span>
      </div>
      <p class="copyright <?= $darktext ?>"><br />powered by <a href='https://bitcraftlabs.net' target="_blank">Bitcraft Core</a></p>
    </form>
  </div>

  <!-- Help Modal -->
  <div id="forgot" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password?</h4>
        </div>
        <div class="modal-body">
          <form id='resetreq' class="col-md-12" action='' method='post' accept-charset='UTF-8'>
            <p>If you forgot your password, enter the email address associated with your account to reset it. A password reset link will be sent to that account.</p>
            <input type='hidden' name='submitted_pass' id='submitted_pass' value='1'/>
            <div class="form-group">
                <input type='text' name='email' class="form-control input-lg" id='email' value='' placeholder="Email Address" />
                <span id='resetreq_email_errorloc' class='error'></span>
            </div>
            <div class="form-group">
                <button name='Submit' type='submit' class="btn btn-primary btn-lg btn-block">Reset Password</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


    <!-- jQuery -->
    <script src="/core/lib/bower/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/core/lib/bower/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/core/lib/bower/AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <script src="/core/res/js/loginValidation.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
