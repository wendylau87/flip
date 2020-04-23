<?php
require_once(__ROOT__.'/view/BaseView.php');

class DisbursementForm extends BaseView{
    protected $id;

    protected $amount;

    protected $timestamp;

    protected $bank_code;

    protected $account_number;
    
    protected $beneficiary_name;

    protected $remark;

    protected $receipt;

    protected $time_served;

    protected $fee;
}

?>