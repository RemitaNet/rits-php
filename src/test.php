<?php
namespace com\systemspecs;


include 'RITsGatewayService.php';
include 'Request/ActiveBanks/ActiveBanksPayload.php';
include 'Request/AddAccount/AddAccountPayload.php';
include 'Request/SinglePaymentStatus/SinglePaymentStatusPayload.php';
include 'Request/BulkPaymentStatus/BulkPaymentStatusPayload.php';
include 'Request/SinglePayment/SinglePaymentPayload.php';
include 'Credentials.php';
class TestRITSServices
{

    function test()
    {
        // INIT CREDENTIALS
        $credentials = new Credentials();
        $credentials->setMerchantId("KUDI1234");
        $credentials->setApiKey("S1VESTEyMzR8S1VESQ==");
        $credentials->setApiToken("dWFBTVVGTGZRUEZaemRvVC8wYVNuRkVTc2REVi9GWGdCMHRvWHNXTnovaz0=");
        $credentials->setKey("cymsrniuxqtgfzva");
        $credentials->setIv("czidrfwqugpaxvkj");
        $credentials->setEnvironment("DEMO");

        $remitaGatewayService = new RITsGatewayService($credentials);

        // ACTIVE BANKS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $requestId = "1379767296987996587548970333";
//        $payload =  new ActiveBanksPayload($requestId);
//        $response = $remitaGatewayService->activeBanks($payload);
//        return $response;

        // ACCOUNT INQUIRY++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $requestId = "1378365366997340333";
//        $accountNo = "057200559446";
//        $bankCode = "057";
//        $accountEnquiryPayload = new AccountEnquiryPayload($requestId, $accountNo, $bankCode);
//        $response = $remitaGatewayService->accountEnquiry($accountEnquiryPayload);
//        return $response;

        // ADD ACCOUNT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $requestId = "1113797698372654888970333";
//        $accountNo = "057200559446";
//        $bankCode = "057";
//        $addAccountPayload = new AddAccountPayload($requestId, $accountNo, $bankCode);
//        $response = $remitaGatewayService->addAccount($addAccountPayload);
//        return $response;

        // VALIDATE ACCOUNT OTP++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $otp = "1234";
//        $card = "0441234567890";
//        $remitaTransRef = "MTU3MjI3NzgzMDE5NA==";
//        $requestId = "6331149678076989830908s8";
//
//        $authParam1 = new AuthParams();
//        $authParam1->setParam1("OTP");
//        $authParam1->setValue($otp);
//
//        $authParam2 = new AuthParams();
//        $authParam2->setParam1("CARD");
//        $authParam2->setValue($card);
//
//        $validateOtpPayload = new ValidateOtpPayload($requestId, $remitaTransRef, array($authParam1, $authParam2));
//        $response = $remitaGatewayService->validateAccountOTP($validateOtpPayload);
//        return $response;

        // SINGLE PAYMENT STATUS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//         $requestId = "163349809866309879808s8";
//         $transRef = "1140894833434209";
//         $singlePaymentStatusPayload = new SinglePaymentStatusPayload($requestId, $transRef);
//         $response = $remitaGatewayService->singlePaymentStatus($singlePaymentStatusPayload);
//         return $response;

        // BULK PAYMENT STATUS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//         $requestId = "15ii332847ee6723uu2924r33sd13963608411";
//         $batchRef = "134423426987455379773111";
//         $bulkPaymentStatusPayload = new BulkPaymentStatusPayload($requestId, $batchRef);
//         $response = $remitaGatewayService->bulkPaymentStatus($bulkPaymentStatusPayload);
//         return $response;

        // PAYMENT SINGLE++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $fromBank = "044";
//        $debitAccount = "1234565678";
//        $toBank = "058";
//        $creditAccount = "0582915208017";
//        $narration = "Regular Payment";
//        $amount = 5000;
//        $beneficiaryEmail = "qa@test.com";
//        $requestId = "117423373998087230";
//        $transRef = "114089488333434209";
//        $singlePaymentPayload = new SinglePaymentPayload($requestId, $amount, $beneficiaryEmail, $creditAccount, $debitAccount,
//            $fromBank, $narration, $toBank, $transRef);
//        $response = $remitaGatewayService->singlePayment($singlePaymentPayload);
//        return $response;

        // PAYMENT BULK ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//        $transRef1 = rand();
//        $narration1 = "Regular Payment";
//        $amount1 = 5000;
//        $benficiaryEmail1 = "qa@test.com";
//        $benficiaryBankCode1 = "058";
//        $benficiaryAccountNumber1 = "0582915208017";
//        $paymentDetails1 = new PaymentDetails($amount1, $benficiaryAccountNumber1, $benficiaryBankCode1, $benficiaryEmail1, $narration1, $transRef1);
//
//        $transRef2 = rand();
//        $narration2 = "Regular Payment";
//        $amount2 = 6000;
//        $benficiaryEmail2 = "qa@test.com";
//        $benficiaryBankCode2 = "058";
//        $benficiaryAccountNumber2 = "0582915208015";
//        $paymentDetails2 = new PaymentDetails($amount2, $benficiaryAccountNumber2, $benficiaryBankCode2, $benficiaryEmail2, $narration2, $transRef2);
//
//        $transRef3 = rand();
//        $narration3 = "Regular Payment";
//        $amount3 = 3000;
//        $benficiaryEmail3 = "qa@test.com";
//        $benficiaryBankCode3 = "058";
//        $benficiaryAccountNumber3 = "0582915208015";
//        $paymentDetails3 = new PaymentDetails($amount3, $benficiaryAccountNumber3, $benficiaryBankCode3, $benficiaryEmail3, $narration3, $transRef3);
//
//        $batchRef = "134423r4269ff8774553797973111";
//        $debitAccount = "1234565678";
//        $narration = "Regular Payment";
//        $bankCode = "044";
//        $requestId = rand();
//        $bulkPaymentInfo = new BulkPaymentInfo($requestId, $bankCode, $batchRef, $debitAccount, $narration);
//
//        $bulkPaymentPayload = new BulkPaymentPayload($bulkPaymentInfo, array($paymentDetails1, $paymentDetails2, $paymentDetails3));
//
//        $response = $remitaGatewayService->bulkPayment($bulkPaymentPayload);
//        return $response;
    }
}

$testRITs = new TestRITSServices();
$getActiveBanks = $testRITs->test();
var_dump($getActiveBanks['status']);
var_dump($getActiveBanks['data']['responseCode']);
var_dump($getActiveBanks['data']['responseDescription']);
//var_dump($getActiveBanks['data']['paymentDetails'][0]['paymentReference']);

//var_dump($getActiveBanks['data']);

?>