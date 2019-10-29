<?php

namespace com\systemspecs;
class ValidateAccountOTPRequest
{
    public $remitaTransRef;

    public $authParams = Array(
        AuthParams::class
    );

    // array( AuthParams )
    public function getAuthParams()
    {
        return $this->authParams;
    }

    public function setAuthParams($authParams)
    {
        $this->authParams = $authParams;
    }
}

?>
