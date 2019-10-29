<?php

namespace com\systemspecs;
class BaseResponse
{
    public $data; //Datum
    public $status; //String

    public function __construct($status, $data){
        $this->status = $status;
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }

    public static function createFromJson( $jsonString )
    {
        $object = json_decode( $jsonString );
        return new self( $object->status, $object->data );
    }

}

?>
