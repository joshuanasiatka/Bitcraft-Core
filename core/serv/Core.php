<?php
  /**
   * Doc
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class CorePage extends Anatomizer {

     private $conf;
     private static $REQUEST_URI;
     private static $UserID;

     public function __construct() {
       CorePage::$REQUEST_URI  = $_SERVER['REQUEST_URI'];
       CorePage::$UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
     }

     public function attachPage() {
       Anatomizer::buildHead();

       // Get the config file
       $this->conf = Anatomizer::obtainConfig();

       // Get the page contents
       CorePage::pageLinkCortex();
       // Close the page
       Anatomizer::endPage();
       return $this->conf;
     }

     private static function pageLinkCortex() {
       if (strpos(CorePage::$REQUEST_URI, "Core") !== false) {
         if (!parent::checklogin()) {
            parent::sendTo("Login");
            printf("ERROR: UNAUTHORIZED!");
         }
         $permRef = $_SESSION['permRef'];
         in_array('super_admin', $permRef) ? require_once 'parts/Core/adminMsg.php' : require_once 'parts/Auth/unauthorized.php';
       } else {
         require_once 'parts/FrontEnd/build.php';
       }
     }
   }

   $corepage = new CorePage();
   $conf = $corepage->attachPage();
