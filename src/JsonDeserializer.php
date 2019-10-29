<?php

namespace com\systemspecs;
include 'BaseResponse.php';


class JsonDeserializer
{
    public static function Deserialize($json)
    {
        $className = BaseResponse();
        $classInstance = new BaseResponse();
        if (is_string($json))
            $json = json_decode($json);

        foreach ($json as $key => $value) {
            if (!property_exists($classInstance, $key)) continue;

            $classInstance->{$key} = $value;
        }

        return $classInstance;
    }
    /**
     * @param string $json
     * @return $this[]
     */
    public static function DeserializeArray($json)
    {
        $json = json_decode($json);
        $items = [];
        foreach ($json as $item)
            $items[] = self::Deserialize($item);
        return $items;
    }
}