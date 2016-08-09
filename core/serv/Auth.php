<?php
  /**
   * Doc
   * @todo implement php css for login to change background with custom config.php
   * @todo fix loginValidation
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class AuthPage extends Anatomizer {

     public static $conf;

     public static function init() {
        self::$conf = parent::$conf;
        self::attachPage();
     }
     public static function attachPage() {
       /**
        * @todo make function to fetch page-specific css
        */
       parent::buildHead();
     }
   }

   /**
    * @todo Get DALi constructor working so ACL::init() isn't necessary
    */
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
