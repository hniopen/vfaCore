<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 25/09/2017
 * Time: 16:20
 */

function fctReversibleCrypt($vWord){
    $vApplicationLakile = config('decryptKey');
//    $vWord = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), $vWord, MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))));
    return $vWord;
}

function fctReversibleDecrypt($vWord){
    $vApplicationLakile = config('decryptKey');
//    $vWord = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), base64_decode($vWord), MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))), "\0");
    return $vWord;
}