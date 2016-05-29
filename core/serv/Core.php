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
       $this->conf = Anatomizer::obtainConfig();
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
?>

  <body class='hold-transition'>
    <div class="container">
      <h1><small>You've successfully logged into:</small><br>Bitcraft Core</h1>
      <h3><em><a href="/Logout/">Logout</a></em></h3>
    </div>
  </body>
</html>
