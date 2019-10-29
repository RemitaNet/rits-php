<?php

namespace com\systemspecs;
class AccountEnquiryPayload
{
    private $accountNo; //String
    private $bankCode; //String
    private $requestId; //String

    public function __construct($requestId, $accountNo, $bankCode){
        $this->requestId = $requestId;
        $this->accountNo = $accountNo;
        $this->bankCode = $bankCode;
    }

    public function getAccountNo() {
        return $this->accountNo;
    }
    public function setAccountNo($accountNo) {
        $this->accountNo = $accountNo;
    }
    public function getBankCode() {
        return $this->bankCode;
    }
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }
}

?>
