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
        $disbursement->response_status = $disbursementForm->status;
        
        if(!$disbursement->add()){
            return false;
        }

        return $disbursement; 
    }

    public function update(UpdateForm $updateForm){
        $disbursement = new Disbursement;
        $disbursement->properties = $disbursement->findByProperty('response_id',$updateForm->id);
        $disbursement->response_receipt = $updateForm->receipt;
        $disbursement->response_time_served = $updateForm->time_served;
        $disbursement->response_status = $updateForm->status;
        if(!$disbursement->update()){
            return false;
        }
        return $disbursement;

    }

}

?>