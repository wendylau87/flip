<?php
require_once('../model/Disbursement.php');

class DisbursementService{

    public function add(DisbursementForm $disbursementForm){
        $disbursement = new Disbursement;
        $disbursement->created = date("Y-m-d H:i:s");
        $disbursement->response_id = $disbursementForm->id;
        $disbursement->response_amount = $disbursementForm->amount;
        $disbursement->response_timestamp = $disbursementForm->timestamp;
        $disbursement->response_bank_code = $disbursementForm->bank_code;
        $disbursement->response_account_number = $disbursementForm->account_number;
        $disbursement->response_beneficiary_name = $disbursementForm->beneficiary_name;
        $disbursement->response_remark = $disbursementForm->remark;
        $disbursement->response_receipt = $disbursementForm->receipt;
        $disbursement->response_time_served = $disbursementForm->time_served;
        $disbursement->response_fee = $disbursementForm->fee;
        
        if(!$disbursement->add()){
            return false;
        }

        return $disbursement; 
    }

}

?>