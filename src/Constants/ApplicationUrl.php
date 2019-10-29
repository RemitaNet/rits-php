<?php

namespace com\systemspecs;
class ApplicationUrl
{
    public static $accountEnquiry = "merc/fi/account/lookup";

    public static $activeBanks = "fi/banks";

    public static $addAccount = "merc/account/token/init";

    public static $validateAccountOTP = "merc/account/token/validate";

    public static $paymentStatusSingle = "merc/payment/status";

    public static $paymentStatusBulk = "merc/bulk/payment/status";

    public static $paymentSingle = "merc/payment/singlePayment.json";

    public static $paymentBulk = "merc/bulk/payment/send";
}

?>
