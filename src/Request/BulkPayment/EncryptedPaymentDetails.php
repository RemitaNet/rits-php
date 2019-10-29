<?php

namespace com\systemspecs;
class EncryptedPaymentDetails
{

    public $amount;
    public $benficiaryAccountNumber; //String
    public $benficiaryBankCode; //String
    public $benficiaryEmail; //String
    public $narration; //String
    public $transRef; //String

    public function __construct($amount, $benficiaryAccountNumber, $benficiaryBankCode,$benficiaryEmail, $narration, $transRef){
        $this->amount = $amount;
        $this->benficiaryAccountNumber = $benficiaryAccountNumber;
        $this->benficiaryEmail = $benficiaryEmail;
        $this->narration = $narration;
        $this->transRef = $transRef;
        $this->benficiaryBankCode = $benficiaryBankCode;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function setAmount($amount) {
        $this->amount = $amount;
    }
    public function getBenficiaryAccountNumber() {
        return $this->benficiaryAccountNumber;
    }
    public function setBenficiaryAccountNumber($benficiaryAccountNumber) {
        $this->benficiaryAccountNumber = $benficiaryAccountNumber;
    }
    public function getBenficiaryBankCode() {
        return $this->benficiaryBankCode;
    }
    public function setBenficiaryBankCode($benficiaryBankCode) {
        $this->benficiaryBankCode = $benficiaryBankCode;
    }
    public function getBenficiaryEmail() {
        return $this->benficiaryEmail;
    }
    public function setBenficiaryEmail($benficiaryEmail) {
        $this->benficiaryEmail = $benficiaryEmail;
    }
    public function getNarration() {
        return $this->narration;
    }
    public function setNarration($narration) {
        $this->narration = $narration;
    }
    public function getTransRef() {
        return $this->transRef;
    }
    public function setTransRef($transRef) {
        $this->transRef = $transRef;
    }

}
?>