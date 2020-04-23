<?php
require_once('Dao.php');

class Disbursement extends Dao{
    protected $id;
    
    protected $created;

    protected $updated;

    protected $response_id;

    protected $response_amount;

    protected $response_timestamp;

    protected $response_bank_code;

    protected $response_account_number;
    
    protected $response_beneficiary_name;

    protected $response_remark;

    protected $response_receipt;

    protected $response_time_served;

    protected $response_fee;
    

    function __construct()
    {
        $this->table_name = 'disbursement';
        parent::__construct();
    }
      
}


?>