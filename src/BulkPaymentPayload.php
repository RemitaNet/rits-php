<?php

namespace com\systemspecs;
class BulkPaymentPayload
{
    public $bulkPaymentInfo; //BulkPaymentInfo
    public $paymentDetails; //PaymentDetail

    public function __construct($bulkPaymentInfo, $paymentDetails){
        $this->bulkPaymentInfo = $bulkPaymentInfo;
        $this->paymentDetails = $paymentDetails;
    }

    public function getBulkPaymentInfo() {
        return $this->bulkPaymentInfo;
    }
    public function setBulkPaymentInfo($bulkPaymentInfo) {
        $this->bulkPaymentInfo = $bulkPaymentInfo;
    }
    public function getPaymentDetails() {
        return $this->paymentDetails;
    }
    public function setPaymentDetails($paymentDetails) {
        $this->paymentDetails = $paymentDetails;
    }
}