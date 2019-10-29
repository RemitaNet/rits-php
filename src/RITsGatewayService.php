<?php

namespace com\systemspecs;
// Define a class
include 'Constants/ApplicationUrl.php';
include 'AccountEnquiryPayload.php';
include 'BulkPaymentInfo.php';
include 'BulkPaymentPayload.php';
include 'PaymentDetails.php';
include 'EncryptedBulkInfo.php';
include 'EncryptedPaymentDetails.php';
include 'AuthParams.php';
include 'ValidateOtpPayload.php';
include 'EncyptedAuthParams.php';
include 'Util/AES128CBC.php';
include 'Util/HTTPUtil.php';
include 'BaseResponse.php';

class RITsGatewayService
{

    private $credentials;

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    // GET ACTIVE BANKS
    function activeBanks($payload)
    {
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$activeBanks;
        $result = HTTPUtil::postMethod($url, $headers);
        return $result;
    }

    function accountEnquiry($payload)
    {
        $payload->setAccountNo(AES128CBC::encrypt($payload->getAccountNo(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setBankCode(AES128CBC::encrypt($payload->getBankCode(), $this->credentials->getIv(), $this->credentials->getKey()));
        $data = array(
            'accountNo' => $payload->getAccountNo(),
            'bankCode' => $payload->getBankCode()
        );
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$accountEnquiry;
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function addAccount($payload)
    {
        $payload->setAccountNo(AES128CBC::encrypt($payload->getAccountNo(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setBankCode(AES128CBC::encrypt($payload->getBankCode(), $this->credentials->getIv(), $this->credentials->getKey()));
        $data = array(
            'accountNo' => $payload->getAccountNo(),
            'bankCode' => $payload->getBankCode()
        );
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$addAccount;
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function validateAccountOTP($payload)
    {
        $valueArray = array();
        $values = null;

        for( $i = 0; $i < count($payload->getAuthParams()); $i++ ) {
            $values = AES128CBC::encrypt($payload->getAuthParams()[$i]->getValue(), $this->credentials->getIv(), $this->credentials->getKey());
            array_push($valueArray, $values);
        }
        $payload->setRemitaTransRef(AES128CBC::encrypt($payload->getRemitaTransRef(), $this->credentials->getIv(), $this->credentials->getKey()));
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$validateAccountOTP;
        $data = array(
            'remitaTransRef' => $payload->getRemitaTransRef(),
            'authParams' => $this->checkParam($payload->getAuthParams(), $valueArray)
        );
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function checkParam($authParam, $val){
        if(count($authParam) == 1 and  $authParam[0]->getParam1() == "OTP"){
            $otpParam = array("param1"=>"OTP", "value"=>$val[0]);
            $cardParam = null;
            return array($otpParam);
        }else if(count($authParam) == 1 and  $authParam[0]->getParam1() == "CARD"){
            $cardParam = array("param1"=>"CARD", "value"=>$val[0]);
            $otpParam = null;
            return array($cardParam);
        }else{
            $otpParam = array("param1"=>"OTP", "value"=>$val[0]);
            $cardParam = array("param2"=>"CARD", "value"=>$val[1]);
            return array($otpParam, $cardParam);
        }
    }

    function singlePaymentStatus($payload)
    {
        $payload->setTransRef(AES128CBC::encrypt($payload->getTransRef(), $this->credentials->getIv(), $this->credentials->getKey()));
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$paymentStatusSingle;
        $data = array(
            'transRef' => $payload->getTransRef()
        );
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function bulkPaymentStatus($payload)
    {
        $payload->setbatchRef(AES128CBC::encrypt($payload->getbatchRef(), $this->credentials->getIv(), $this->credentials->getKey()));
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$paymentStatusBulk;
        $data = array(
            'batchRef' => $payload->getbatchRef()
        );
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function singlePayment($payload)
    {
        $payload->setAmount(AES128CBC::encrypt($payload->getAmount(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setBeneficiaryEmail(AES128CBC::encrypt($payload->getBeneficiaryEmail(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setCreditAccount(AES128CBC::encrypt($payload->getCreditAccount(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setDebitAccount(AES128CBC::encrypt($payload->getDebitAccount(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setFromBank(AES128CBC::encrypt($payload->getFromBank(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setNarration(AES128CBC::encrypt($payload->getNarration(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setToBank(AES128CBC::encrypt($payload->getToBank(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->setTransRef(AES128CBC::encrypt($payload->getTransRef(), $this->credentials->getIv(), $this->credentials->getKey()));
        $headers = HTTPUtil::getHeader($this->credentials, $payload);
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$paymentSingle;
        $data = array(
            'amount' => $payload->getAmount(),
            'beneficiaryEmail' => $payload->getBeneficiaryEmail(),
            'creditAccount' => $payload->getCreditAccount(),
            'debitAccount' => $payload->getDebitAccount(),
            'fromBank' => $payload->getFromBank(),
            'narration' => $payload->getNarration(),
            'toBank' => $payload->getToBank(),
            'transRef' => $payload->getTransRef()
        );
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }

    function bulkPayment($payload)
    {
        $payload->getBulkPaymentInfo()->setBankCode(AES128CBC::encrypt($payload->getBulkPaymentInfo()->getBankCode(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->getBulkPaymentInfo()->setBatchRef(AES128CBC::encrypt($payload->getBulkPaymentInfo()->getBatchRef(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->getBulkPaymentInfo()->setDebitAccount(AES128CBC::encrypt($payload->getBulkPaymentInfo()->getDebitAccount(), $this->credentials->getIv(), $this->credentials->getKey()));
        $payload->getBulkPaymentInfo()->setNarration(AES128CBC::encrypt($payload->getBulkPaymentInfo()->getNarration(), $this->credentials->getIv(), $this->credentials->getKey()));

        $totalAmount = null;
        $paymentDetailList = array();
        foreach ($payload->getPaymentDetails() as $value) {

            $encryptedPaymentDetail = new EncryptedPaymentDetails(
                                        AES128CBC::encrypt((string)$value->getAmount(), $this->credentials->getIv(), $this->credentials->getKey()),
                                        AES128CBC::encrypt($value->getBenficiaryAccountNumber(), $this->credentials->getIv(), $this->credentials->getKey()),
                                        AES128CBC::encrypt($value->getBenficiaryBankCode(), $this->credentials->getIv(), $this->credentials->getKey()),
                                        AES128CBC::encrypt($value->getBenficiaryEmail(), $this->credentials->getIv(), $this->credentials->getKey()),
                                        AES128CBC::encrypt($value->getNarration(), $this->credentials->getIv(), $this->credentials->getKey()),
                                        AES128CBC::encrypt($value->getTransRef(), $this->credentials->getIv(), $this->credentials->getKey())

            );
            $totalAmount += $value->getAmount();


            array_push($paymentDetailList, $encryptedPaymentDetail);
        }

        $EncTotalAmount = (AES128CBC::encrypt($totalAmount, $this->credentials->getIv(), $this->credentials->getKey()));
        $encrytedBulkInfo = new EncryptedBulkInfo($EncTotalAmount, $payload->getBulkPaymentInfo()->getBankCode(), $payload->getBulkPaymentInfo()->getBatchRef(),
            $payload->getBulkPaymentInfo()->getDebitAccount(), $payload->getBulkPaymentInfo()->getNarration());

        $headers = HTTPUtil::getHeader($this->credentials, $payload->getBulkPaymentInfo());
        $url = HTTPUtil::configEnvironment($this->credentials) . ApplicationUrl::$paymentBulk;
        $data = array(
            'bulkPaymentInfo' => $encrytedBulkInfo,
            'paymentDetails' => $paymentDetailList,

        );
        $result = HTTPUtil::postMethodWithBody($url, $headers, $data);
        return $result;
    }
}
?>

