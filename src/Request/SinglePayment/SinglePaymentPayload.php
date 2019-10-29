<?php

namespace com\systemspecs;
class SinglePaymentPayload
{

    public $amount; //Float
    public $beneficiaryEmail; //String
    public $creditAccount; //String
    public $debitAccount; //String
    public $fromBank; //String
    public $narration; //String
    public $requestId; //String
    public $toBank; //String
    public $transRef; //String

    public function __construct($requestId, $amount, $beneficiaryEmail, $creditAccount, $debitAccount,
        $fromBank, $narration, $toBank, $transRef){

        $this->requestId = $requestId;
        $this->amount = $amount;
        $this->beneficiaryEmail = $beneficiaryEmail;
        $this->creditAccount = $creditAccount;
        $this->debitAccount = $debitAccount;
        $this->fromBank = $fromBank;
        $this->narration = $narration;
        $this->toBank = $toBank;
        $this->transRef = $transRef;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function setAmount($amount) {
        $this->amount = $amount;
    }
    public function getBeneficiaryEmail() {
        return $this->beneficiaryEmail;
    }
    public function setBeneficiaryEmail($beneficiaryEmail) {
        $this->beneficiaryEmail = $beneficiaryEmail;
    }
    public function getCreditAccount() {
        return $this->creditAccount;
    }
    public function setCreditAccount($creditAccount) {
        $this->creditAccount = $creditAccount;
    }
    public function getDebitAccount() {
        return $this->debitAccount;
    }
    public function setDebitAccount($debitAccount) {
        $this->debitAccount = $debitAccount;
    }
    public function getFromBank() {
        return $this->fromBank;
    }
    public function setFromBank($fromBank) {
        $this->fromBank = $fromBank;
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
    public function getToBank() {
        return $this->toBank;
    }
    public function setToBank($toBank) {
        $this->toBank = $toBank;
    }
    public function getTransRef() {
        return $this->transRef;
    }
    public function setTransRef($transRef) {
        $this->transRef = $transRef;
    }

}