<?php
require_once(__ROOT__.'/view/BaseView.php');

class BaseRequest extends BaseView{
    protected $errors;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        else if($property == "properties"){
            $result = array();
            foreach(get_object_vars($this) as $key=>$value){
                if($key != 'errors'){
                    $result[$key] = $value;
                }
            }
            return $result;
        }
    }

    public function rules(){
        return array();
    }

    public function validate(){
        $this->errors = array();
        foreach($this->rules() as $key=>$properties){
            if($key=="mandatory"){
                foreach($properties as $property){
                    if($this->$property == '' || $this->$property == null){
                        array_push($this->errors, $property." must be fill.");
                    }
                }
            }
            else if($key=="numeric"){
                foreach($properties as $property){
                    if(!is_numeric($this->$property)){
                        array_push($this->errors, $property." must be number.");
                    }
                }
            }
        }
        if(count($this->errors)>0){
            return false;
        }
        else return true;
    }
}

?>