<?php
  /**
   * Doc
   */
   require_once 'core/skel/Anatomizer.php';
   require_once 'core/src/ACL.php';
   class CorePage extends Anatomizer {

     private $conf;

     public function attachPage() {
       Anatomizer::buildHead();

       // Get the config file
       $this->conf = Anatomizer::obtainConfig();

       // Get the page contents
       $permRef = $_SESSION['permRef'];
       in_array('super_admin', $permRef) ? require_once 'parts/Core/adminMsg.php' : require_once 'parts/Auth/unauthorized.php';

       // Close the page
       Anatomizer::endPage();
       return $this->conf;
     }
   }

   $acl = new ACL();
   if (!$acl->checklogin()) {
      Anatomizer::sendTo("Login");
      printf("ERROR: UNAUTHORIZED!");
   }

   $corepage = new CorePage();
   $conf = $corepage->attachPage();
