<?php

namespace com\systemspecs;

class Credentials
{
    private $apiKey;

    private $apiToken;

    private $merchantId;

    private $key;

    private $iv;

    private $environment;



    public function getApiKey(){
        return $this->apiKey;
    }

    public function setApiKey($apiKey){
        $this->apiKey = $apiKey;
    }

    public function getTimeStamp(){
        return $this->timeStamp;
    }

    public function setTimeStamp($timeStamp){
        $this->timeStamp = $timeStamp;
    }

    public function getMerchantId(){
        return $this->merchantId;
    }

    public function setMerchantId($merchantId){
        $this->merchantId = $merchantId;
    }

    public function getKey(){
        return $this->key;
    }

    public function setKey($key){
        $this->key = $key;
    }

    public function getIv(){
        return $this->iv;
    }

    public function setIv($iv){
        $this->iv = $iv;
    }

    public function getEnvironment(){
        return $this->environment;
    }

    public function setEnvironment($environment){
        $this->environment = $environment;
    }

    public function getApiToken(){
        return $this->apiToken;
    }

    public function setApiToken($apiToken){
        $this->apiToken = $apiToken;
    }


}

?>

