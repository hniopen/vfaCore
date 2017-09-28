<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 25/09/2017
 * Time: 16:20
 */

function fctReversibleCrypt($vWord){
    $vApplicationLakile = config('helpers.decryptKey');
//    $vWord = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), $vWord, MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))));
    return $vWord;
}

function fctReversibleDecrypt($vWord){
    $vApplicationLakile = config('helpers.decryptKey');
//    $vWord = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), base64_decode($vWord), MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))), "\0");
    return $vWord;
}

function fctIsAjax($request){
    /* https://benjaminlistwon.com/blog/adding-more-robust-ajax-detection-in-laravel/ */
    /* 1. Call the builtin method */
    if ($request->isXmlHttpRequest())
    {
        return true;
    }

    /* 2. Then check the Content-Type */
    $content_type = $request->header('Content-Type');
    $allowable_types = array(
        'application/json',
        'application/javascript',
    );
    if (in_array(
        strtolower($content_type),
        $allowable_types))
    {
        return true;
    }

    /* 3. Otherwise, not Ajax */
    return false;
}