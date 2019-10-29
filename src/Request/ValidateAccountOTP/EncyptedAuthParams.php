<?php

namespace com\systemspecs;
class EncyptedAuthParams
{
    public $param; //String
    public $value; //String

    public function __construct($param, $value){
        $this->param = $param;
        $this->value = $value;
    }

    public function getParam() {
        return $this->param;
    }
    public function setParam($param) {
        $this->param = $param;
    }
    public function getValue() {
        return $this->value;
    }
    public function setValue($value) {
        $this->value = $value;
    }
}
?>