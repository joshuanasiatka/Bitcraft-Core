<?php
  /**
   * Doc
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class CorePage extends Anatomizer {

     public static $conf;
     private static $REQUEST_URI;
     private static $UserID;

     public static function init() {
       self::$conf = parent::$conf;
       self::$REQUEST_URI  = $_SERVER['REQUEST_URI'];
       self::$UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
       self::attachPage();
     }

     public static function attachPage() {
       parent::buildHead();
       // Get the page contents
       self::pageLinkCortex();
       // Builds GUI
       parent::buildBase();
       // Close the page
       parent::endPage();
       //return self::$conf;
     }

     private static function pageLinkCortex() {
       if (strpos(self::$REQUEST_URI, "Core") !== false) {
         if (!ACL::checklogin()) {
            parent::sendTo("Login");
            printf("ERROR: UNAUTHORIZED!");
         }
         $permRef = $_SESSION['permRef'];
         in_array('super_admin', $permRef) ? require_once 'content/Core/adminMsg.php' : require_once 'content/Auth/unauthorized.php';
       } else {
         require_once 'content/FrontEnd/build.php';
       }
     }
   }
