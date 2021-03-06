<?php
require_once(__ROOT__.'/helper/Connect.php');

class Dao{

    protected $table_name;

    protected $db;

    function __construct()
    {
        $this->db = new Connect("flip");
    }

    public function getTableName(){
        return $this->table_name;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        else if($property == "properties"){
            $result = array();
            foreach(get_object_vars($this) as $key=>$value){
                if(!($key=='db' || $key=='table_name')){
                    $result[$key] = $value;
                }
            }
            return $result;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        else if($property == "properties"){
            foreach($value as $key=>$val){
                $this->$key = $val;
            }
        }

        return $this;
    }

    public function add(){
        $properties = get_object_vars($this);
        $sql1 = "INSERT INTO ".$this->table_name."(";
        $sql2 = "";
        foreach($properties as $key=>$value){
            if(!($key== "table_name" || $key=="id" || $key == "db")){
                if(!($value == ''|| $value == NULL)){
                    $sql1 .= "`$key`,";
                    $sql2 .= "'$value',";
                }
            }
        }
        $sql3 = (rtrim($sql1, ",").") VALUES(".rtrim($sql2, ",").");");
        return $this->db->query($sql3);
    }

    public function update(){
        $properties = get_object_vars($this);
        $sql = "UPDATE ".$this->table_name." SET";

        foreach($properties as $key=>$value){
            if(!($key== "table_name" || $key=="id" || $key == "db")){
                if(!($value == ''|| $value == NULL)){
                    if(is_numeric($value)){
                        $sql .= " `$key` = $value,";
                    }
                    else{
                        $sql .= " `$key` = '$value',";
                    }
                }
            }
        }

        $sql = rtrim($sql,",")." WHERE `id` = $this->id;";
        return $this->db->query($sql);
    }

    public function findByProperty($key, $value){
        $sql = "SELECT * FROM $this->table_name WHERE $key = ";
        if(is_numeric($value)){
            $sql .= "$value;";
        }
        else{
            $sql .= "'$value';";
        }
        $result = $this->db->query($sql);
        $rows = $result->fetch_assoc();

        return $rows;

    }

}

?>