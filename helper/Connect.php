<?php

class Connect{

    private $conn;

    private $servername;

    private $username;

    private $password;

    function __construct(){
        $this->servername = "127.0.0.1";
        $this->username = "root";
        $this->password = "admin";

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->connect_error);
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
        if ($this->conn->query($sql) !== TRUE) {
            error_log($this->conn->error);
            return false;
        } 
        return true;
    }

    public function select($sql){

    }
}

?>