<?php
  /**
   * Doc
   */
   require_once 'core/src/ACL.php';
 	 class Anatomizer extends ACL {

     /**
      * @var $REQUEST_URI initialized by constructor
      * @var $UserID initialized by constructor
      */
     private static $REQUEST_URI;
     private static $UserID;

     public function __construct() {
       Anatomizer::$REQUEST_URI  = $_SERVER['REQUEST_URI'];
       Anatomizer::$UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
     }

     public static function gatherNeeds() {
       session_start();
       Anatomizer::publishCopyright();
       if (Anatomizer::$REQUEST_URI == "/Login/")
         Anatomizer::addLimb("Auth");
       else if (Anatomizer::$REQUEST_URI == "/Logout/")
         ACL::logout();
       else
         Anatomizer::addLimb("Core");
     }

     public static function sendTo($page) {
       header("Location: /$page/");
       exit;
     }

     public static function redirectTo($page) {
       header("Location: $page");
       exit;
     }

     private static function addLimb($limb) {
       require "core/serv/$limb.php";
     }

     public static function buildHead() {
       Anatomizer::publishCopyright();
       return require_once "core/serv/parts/head.php";
     }

     public static function fetchModals($page) {
       return require_once "core/serv/parts/$page/modals.php";
     }

     public static function fetchJS($js) {
       $dependencies = "\r\n";
       $temp = "";
       $files = array(
         'Bootstrap'        => '/core/lib/bower/bootstrap/dist/js/bootstrap.min.js',
         'iCheck'           => '/core/lib/bower/AdminLTE/plugins/iCheck/icheck.min.js',
         'jQuery'           => '/core/lib/bower/jquery/dist/jquery.min.js',
         'Login Validation' => '/core/res/js/loginValidation.js'
       );
       /**
        * @todo Need a better way to include page-specific js
        */
       $more = array(
         'iCheck'           => "
                <script>
                  $(function () {
                    $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                    });
                  });
                </script>"
                              );

       foreach ($js as $req) {
         if (array_key_exists("$req", $files)) {
           $temp = "  <!-- $req -->\r\n";
           $temp .= "  <script src='$files[$req]'></script>\r\n";
           if (array_key_exists("$req", $more))
              $temp .= $more["$req"];
         }
         $dependencies .= $temp;
         $temp = "";
       }
       echo $dependencies;
     }
     public static function obtainConfig() {
       ob_start();
       $config = include 'core/cache/custom/config.php';
       $out = ob_get_clean();
       return $config;
     }

     public static function publishCopyright() {
       return require_once 'core/serv/parts/copyright.php';
     }

     public static function endPage() {
       echo "\r\n</html>";
     }
   }
