<?php

namespace com\systemspecs;

include "Util/Connections.php";

class HTTPUtil implements Connections
{
    public static function getMethod($url, $headers)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function getTimeStamp()
    {
//        $dateTime = new DateTime();
        $date = date('Y-m-d');
        $time = date('H:i:s');
        return $date . "T" . $time .'+000000';
    }

    public static function getHeader($credentials, $payload)
    {
        $hashString = $credentials->getApiKey() . $payload->getRequestId() . $credentials->getApiToken();
        $apiHash = hash('sha512', $hashString);
        $headers = array(
            'Content-Type: application/json',
            'API_KEY:' . $credentials->getApiKey(),
            'REQUEST_ID:' . $payload->getRequestId(),
            'REQUEST_TS:' . HTTPUtil::getTimeStamp(),
            'API_DETAILS_HASH:' . $apiHash,
            'MERCHANT_ID:' . $credentials->getMerchantId()
        );
        return $headers;
    }

    public static function configEnvironment($credentials)
    {
        if ($credentials->getEnvironment() == "LIVE") {
            return $url = "https://login.remita.net/remita/exapp/api/v1/send/api/rpgsvc/rpg/api/v2/";
        }
        else{
            return $url = "https://remitademo.net/remita/exapp/api/v1/send/api/rpgsvc/rpg/api/v2/";
        }
    }

    public static function postMethodWithBody($url, $headers, $data)
    {
        try{
            $ch = curl_init();
            $repos_params_json = json_encode($data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $repos_params_json);
            $result = curl_exec($ch);
            curl_close($ch);
            $baseResponse = json_decode($result, BaseResponse::class);
            return $baseResponse;
        }catch (Exception $e){
            echo "An Error Occur While Connecting to Remita Service";
        }
        // TODO: Implement postMethodWithBody() method.

    }

    public static function postMethod($url, $headers)
    {
        // TODO: Implement postMethod() method.
        try{
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            $result = curl_exec($curl);
            curl_close($curl);
            $baseResponse = json_decode($result, BaseResponse::class);
            return $baseResponse;
        }catch (Exception $e){
            echo "An Error Occur Connecting to Remita";
        }

    }
}
?>