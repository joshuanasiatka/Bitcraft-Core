<?php ini_set("display_errors", true); ?>
<!DOCTYPE html>
<!--
Project:    Bitcraft Core
Lead Devs:  Joshua Nasiatka, Eugene Duffy, Allen Perry
For:        Bitcraft Labs
Dev Date:   2016
Status:     Still in [Alpha] Development
-->
<?php
  include("modules/mainhead.php");
  //redirect per certain permissions
  if ($myACL->hasPermission('super_admin')) {
    echo "If page is stuck, click <a href='Admin.php'>here</a> to continue.";
    header("location: ../Admin.php");
    exit;
  } else {
    echo "You are not entitled to use this system. Please contact your administrator!";
    exit;
  }
?>
<html>
<?php
include_once 'modules/head.php'; 
?>
<body></body>
</html>
