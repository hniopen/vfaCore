<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 28/09/2017
 * Time: 12:11
 */
use Excel;

function fctGetQuestionsFromJson($tJson, $questionKey = 'values'){
    $output = [];
    if($tJson)
        foreach ($tJson as $item){
            $output = array_unique(array_merge($output, array_unique(recursive_keys($item[$questionKey]))));
        }
    return $output;
}

function recursive_keys($input, $search_value = null){
    $output = ($search_value !== null ? array_keys($input, $search_value) : array_keys($input)) ;
    foreach($input as $sub){
        if(is_array($sub)){
            $output = ($search_value !== null ? array_merge($output, recursive_keys($sub, $search_value)) : array_merge($output, recursive_keys($sub))) ;
        }
    }
    return $output ;
}

function fctGetQuestionsFromXform($XformResult){
    $output = [];
    $dom = new \DomDocument();
    $dom->preserveWhiteSpace = FALSE;
    $dom->loadXML($XformResult);

    //Initiate question values from 'data'
    $listeData = $dom->getElementsByTagName('data');
    $data = $listeData->item(0);

    foreach($data->childNodes as $node){
        if($node->nodeName!='eid' and $node->nodeName!='form_code'){
            $output[$node->nodeName] = ['type'=>'', 'label'=>'', 'tag'=>''];
        }
    }

    //Set type from 'bind'
    $listeBind = $dom->getElementsByTagName('bind');
    foreach($listeBind as $bind){
        $vQuest = $bind->getAttribute('nodeset');
        $vQuest = substr($vQuest,1);
        $vPos = strpos($vQuest,"/");
        $vQuest = substr($vQuest,$vPos+1);
        if(array_key_exists($vQuest,$output)){
            $output[$vQuest]['type'] = $bind->getAttribute('type');
        }

    }
    //Set Label & tag from 'body'
    $listeBody = $dom->getElementsByTagName('body');
    $bodyElement = $listeBody->item(0)->childNodes;
    foreach($bodyElement as $elmt){
        $vQuest = $elmt->getAttribute('ref');
        if(array_key_exists($vQuest,$output)){
            $output[$vQuest]['tag'] = $elmt->nodeName;
            $output[$vQuest]['label'] = $elmt->firstChild->nodeValue;
        }
    }
    return $output;
}

function fctInitCurlDw($url, $credential, $curlHttpAuth = CURLOPT_HTTPAUTH){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_USERAGENT, config('dwsync.userAgentCurl'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPAUTH, $curlHttpAuth);
    curl_setopt($ch, CURLOPT_USERPWD, strtolower($credential));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $res = curl_exec ($ch);
    $tResult = ['raw'=>$res, 'json'=>json_decode($res,true), 'code'=>curl_errno($ch), 'msg'=>curl_error($ch)];
    curl_close($ch);
    return $tResult;
}