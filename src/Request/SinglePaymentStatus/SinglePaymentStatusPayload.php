<?php

namespace com\systemspecs;
class SinglePaymentStatusPayload
{
    private $transRef; //String
    private $requestId; //String

    public function __construct($requestId, $transRef){
        $this->requestId = $requestId;
        $this->transRef = $transRef;
    }

    public function getTransRef() {
        return $this->transRef;
    }
    public function setTransRef($transRef) {
        $this->transRef = $transRef;
    }
    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }

}