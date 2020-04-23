<?php
require_once('BaseRequest.php');

class DisbursementRequest extends BaseRequest{

    protected $bank_code;

    protected $account_number;

    protected $amount;

    protected $remark;

    public function rules(){

        return array(
            'mandatory'=>array('bank_code','account_number', 'amount', 'remark'),
            'numeric'=>array('amount')
        );
    }
}

?>