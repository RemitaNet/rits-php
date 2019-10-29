<?php

namespace com\systemspecs;
class ActiveBanksPayload
{

    public $requestId; //String

    public function __construct($requestId){
        $this->requestId = $requestId;
    }

    public function getRequestId() {
        return $this->requestId;
    }
    public function setRequestId($requestId) {
        $this->requestId = $requestId;
    }


}

?>
