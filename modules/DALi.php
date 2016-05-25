<?php
  //ini_set("display_errors", 1);
if ( !class_exists( 'DALi' ) ) {
  class DALi {

    function __construct($config) {
      $this->conf = $config;
    }

    //------------- General --------------->
    private function dbconnect() {
      return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
    }

    public function query($query) {
      $db = $this->dbconnect();
      if($this->checkDbConnect($db)) {
        echo false;
      }
      $result = $db->query($query);
      if(!$result) {
        echo "False";
      }
      while ($row = $result->fetch_array() ) {
        $results[] = $row;
      }
      $result->free();
      $db->close();
      return $results;
    }

    private function queryChange($query) {
      $db = $this->dbconnect();
      if($this->checkDbConnect($db)) {
        return false;
      }
      $db->query($query);
      $db->close();
    }

    private function checkDbConnect($conn) {
      if($conn->connect_errno > 0) {
        die ('Unable to connect to database [' . $conn->connect_error . ']');
      }
    }

    public function loadSetting($setting) {
      if ($setting == "maintenance") {
        $sql = "SELECT * FROM admin_settings WHERE setting='maintenance'";
        $result = $this->query($sql);
        return $result;
      }
    }

    public function getUsers() {
      $sql = "SELECT id, fname, lname, email
              FROM users
              JOIN user_roles
              WHERE users.id = user_roles.userID AND user_roles.roleID <> '2'
              GROUP BY id";
      return $this->query($sql);
    }

    public function getPersonInfo($name){
      if ($name == 'all') {
          $sql = "SELECT * FROM users ORDER BY lname ASC";
      } else {
        $sql = "SELECT * FROM users WHERE id = '$name'";
      }
      return $this->query($sql);
    }
  }
}
?>
