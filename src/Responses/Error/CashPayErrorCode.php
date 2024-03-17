<?php

namespace Alsharie\CashPayPayment\Responses\Error;

class CashPayErrorCode
{
    static public array $codes = array(
        "6000" => "Sys permission",
        "6001" => "duplicated timestamp",
        "6002" => "obsolete timestamp",
        "6003" => "You have crossed the threshold",
        "6004" => "This process cannot be completed",
        "6005" => "Verification code not sent",
        "6006" => "The customer not allowed to pay online.",
        "6007" => "invalid customer",
        "6008" => "you must initial payment first, (Either the previous step-1 has expired or you did not perform step 1 at all).",
        "6009" => "exceeded the number of attempts",
        "6010" => "invalid input (OTP), you only have {n} attempt till the process will be cancelled",
        "6011" => "the customer is not authorized to do this type of operation",
        "6012" => "unauthorized request",
        "6013" => "There is no operation with the entered number (timeout cases)",
        "6014" => "you are not authorized to perform this operation",
        "6015" => "invalid MD5",
        "6016" => "invalid CustomerCashPayCode",
        "6017" => "invalid encryption format(encPassword)",
        "6018" => "duplicated RequestId",
        "6019" => "Invalid a mandatory header key.",
        "6020" => "The currencyId not allowed.",
        "6021" => "Exceeding the allowed limit for the payment process",
        "6022" => "Expired password, you should change password",
        "6023" => "Invalid credentials(username/password) for requester 9999 Some other error",
        "9999" => "Some other error"

    );
}