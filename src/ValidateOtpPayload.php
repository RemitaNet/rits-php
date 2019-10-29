<?php

namespace com\systemspecs;
class ValidateOtpPayload
{
    private $authParams; //AuthParam
    private $remitaTransRef; //String
    private $requestId;

    public function __construct($requestId, $remitaTransRef, $authParams){
        $this->requestId = $requestId;
        $this->remitaTransRef = $remitaTransRef;
        $this->authParams = $authParams;
    }

    public function getAuthParams() {
        return $this->authParams;
    }
    public function setAuthParams($authParams) {
        $this->authParams = $authParams;
    }
    public function getRemitaTransRef() {
        return $this->remitaTransRef;
    }
    public function setRemitaTransRef($remitaTransRef) {
        $this->remitaTransRef = $remitaTransRef;
    }
    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }
}