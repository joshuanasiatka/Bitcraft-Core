<?php
  /**
   * @uses ACL Class from src
   */
   require_once "core/src/ACL.php";
   require_once 'core/src/Cortex.php';
 	 class Anatomizer extends ACL {

     /**
      * @var $REQUEST_URI initialized by constructor
      * @var $UserID initialized by constructor
      * @var
      */
     private static $REQUEST_URI;
     private static $UserID;
     public static $conf;

     public static function init() { 
       parent::init();
       self::$conf = parent::$conf;
       self::$REQUEST_URI  = $_SERVER['REQUEST_URI'];
       self::$UserID       = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
       self::gatherNeeds();
     }

     public static function gatherNeeds() {
       session_start();
       self::publishCopyright();
       if (self::$REQUEST_URI == "/Login/")
         self::addLimb("Auth");
       else if (self::$REQUEST_URI == "/Logout/")
         parent::logout();
       else
         self::addLimb("Core");
     }

     public static function sendTo($page) {
       header("Location: /$page/");
       exit;
     }

     public static function redirectTo($page) {
       header("Location: $page");
       exit;
     }

     private static function addLimb($limb, $sub = '', $sub_sub = '') {
       require "core/serv/$sub$sub_sub$limb.php";
     }

     public static function buildHead() {
       self::publishCopyright();
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

     public static function publishCopyright() {
       return require_once 'core/serv/parts/copyright.php';
     }

     public static function endPage() {
       echo "\r\n</html>";
     }
     private static function getAllSidebarInfo() {
        if(!Cortex::hasDownloadedPackages()) {
          self::addLimb('BCC_sidebar', 'parts/', 'FrontEnd/');
        }
     }
     public static function buildBase() {
        self::addLimb('sidebar', 'parts/');
        self::getAllSidebarInfo();
     }
   }
