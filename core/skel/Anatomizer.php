<?php
  /**
   * Doc
   */
   require_once 'core/src/ACL.php';
 	 class Anatomizer extends ACL {

     /**
      * @var REQUEST_URI initialized by constructor
      * @var UserID initialized by constructor
      */
     private $REQUEST_URI;
     private $UserID;

     public function __construct() {
       $this->REQUEST_URI  = $_SERVER['REQUEST_URI'];
       $this->UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
     }

     public function GatherNeeds() {
       session_start();
       Anatomizer::PublishCopyright();
      //  if ((!isset($_COOKIE['session'])) && ($this->REQUEST_URI !== "/Login/")) {
      //    Anatomizer::SendTo('Login');
      //  } else
       if ($this->REQUEST_URI == "/Login/") {
         Anatomizer::AddLimb("Auth");
       } else if ($this->REQUEST_URI == "/Logout/") {
         ACL::Logout();
       } else if ($this->REQUEST_URI == "/Core/") {
         Anatomizer::AddLimb("Core");
       } else {
         Anatomizer::SendTo('Core');
       }
     }

     private static function SendTo($page) {
       header("Location: /$page/");
       exit;
     }

     private static function AddLimb($limb) {
       require "core/bits/$limb.php";
     }

     public static function BuildHead() {
       Anatomizer::PublishCopyright();
       return require_once "core/bits/pieces/head.php";
     }

     public static function ObtainConfig() {
       ob_start();
       $config = include 'core/cache/custom/config.php';
       $out = ob_get_clean();
       return $config;
     }

     public static function PublishCopyright() {
       return require_once 'core/bits/pieces/Copyright.php';
     }
   }
