<?php

namespace com\systemspecs;

interface Connections
{
    public static function postMethodWithBody($url, $headers, $data);
    public static function postMethod($url, $headers);
}