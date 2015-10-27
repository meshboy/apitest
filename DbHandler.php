<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/26/15
 * Time: 10:26 PM
 */

namespace apiClass;

include 'config.php';

class DbHandler {

    private $host;
    private $username;
    private $password;
    private $dbName;
    private $tableName;
    private $con;
    private $query;

    public function __construct($host, $username, $password) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->con = mysql_connect($this->host, $this->username, $this->password) or die("Could not connect to " + $this->host);
    }

    public function setTable($table_name) {
        $this->tableName = $table_name;
    }

    public function closeDb() {
        if (isset($this->con)) {
            mysql_close($this->con);
            unset($this->con);
        }
    }

    public function selectDatabase($dbName) {
        $this->dbName = $dbName;
        mysql_select_db($this->dbName, $this->con) or die("Could not select database" + $this->dbName);
    }

    public function query($query){
        return $this->query = @mysql_query($query,$this->con);
    }
}
