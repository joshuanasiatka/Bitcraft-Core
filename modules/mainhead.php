<?php
$rootdir =  $_SERVER['DOCUMENT_ROOT'];
require_once "$rootdir/modules/config.inc.php";
require_once "$rootdir/modules/authentication/config.php";
require_once "$rootdir/modules/config-func.php";
require_once "$rootdir/modules/authentication/database.php";
require_once "$rootdir/modules/authentication/class.acl.php";

$myACL = new ACL();
$dali = new DALi($conf);
//check if maintenance mode is on
$maint_setting = $dali->loadSetting('maintenance');
$maintenance = $maint_setting[0][2];
$maintenance_msg = $maint_setting[0][1];
$maintenance_show = $maint_setting[0][3];
if ($maintenance_show && !$maintenance)
  echo "<div class='maintenance_msg'>$maintenance_msg</div>";
elseif(($myACL->hasPermission('access_admin')) && $maintenance)
  echo "<div class='maintenance_msg'>Maintenance Mode is On and Active</div>";
$whereami = $_SERVER['REQUEST_URI'];

if($maintenance) {
  if(!$whereami == '/') {
    header("Location: /");
    exit;
  } elseif((!$myACL->hasPermission('access_admin')) && ($whereami != '/')) {
    include_once "$rootdir/modules/admin/maintenance/mode.php";
    exit;
  }
}
//check if logged in
if(!$authenticator->CheckLogin()) {
    $authenticator->RedirectToURL("/login.php");
    exit;
}

//who am i
$whoami = $_SESSION['userID'];
?>
