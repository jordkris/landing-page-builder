<?php
function setWIB()
{
    date_default_timezone_set("Asia/Jakarta");
}

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function countByPrefix($arr, $prefix)
{
    $count = 0;
    foreach ($arr as $key => $value) {
        if (substr($key, 0, strlen($prefix)) === $prefix) {
            $count++;
        }
    }
    return $count;
}

function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function contains($string, $substring)
{
    if (strpos($string, $substring) !== false) {
        return true;
    } else {
        return false;
    }
}
