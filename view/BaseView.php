<?php

class BaseView{
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        else if($property == "properties"){
            $result = array();
            foreach(get_object_vars($this) as $key=>$value){
                $result[$key] = $value;
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
}

?>