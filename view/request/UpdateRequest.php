<?php
require_once('BaseRequest.php');

class UpdateRequest extends BaseRequest{

    protected $id;

    public function rules(){

        return array(
            'mandatory'=>array('id'),
        );
    }
}

?>