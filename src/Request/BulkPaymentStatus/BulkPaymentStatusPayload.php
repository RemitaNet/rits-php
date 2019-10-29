<?php

namespace com\systemspecs;
class BulkPaymentStatusPayload
{
    private $batchRef; //String
    private $requestId; //String

    public function __construct($requestId, $batchRef){
        $this->requestId = $requestId;
        $this->batchRef = $batchRef;
    }

    public function getbatchRef() {
        return $this->batchRef;
    }
    public function setbatchRef($batchRef) {
        $this->batchRef = $batchRef;
    }
    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }
}