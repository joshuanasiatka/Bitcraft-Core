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
        $sql = "SELECT * FROM core_admin_settings WHERE setting='maintenance'";
        $result = $this->query($sql);
        return $result;
      }
    }
  }
}
?>