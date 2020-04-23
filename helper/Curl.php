<?php

class Curl{

    private $_ch;

    function __construct(){
        $this->_ch = curl_init();
    }

    public function setHeader($headers=array()){
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $headers);
    }

    public function post($url, $fields=array()){
        curl_setopt($this->_ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($this->_ch, CURLOPT_URL, $url);
        curl_setopt($this->_ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->_ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->_ch, CURLOPT_POST, true);
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($this->_ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->_ch, CURLOPT_USERNAME, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");
        $output = curl_exec($this->_ch);
        
        return $output;
    }

}

?>