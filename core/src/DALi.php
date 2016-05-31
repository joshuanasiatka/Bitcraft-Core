<?php
	/**
	 * @internal
	 */
	if (!class_exists('DALi')) {
		/**
		 * @uses Array from config.php file
		 */
		class DALi {
			/**
			 * @var $DB_HOST  Initialized in Constructor
			 * @var $DB_USER  Initialized in Constructor
			 * @var $DB_PASS  Initialized in Constructor
			 * @var $DB_NAME  Initialized in Constructor
			 * @var $rand_key Initialized in Constructor
			 */
		  	private static $conf;
			private static $DB_HOST;
			private static $DB_USER;
			private static $DB_PASS;
			private static $DB_NAME;
			private static $rand_key;
			/**
			 * @method Initializing connection variables
			 */
			public function __construct() {
				DALi::init();
			}

 			public static function init() {
				require_once 'core/cache/custom/config.php';
				DALi::$DB_HOST 	= $conf['sql']['host'];
				DALi::$DB_USER 	= $conf['sql']['user'];
				DALi::$DB_PASS 	= $conf['sql']['pass'];
				DALi::$DB_NAME 	= $conf['sql']['name'];
				DALi::$rand_key = $conf['security']['rand_key'];
			}
			/**
			 * @method Connects to Database
			 * @return New mysqli Object for database connection
			 */
			protected static function dbconnect() {
				$db = new mysqli(DALi::$DB_HOST, DALi::$DB_USER, DALi::$DB_PASS, DALi::$DB_NAME);
				if ($db->connect_errno)
					die("Unable to connect to the Database ( " . $db->connect_error . ')');
				else
					return $db;
			}
			/**
			 * @method  SELECTS specific data from SQL database based on $query
			 * @todo  	Find short/better structure for method
			 * @param 	$query SQL statement
			 * @return  Array of Objects based on $query
			 */
			protected static function query($query) {
				$conn = DALi::dbconnect();
				$results = $conn->query($query);
				if (!$results) {
					printf("Unable to query from Database:", $conn->error);
					exit();
				}
				while ($row = $results->fetch_array())
					$result[] = $row;
				$results->free();
				$conn->close();
				return isset($result) ? $result : false;
			}
			/**
			 * @method UPDATE, INSERT, and DELETES specific data from SQL database based on $query
			 * @param  $query SQL statement
			 */
			protected static function DUI($query) {
				$conn = DALi::dbconnect();
				$conn->query($query);
				$conn->close();
			}
			/**
			 * @return String Gets random key
			 */
			protected static function getRandomKey() {
				return DALi::$rand_key;
			}
		}
	}
