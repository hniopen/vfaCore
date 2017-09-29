<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 25/09/2017
 * Time: 16:22
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Helpers config
    |--------------------------------------------------------------------------
    |
    | Add here every config related to Datawinners
    |
    */
    'generator'=>[
        'namespace'=> 'Dwsubmissions',
        'prefix'=>[
            'submission'=>'DwSubmission',
            'submissionValue'=>'DwSubmissionValue'
        ]
    ],
    'defaultApiStartDate' => '01-01-2013',
    'url' => [
        'formList' => 'https://app.datawinners.com/xforms/formList',
        'xform' => 'https://app.datawinners.com/xforms/',
    ],
    'userAgentCurl' => "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
    'event'=>[
        'sms'=>[
            'boolSend'=> env('BOOL_SEND_SMS', 'false'),
            'boolSendError'=> env('BOOL_SEND_ERROR_SMS', 'false'),
            'adminNumbers'=>env('ADMIN_NUMBERS', ''),//should be a list
            'testerNumbers'=>env('TESTER_NUMBERS', ''),//should be a list
        ]
    ]
];