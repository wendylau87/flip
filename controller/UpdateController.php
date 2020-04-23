<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../helper/Curl.php');
require_once('../view/request/UpdateRequest.php');
require_once('../view/form/UpdateForm.php');
require_once('../view/response/UpdateResponse.php');
require_once('../service/DisbursementService.php');

try{
    $request = new UpdateRequest();
    $response = new UpdateResponse();
    $request->properties = $_GET;

    if($request->validate()){
        $curl = new Curl();
        $curl->setHeader(array('Content-Type: application/x-www-form-urlencoded'));
        $result = $curl->get('https://nextar.flip.id/disburse/'.$request->id);
        $form = new UpdateForm();
        $form->properties = (json_decode($result, true));
    
        $service = new DisbursementService();
        if(!$service->update($form)){
            throw new Exception("Failed save data.");
        }

        $response->status = 'Success';
        $response->message = "Data has been updated.";
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