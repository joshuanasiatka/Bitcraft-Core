<?php 
	/**
	 * @internal 
	 */
	if (!class_exists('DALi')) {
		/**
		 * @uses Array from config.php file
		 */
		require_once '../cache/custom/config.php';
		class DALi {
			/**
			 * @var $DB_HOST Initialized in Constructor
			 * @var $DB_USER Initialized in Constructor
			 * @var $DB_PASS Initialized in Constructor
			 * @var $DB_NAME Initialized in Constructor
			 */
			private $DB_HOST;
			private $DB_USER;
			private $DB_PASS;
			private $DB_NAME;
			private $rand_key;
			/**
			 * @method Initializing connection variables
			 */
			public function __construct() {
				$this->DB_HOST 	= $conf['sql']['host'];
				$this->DB_USER 	= $conf['sql']['user'];
				$this->DB_PASS 	= $conf['sql']['pass'];
				$this->DB_NAME 	= $conf['sql']['name'];
				$this->rand_key = $conf['security']['rand_key'];
			}
			/**
			 * @method Connects to Database
			 * @return New mysqli Object for database connection
			 */
			protected static function dbconnect() {
				$db = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
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
				return $result;
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
				return $this->rand_key;
			}
		}
	}