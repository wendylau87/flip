<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../helper/Curl.php');
require_once('../view/request/DisbursementRequest.php');
require_once('../view/form/DisbursementForm.php');
require_once('../view/response/DisbursementResponse.php');
require_once('../service/DisbursementService.php');

try{
    $request = new DisbursementRequest();
    $response = new DisbursementResponse();
    $request->properties = $_POST;

    if($request->validate()){
        $curl = new Curl();
        $curl->setHeader(array('Content-Type: application/x-www-form-urlencoded'));
        $result = $curl->post('https://nextar.flip.id/disburse',$request->properties);

        $form = new DisbursementForm();
        $form->properties = (json_decode($result, true));

        $service = new DisbursementService();
        if(!$service->add($form)){
            throw new Exception("Failed save data.");
        }

        $response->status = 'Success';
        $response->message = "Data has been saved.";
    }
    else{
        $response->status = 'Error';
        $response->message = $request->errors[0];
    }

}
catch(Exception $ex){
    $response->status = 'Error';
    $response->message = $ex->getMessage();
}

echo json_encode($response->properties);


?>