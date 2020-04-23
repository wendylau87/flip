<?php
class Connect{

    private $conn;

    private $servername;

    private $username;

    private $password;

    function __construct($dbName=null){
        $string = file_get_contents("../config.json");
        $json = json_decode($string);
        $this->servername = $json->host;
        $this->username = $json->username;
        $this->password = $json->password;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->connect_error);
        }

        if($dbName!=NULL){
            $this->conn->select_db($dbName);
        }
    }


    public function multiQuery($sql){
        if ($this->conn->multi_query($sql) !== TRUE) {
            error_log($this->conn->error);
            return false;
        } 
        return true;
    }

    public function query($sql){
        $result = $this->conn->query($sql);
        if (is_bool($result) && $result !== TRUE) {
            error_log($this->conn->error);
            return false;
        }
        else if(is_bool($result) && $result===true){
            return true;
        } 
        
        return $result;
    }

    public function selectDb($dbName){
        $this->conn->select_db($dbName);
    }
}

?>