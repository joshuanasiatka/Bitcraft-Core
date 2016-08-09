<?php
  /**
   * @uses ACL Class from src
   * @uses Cortex Class from src
   */
  require_once "core/src/ACL.php";
  require_once 'core/src/Cortex.php';
 	class Anatomizer extends ACL {

     /**
      * @var $REQUEST_URI initialized by constructor
      * @var $UserID      initialized by constructor
      * @var $conf        Not sure if needed because of parent
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
       if (self::$REQUEST_URI == "/Login/") {
             self::addLimb("Auth");
             AuthPage::init();
             $conf = AuthPage::$conf;
             $js = array('jQuery',
                         'Bootstrap',
                         'Login Validation',
                         'iCheck');

            $logo = '/core/cache/custom/img/' . $conf['customize']['main_logo'];
            $dark = $conf['customize']['darkmode'];
            $dark == "dark" ? $bodydark = "dark" : $bodydark = "";
            $dark == "dark" ? $darktext = "darktext" : $darktext = "";
            $formatted_coname = $conf['site']['formatted_company_name'];
            require 'core/serv/content/Auth/login.php';
            self::fetchModals("Auth");
            self::fetchJS($js);
        }
       else if (self::$REQUEST_URI == "/Logout/")
         parent::logout();
       else {
         self::addLimb("Core");
         CorePage::init();
        }
     }

     public static function sendTo($page) {
       header("Location: /$page/");
       exit;
     }

     public static function redirectTo($page) {
       header("Location: $page");
       exit;
     }
     /**
      * @param $limb    The end page you require
      * @param $sub     A dividing sub folder if needed to serv. Empty string by default
      * @param $sub_sub A dividing sub folder if needed to $sub. Empty string by default
      */
     private static function addLimb($limb, $sub = '', $sub_sub = '') {
       require "core/serv/$sub$sub_sub$limb.php";
    }

     public static function buildHead() {
       self::publishCopyright();
       $title      = "Bitcraft Core";
       /**
        * @todo Make this a substring replace to represent these examples
        * @example /Login/       => Login
        * @example /Core/Users/  => Core/Users
        */
       $uri        = str_replace('/','',$_SERVER['REQUEST_URI']);
       $pagetitle  = $uri != "/" ? " | $uri" : "";
       $title     .= $pagetitle;
       return require_once "core/serv/content/head.php";
     }

     public static function fetchModals($page) {
       return require_once "core/serv/content/$page/modals.php";
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
       echo $dependencies . '</body></html>';
     }

     public static function publishCopyright() {
       return require_once 'core/serv/content/copyright.php';
     }

     public static function endPage() {
       echo "\r\n</html>";
     }
     private static function getAllSidebarInfo() {
        if(!Cortex::hasDownloadedPackages())
          self::addLimb('BCC_sidebar', 'content/', 'FrontEnd/');
     }
     public static function buildBase() {
        self::addLimb('sidebar', 'content/');
        self::getAllSidebarInfo();
     }
  }
