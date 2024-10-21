<?php

namespace App\Http\Services;

use App\Models\User;
use SoapClient;

class Sms
{
    public static  function send($mobile, $data , $pattern )
    {
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $username = env('SMS_USER');
        $pass = env('SMS_PASS');
        $fromNum = env('SMS_FROM');
        $toNum = $mobile;
        $pattern_code = $pattern;
        $input_data = $data;


        $client->sendPatternSms($fromNum, $toNum, $username, $pass, $pattern_code, $input_data);
    }

    public function checkTimestampSmsSend(User $user)
    {
        $timeFirst = strtotime($user->sms_code_send);

        return time() - $timeFirst;



    }


}
