# Remita Interbank Transfer Service (RITs) PHP SDK
This is the PHP SDK for the Remita Interbank Transfer Service.

# Prerequisites
The workflow to getting started on RITs is as follows:

*  Register a profile on Remita: You can visit [Remita](https://login.remita.net) to sign-up if you are not already registered as a merchant/biller on the platform.
*  Receive the Remita credentials that certify you as a Biller: Remita will send your merchant ID and an API Key necessary to secure your handshake to the Remita platform.

# Installation
Include the library in your project using composer:
 ```php
composer require "remita/rits"
 ```
## Requirements
PHP 5.6 or above.

# Basic Usage
## Configuration
All merchant credentials needed to use RITs are being setup by instantiating the Credential Class and set the properties 
in this class accordingly. Properties such as MerchantId, ApiKey, ApiToken, Key, Iv and the Environment needs to be set.
 
_Note:_ Environment can either be DEMO or LIVE, each of this environment has it respective Credential. Ensure you set the 
right credentials. By default Environment is DEMO
 ```php
        // INIT CREDENTIALS
        $credentials = new Credentials();
        $credentials->setMerchantId("KUDI1234");
        $credentials->setApiKey("S1VESTEyMzR8S1VESQ==");
        $credentials->setApiToken("dWFBTVVGTGZRUEZaemRvVC8wYVNuRkVTc2REVi9GWGdCMHRvWHNXTnovaz0=";
        
        $credentials->setKey("cymsrniuxqtgfzva");
        $credentials->setIv("czidrfwqugpaxvkj");
        $credentials->setEnvironment("DEMO");

        $remitaGatewayService = new RITsGatewayService($credentials);
 ```
## Response
Reponse from every method call has the 'status' field which is a String and the 'data' field which is Object. The sample code below show how to access the methods
 ```php
    //set payload here and proceed to make a method call
    $response = $remitaGatewayService->choiceOfMethod($choiceOfMethodPayload);
    var_dump($response['status']);
	var_dump($response['data']['responseCode']);
	var_dump($response['data']['responseDescription']);
    
    Note: choiceOfMethod is an of the method below.
 ```
 
# METHODS
## Adding Account(s)
Adding an account to your merchant profile on the RITs is a dual process. 
* The first step is to AddAccount, Fields required to add account includes the following;
	1. accountNo: This is the number of the bank account being linked to merchant profile
	2. bankCode: This is the CBN code of the bank in which the account is domiciled
	3. transRef: This uniquely identifies the transaction
	4. requestId: This uniquely identifies the request
```php
        $requestId = "137976983726548970333";
        $accountNo = "057200559446";
        $bankCode = "057";
        $addAccountPayload = new AddAccountPayload($requestId, $accountNo, $bankCode);
        $response = $remitaGatewayService->addAccount($addAccountPayload);
 ```
## Validate Accounts
* The second step validates the account holder via bank authentication on the account details. You will be required by 	your bank to validate the account details the AddAccount request is being issued for, required fields(Payloads) are as follow;
	1. card: This is the one of the authentication detail required by the bank from the account owner to validate 	AddAccount request
	2. otp: This is the another authentication detail required by the bank from the account owner to validate AddAccount 	request
	3. remitaTransref: This uniquely identifies the specific add account request the validation is being called for
	4. requestId: This uniquely identifies the request
``` php
        $otp = "1234";
        $card = "0441234567890";
        $remitaTransRef = "MTU3MjAwODUwMDg2Nw==";
        $requestId = "6334e0289809830908s8";

        $authParam1 = new AuthParams();
        $authParam1->setParam1("OTP");
        $authParam1->setValue($otp);

        $authParam2 = new AuthParams();
        $authParam2->setParam1("CARD");
        $authParam2->setValue($card);

        $validateOtpPayload = new ValidateOtpPayload($requestId, $remitaTransRef, array($authParam1, $authParam2));
        $response = $remitaGatewayService->validateAccountOTP($validateOtpPayload);
```
Successful authentication through the bank links the designated account to the corresponding merchant profile on the
RITs platform.

## Payments
Payments on the RITs platform can only be made from Remita-identifiable accounts. This means that before an account
can be debited on the RITs, it must be linked to a profile. Merchants may process payments via the following SDK
methods on the platform:

* Single Payment Request: This charges/debits a merchant’s account with a specified amount to credit a designated 	beneficiary account. Fields(payload) to set include:
	1. fromBank: This is the CBN code of the funding bank
	2. debitAccount: This is the funding account number
	3. toBank: The CBN code of destination bank where account number to be credited is domiciled. (You can use the Banks Enquiry method to get the list of all supported Banks’ code).
	4. creditAccount: This is the account number to be credited in destination bank.
	5. narration: The narration of the payment. This will typically be visible both in the debit and credit account statement. Max length 30 characters
	6. amount: The amount to be debited from the debitAccountToken and credited to creditAccount in bank toBank. Format - ##.##
	7. beneficiaryEmail: Email of the beneficiary (email of creditAccount holder)
	8. transRef: A unique reference that identifies a payment request. This reference can be used sub- sequently to retrieve the details/status of the payment request
	9. requestId: This uniquely identifies the request

```php
        $fromBank = "044";
        $debitAccount = "1234565678";
        $toBank = "058";
        $creditAccount = "0582915208017";
        $narration = "Regular Payment";
        $amount = "5000";
        $beneficiaryEmail = "qa@test.com";
        $requestId = "7423399808897897230";
        $transRef = "408948334897934209";
        $singlePaymentPayload = new SinglePaymentPayload($requestId, $amount, $beneficiaryEmail, $creditAccount, $debitAccount,
            $fromBank, $narration, $toBank, $transRef);
        $response = $remitaGatewayService->singlePayment($singlePaymentPayload);
```

* Bulk Send Payment Request: Here, a single amount is debited to credit multiple accounts across several banks. Fields(payload) to set include the bulkPaymentInfo Parameters and paymentDetails Parameters
	
	bulkPaymentInfo Payload
	1. batchRef: A unique reference that identifies a bulk payment request.
	2. debitAccount: Funding account number
	3. bankCode: 3 digit code representing funding bank
	4. creditAccount: This is the account number to be credited in destination bank.
	5. narration: Description of the payment
	6. requestId: This uniquely identifies the request

	paymentDetails Payload
	1. beneficiaryBankCode: The CBN code of destination bank where account number to be credited is domiciled. (You can use the Banks Enquiry method to get the list of all supported Banks’ code)
	2. beneficiaryAccountNumber: This is the account number to be credited in destination bank.
	3. narration: The narration of the payment. This will typically be visible both in the debit and credit account statement. Max length 30 characters
	4. amount: The amount to be debited from the debitAccountToken and credited to creditAccount in bank toBank
	5. beneficiaryEmail: Email of the beneficiary
	6. transRef: A unique reference that identifies a payment request. This reference can be used sub- sequently to retrieve the details/status of the payment request

```php
    $transRef1 = rand();
    $narration1 = "Regular Payment";
    $amount1 = 5000;
    $benficiaryEmail1 = "qa@test.com";
    $benficiaryBankCode1 = "058";
    $benficiaryAccountNumber1 = "0582915208017";
    $paymentDetails1 = new PaymentDetails($amount1, $benficiaryAccountNumber1, $benficiaryBankCode1, $benficiaryEmail1, $narration1, $transRef1);

    $transRef2 = rand();
    $narration2 = "Regular Payment";
    $amount2 = 6000;
    $benficiaryEmail2 = "qa@test.com";
    $benficiaryBankCode2 = "058";
    $benficiaryAccountNumber2 = "0582915208015";
    $paymentDetails2 = new PaymentDetails($amount2, $benficiaryAccountNumber2, $benficiaryBankCode2, $benficiaryEmail2, $narration2, $transRef2);

    $transRef3 = rand();
    $narration3 = "Regular Payment";
    $amount3 = 3000;
    $benficiaryEmail3 = "qa@test.com";
    $benficiaryBankCode3 = "058";
    $benficiaryAccountNumber3 = "0582915208015";
    $paymentDetails3 = new PaymentDetails($amount3, $benficiaryAccountNumber3, $benficiaryBankCode3, $benficiaryEmail3, $narration3, $transRef3);
    
    $batchRef = "1344126773478fgjghfjh99737092342455379773111";
    $debitAccount = "1234565678";
    $narration = "Regular Payment";
    $bankCode = "044";
    $requestId = rand();
    $bulkPaymentInfo = new BulkPaymentInfo($requestId, $bankCode, $batchRef, $debitAccount, $narration);

    $bulkPaymentPayload = new BulkPaymentPayload($bulkPaymentInfo, array($paymentDetails1, $paymentDetails2, $paymentDetails3));

    $response = $remitaGatewayService->bulkPayment($bulkPaymentPayload);

```

## Payment Request Status
The payment request status method essentially retrieves the status of a previous payment request(Single payment and Bulk payment) using its transaction reference.

* Single Payment Request Status:
	1. transRef: This should be the same transRef that was used for the single payment request
	2. requestId: This uniquely identifies the request

```php
     $requestId = "633498098309879808s8";
     $transRef = "318187";
     $singlePaymentStatusPayload = new SinglePaymentStatusPayload($requestId, $transRef);
     $response = $remitaGatewayService->singlePaymentStatus($singlePaymentStatusPayload);
```

* Bulk Send Payment Request Status: 
	1. batchRef: This should be the same batchRef that was used for the bulk payment request
	2. requestId: This uniquely identifies the request

```php
     $requestId = "1533284767822433sd32139636084";
     $batchRef = "13441234556";
     $bulkPaymentStatusPayload = new BulkPaymentStatusPayload($requestId, $batchRef);
     $response = $remitaGatewayService->bulkPaymentStatus($bulkPaymentStatusPayload);
```
 
## Account Enquiry
Payment Request Status finds all available information on a specific account, required fields(Payloads) are as follow;
	1. accountNo: Account number of tokenized account to be looked up
	2. bankCode: The bank code where the account is domiciled. Use the Banks Enquiry method
	3. requestId: This uniquely identifies the request
```php
    $requestId = "1379769836548970333";
    $accountNo = "057200559446";
    $bankCode = "057";
    $accountEnquiryPayload = new AccountEnquiryPayload($requestId, $accountNo, $bankCode);
    $response = $remitaGatewayService->accountEnquiry($accountEnquiryPayload);
```

## Bank Enquiry
This method lists the banks that are active on the RITs platform. required fields(Payloads) are as follow;
	1. requestId: This uniquely identifies the request 
```php
    $requestId = "1379769837269876587548970333";
    $payload =  new ActiveBanksPayload($requestId);
    $response = $remitaGatewayService->activeBanks($payload);
````

## Support
For all other support needs, support@remita.net
 