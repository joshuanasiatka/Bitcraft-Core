<?php
  /**
   * Doc
   * @todo implement php css for login to change background with custom config.php
   * @todo fix loginValidation
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class AuthPage extends Anatomizer {

     private $conf;

     public function attachPage() {
       /**
        * @todo make function to fetch page-specific css
        */
       Anatomizer::buildHead();
       $this->conf = Anatomizer::obtainConfig();
       return $this->conf;
     }
   }

   /**
    * @todo Get DALi constructor working so ACL::init() isn't necessary
    */
   ACL::init();
   if (isset($_POST['submitted'])) {
     $error = '<div class="alert alert-danger alert-dismissable" id="error">';
     if (ACL::login()) {
       printf("Successfully logged in!");
       Anatomizer::sendTo("Core");
     } else {
       $error .= "<button type='button' class='close' data-dismiss='alert'>x</button>";
       $error .= ACL::getErrorMessage() . '</div>';
     }
   }

   $authpage = new AuthPage();
   $conf = $authpage->attachPage();

   $js = array('jQuery',
               'Bootstrap',
               'Login Validation',
               'iCheck');

  $logo = '/core/cache/custom/img/' . $conf['customize']['main_logo'];
  $dark = $conf['customize']['darkmode'];
  $dark == "dark" ? $bodydark = "dark" : $bodydark = "";
  $dark == "dark" ? $darktext = "darktext" : $darktext = "";
  $formatted_coname = $conf['site']['formatted_company_name'];
?>

<body class="<?= $bodydark ?> alt">
  <div class="login">
    <div class="login-area">
      <div class="login-header">
        <img src="<?= $logo ?>" width="60%" />
        <h1><i class="fa fa-sign-in"></i> <?= $formatted_coname ?></h1>
        <p>Login to your Bitcraft Core Account.</p>
      </div>
      <?= isset($error) ? $error : "" ?>
      <form id='login' role="form" class="col-md-12" action='' name="login_form" method='post' accept-charset='UTF-8'>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group has-feedback">
            <input type='text' name='username' class="form-control input-lg" id='username' value="<?= isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : ''; ?>" placeholder="Username" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span id='login_username_errorloc' class='error'></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" />
            <span id="show_pass_button" class="glyphicon glyphicon-eye-open form-control-feedback"></span>
            <span id='login_password_errorloc' class='error'></span>
        </div>
        <div class="checkbox icheck">
          <label class="checkbox icheck">
            <input type="checkbox" name="remember_me" value="1" <?= isset($_COOKIE['remember_me']) ? 'checked' : '' ?>/> Remember Me
          </label>
        </div>
        <div class="form-group addtop">
          <button name="submit" type="submit" onclick="loginFormValidation();" class="btn btn-primary btn-block btn-flat btn-lg">Sign In</button>
        </div><!-- /.col -->
        <div class="form-group">
            <!--<span><a href="javascript:;" data-toggle="modal" data-target="#help">Need help?</a></span>-->
            <span><a href="javascript:;" data-toggle="modal" data-target="#forgot">Forgot Password?</a></span>
        </div>
        <p class="copyright"><br />powered by <a href='https://bitcraftlabs.net' target="_blank">Bitcraft Core</a></p>
      </form>
    </div>

    <footer class="auth">
      <h3>Bitcraft Core Framework | Administrative Portal</h3>
      <p>Login to continue managing the application, maybe add some plugins, or just run some routine maintenance. Idk, just do it!</p>
    </footer>
  </div>

  <?php
    Anatomizer::fetchModals("Auth");
    echo Anatomizer::fetchJS($js);
  ?>

</body>
</html>
