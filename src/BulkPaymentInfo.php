<?php

namespace com\systemspecs;
class BulkPaymentInfo
{
    public $bankCode; //String
    public $batchRef; //String
    public $debitAccount; //String
    public $narration; //String
    public $requestId; //String

    public function __construct($requestId, $bankCode, $batchRef, $debitAccount, $narration){
        $this->requestId = $requestId;
        $this->bankCode = $bankCode;
        $this->batchRef = $batchRef;
        $this->debitAccount = $debitAccount;
        $this->narration = $narration;
    }

    public function getBankCode() {
        return $this->bankCode;
    }
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    public function getBatchRef() {
        return $this->batchRef;
    }
    public function setBatchRef($batchRef) {
        $this->batchRef = $batchRef;
    }
    public function getDebitAccount() {
        return $this->debitAccount;
    }
    public function setDebitAccount($debitAccount) {
        $this->debitAccount = $debitAccount;
    }
    public function getNarration() {
        return $this->narration;
    }
    public function setNarration($narration) {
        $this->narration = $narration;
    }
    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }


}
?>