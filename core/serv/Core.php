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
  <body class='hold-transition'>
    <div class="container">
      <h1><small>You've successfully logged into:</small><br>Bitcraft Core</h1>
      <h3><em><a href="/Logout/">Logout</a></em></h3>
    </div>
  </body>
</html>
