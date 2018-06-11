<?php
/**
 * User: safidison
 * Date: 4/26/18
 * Time: 1:12 PM
 */

$dwBaseUrl = empty(env('DW_BASE_URL'))?'https://app.datawinners.com':(env('DW_BASE_URL'));
$dwLogin = empty(env('DW_LOGIN'))?'':(env('DW_LOGIN'));
$dwPassword = empty(env('DW_PASSWORD'))?'':(env('DW_PASSWORD'));
$dwSmsLogin = empty(env('DW_SMS_LOGIN'))?'':(env('DW_SMS_LOGIN'));
$dwSmsPassword = empty(env('DW_SMS_PASSWORD'))?'':(env('DW_SMS_PASSWORD'));

return [
    'dwBaseUrl'=> $dwBaseUrl,
    'dwLogin'=> $dwLogin,
    'dwPassword'=> $dwPassword,
    'dwSmsLogin'=> $dwSmsLogin,
    'dwSmsPassword'=> $dwSmsPassword
];