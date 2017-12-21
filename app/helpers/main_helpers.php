<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 25/09/2017
 * Time: 16:20
 */
use Illuminate\Support\Facades\Crypt;

function fctReversibleCrypt($vWord){
    //TODO: encrypt reversible credential
    $customKey = Config('helpers.decryptKey');
    $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
//    $vWord = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), $vWord, MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))));
//    $encrypted_vWord= Crypt::encryptString($vWord);
    $encrypted_vWord= $newEncrypter->encrypt( $vWord );
    return $encrypted_vWord;
}

function fctReversibleDecrypt($vWord){
    //TODO: decrypt reversible credential
    $customKey = Config('helpers.decryptKey');
    $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
//    $vWord = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), base64_decode($vWord), MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))), "\0");
//    $decrypted_vWord= Crypt::decryptString($vWord);
    $decrypted_vWord= $newEncrypter->decrypt( $vWord );
    return $decrypted_vWord;
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