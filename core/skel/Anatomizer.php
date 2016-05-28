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

     public function gatherNeeds() {
       session_start();
       Anatomizer::publishCopyright();
      //  if ((!isset($_COOKIE['session'])) && ($this->REQUEST_URI !== "/Login/")) {
      //    Anatomizer::sendTo('Login');
      //  } else
       if ($this->REQUEST_URI == "/Login/") {
         Anatomizer::addLimb("Auth");
       } else if ($this->REQUEST_URI == "/Logout/") {
         ACL::logout();
       } else if ($this->REQUEST_URI == "/Core/") {
         Anatomizer::addLimb("Core");
       } else {
         Anatomizer::sendTo('Core');
       }
     }

     private static function sendTo($page) {
       header("Location: /$page/");
       exit;
     }

     private static function addLimb($limb) {
       require "core/serv/$limb.php";
     }

     public static function buildHead() {
       Anatomizer::publishCopyright();
       return require_once "core/serv/parts/head.php";
     }

     public static function obtainConfig() {
       ob_start();
       $config = include 'core/cache/custom/config.php';
       $out = ob_get_clean();
       return $config;
     }

     public static function publishCopyright() {
       return require_once 'core/serv/parts/Copyright.php';
     }
   }
