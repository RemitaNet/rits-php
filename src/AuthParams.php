<?php

namespace com\systemspecs;
class AuthParams
{
    public $param1; //String
//    public $param2; //String
    public $value; //String


    public function __construct(){

    }

    public function getParam1() {
        return $this->param1;
    }
    public function setParam1($param1) {
        $this->param1 = $param1;
    }

    public function getValue() {
        return $this->value;
    }
    public function setValue($value) {
        $this->value = $value;
    }
}
?>