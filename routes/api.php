<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

});


Route::resource('settings', 'SettingAPIController');

@include 'dynamic_api.php';