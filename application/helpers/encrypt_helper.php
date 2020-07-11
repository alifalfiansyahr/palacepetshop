<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Decrypt data from a CryptoJS json encoding string
 *
 * @param mixed $passphrase
 * @param mixed $jsonString
 * @return mixed
 * $encrypted = cryptoJsAesEncrypt("my passphrase", "value to encrypt");
 * $decrypted = cryptoJsAesDecrypt("my passphrase", $encrypted);
 */
if (!function_exists('encrypt')) {

    function encrypt($sData, $sKey)
    {
        $sResult = '';
        for ($i = 0; $i < strlen($sData); $i++) {
            $sChar = substr($sData, $i, 1);
            $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
            $sChar = chr(ord($sChar) + ord($sKeyChar));
            $sResult .= $sChar;
        }
        return encode_base64($sResult);
    }
}


if (!function_exists('encryptFDH')) {

    function encryptFDH($str)
    {
        $res = encrypt($str, 'bismillah4ever');
        $res1 = str_replace('=', 'xtfwx', $res);
        $res2 = str_replace('/', 'Hs4L5', $res1);
        $res3 = str_replace('+', 'Su7p', $res2);
        return $res3;
    }
}

if (!function_exists('decrypt')) {

    function decrypt($sData, $sKey)
    {
        $sResult = '';
        $sData = decode_base64($sData);
        for ($i = 0; $i < strlen($sData); $i++) {
            $sChar = substr($sData, $i, 1);
            $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
            $sChar = chr(ord($sChar) - ord($sKeyChar));
            $sResult .= $sChar;
        }
        return $sResult;
    }
}

if (!function_exists('decryptFDH')) {

    function decryptFDH($str)
    {
        $res = str_replace('Su7p', '+', $str);
        $res1 = str_replace('Hs4L5', '/', $res);
        $res2 = str_replace('xtfwx', '=', $res1);
        $ret = decrypt($res2, 'bismillah4ever');
        return $ret;
    }
}

if (!function_exists('base64url_encode')) {

    function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
if (!function_exists('base64url_decode')) {

    function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

if (!function_exists('encode_base64')) {

    function encode_base64($sData)
    {
        $sBase64 = base64_encode($sData);
        return strtr($sBase64, '+/', '-_');
    }
}

if (!function_exists('decode_base64')) {

    function decode_base64($sData)
    {
        $sBase64 = strtr($sData, '-_', '+/');
        return base64_decode($sBase64);
    }
}
