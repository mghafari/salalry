<?php


use App\Services\jDateTime;
use Illuminate\Http\Request;




function convertPersianToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}


function convertArabicToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}



function convertEnglishToPersian($number)
{
    $number = str_replace('0', '۰', $number);
    $number = str_replace('1', '۱', $number);
    $number = str_replace('2', '۲', $number);
    $number = str_replace('3', '۳', $number);
    $number = str_replace('4', '۴', $number);
    $number = str_replace('5', '۵', $number);
    $number = str_replace('6', '۶', $number);
    $number = str_replace('7', '۷', $number);
    $number = str_replace('8', '۸', $number);
    $number = str_replace('9', '۹', $number);

    return $number;
}




function validateNationalCode($nationalCode)
{
    $nationalCode = trim($nationalCode, ' .');
    $nationalCode = convertArabicToEnglish($nationalCode);
    $nationalCode = convertPersianToEnglish($nationalCode);
    $bannedArray = ['0000000000', '1111111111', '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777', '8888888888', '9999999999'];

    if(empty($nationalCode))
    {
        return false;
    }
    else if(count(str_split($nationalCode)) != 10)
    {
        return false;
    }
    else if(in_array($nationalCode, $bannedArray))
    {
        return false;
    }
    else{

        $sum = 0;

        for($i = 0; $i < 9; $i++)
        {
            // 1234567890
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $divideRemaining = $sum % 11;

        if($divideRemaining < 2)
        {
            $lastDigit = $divideRemaining;
        }
        else{
            $lastDigit = 11 - ($divideRemaining);
        }

        if((int) $nationalCode[9] == $lastDigit)
        {
            return true;
        }
        else{
            return false;
        }

    }
}

function getMobile($mobile)
{
    $mobile = convertPersianToEnglish($mobile);

    if (!preg_match("/^(\+989|00989|989|9|09)[0-9]{9}$/", $mobile))
        return false;

    if (preg_match("/^09[0-9]{9}$/", $mobile))
        return $mobile;
    if (preg_match("/^(\+989)[0-9]{9}$/", $mobile))
        return '0' . substr($mobile, 3);

    if (preg_match("/^989[0-9]{9}$/", $mobile))
        return '0' . substr($mobile, 2);

    if (preg_match("/^00989[0-9]{9}$/", $mobile))
        return '0' . substr($mobile, 4);

    if (preg_match("/^9[0-9]{9}$/", $mobile))
        return '0' . $mobile;
}

function fa_num( $text = null) {
    return convertEnglishToPersian($text);
}


function en_num( $text = null) {
    return convertPersianToEnglish($text);
}




