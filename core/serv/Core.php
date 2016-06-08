<?php
  /**
   * Doc
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class CorePage {

     public static $conf;
     private static $REQUEST_URI;
     private static $UserID;

     public static function init() {
       self::$conf = Anatomizer::$conf;
       self::$REQUEST_URI  = $_SERVER['REQUEST_URI'];
       self::$UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
       self::attachPage();
     }

     public static function attachPage() {
       Anatomizer::buildHead();
       // Get the page contents
       self::pageLinkCortex();
       // Builds GUI
       Anatomizer::buildBase();
       // Close the page
       Anatomizer::endPage();
       //return self::$conf;
     }

     private static function pageLinkCortex() {
       if (strpos(self::$REQUEST_URI, "Core") !== false) {
         if (!ACL::checklogin()) {
            Anatomizer::sendTo("Login");
            printf("ERROR: UNAUTHORIZED!");
         }
         $permRef = $_SESSION['permRef'];
         in_array('super_admin', $permRef) ? require_once 'parts/Core/adminMsg.php' : require_once 'parts/Auth/unauthorized.php';
       } else {
         require_once 'parts/FrontEnd/build.php';
       }
     }
   }
   CorePage::init();