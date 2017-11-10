<?php /* ... */


Route::get('dwsubmissions/dwSubmissionregs', ['as'=> 'dwsubmissions.dwSubmissionregs.index', 'uses' => 'Dwsubmissions\DwSubmissionregController@index']);
Route::post('dwsubmissions/dwSubmissionregs', ['as'=> 'dwsubmissions.dwSubmissionregs.store', 'uses' => 'Dwsubmissions\DwSubmissionregController@store']);
Route::get('dwsubmissions/dwSubmissionregs/create', ['as'=> 'dwsubmissions.dwSubmissionregs.create', 'uses' => 'Dwsubmissions\DwSubmissionregController@create']);
Route::put('dwsubmissions/dwSubmissionregs/{dwSubmissionregs}', ['as'=> 'dwsubmissions.dwSubmissionregs.update', 'uses' => 'Dwsubmissions\DwSubmissionregController@update']);
Route::patch('dwsubmissions/dwSubmissionregs/{dwSubmissionregs}', ['as'=> 'dwsubmissions.dwSubmissionregs.update', 'uses' => 'Dwsubmissions\DwSubmissionregController@update']);
Route::delete('dwsubmissions/dwSubmissionregs/{dwSubmissionregs}', ['as'=> 'dwsubmissions.dwSubmissionregs.destroy', 'uses' => 'Dwsubmissions\DwSubmissionregController@destroy']);
Route::get('dwsubmissions/dwSubmissionregs/{dwSubmissionregs}', ['as'=> 'dwsubmissions.dwSubmissionregs.show', 'uses' => 'Dwsubmissions\DwSubmissionregController@show']);
Route::get('dwsubmissions/dwSubmissionregs/{dwSubmissionregs}/edit', ['as'=> 'dwsubmissions.dwSubmissionregs.edit', 'uses' => 'Dwsubmissions\DwSubmissionregController@edit']);


Route::get('dwsubmissions/dwSubmissionValueregs', ['as'=> 'dwsubmissions.dwSubmissionValueregs.index', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@index']);
Route::post('dwsubmissions/dwSubmissionValueregs', ['as'=> 'dwsubmissions.dwSubmissionValueregs.store', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@store']);
Route::get('dwsubmissions/dwSubmissionValueregs/create', ['as'=> 'dwsubmissions.dwSubmissionValueregs.create', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@create']);
Route::put('dwsubmissions/dwSubmissionValueregs/{dwSubmissionValueregs}', ['as'=> 'dwsubmissions.dwSubmissionValueregs.update', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@update']);
Route::patch('dwsubmissions/dwSubmissionValueregs/{dwSubmissionValueregs}', ['as'=> 'dwsubmissions.dwSubmissionValueregs.update', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@update']);
Route::delete('dwsubmissions/dwSubmissionValueregs/{dwSubmissionValueregs}', ['as'=> 'dwsubmissions.dwSubmissionValueregs.destroy', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@destroy']);
Route::get('dwsubmissions/dwSubmissionValueregs/{dwSubmissionValueregs}', ['as'=> 'dwsubmissions.dwSubmissionValueregs.show', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@show']);
Route::get('dwsubmissions/dwSubmissionValueregs/{dwSubmissionValueregs}/edit', ['as'=> 'dwsubmissions.dwSubmissionValueregs.edit', 'uses' => 'Dwsubmissions\DwSubmissionValueregController@edit']);


Route::get('dwsubmissions/dwSubmissionvils', ['as'=> 'dwsubmissions.dwSubmissionvils.index', 'uses' => 'Dwsubmissions\DwSubmissionvilController@index']);
Route::post('dwsubmissions/dwSubmissionvils', ['as'=> 'dwsubmissions.dwSubmissionvils.store', 'uses' => 'Dwsubmissions\DwSubmissionvilController@store']);
Route::get('dwsubmissions/dwSubmissionvils/create', ['as'=> 'dwsubmissions.dwSubmissionvils.create', 'uses' => 'Dwsubmissions\DwSubmissionvilController@create']);
Route::put('dwsubmissions/dwSubmissionvils/{dwSubmissionvils}', ['as'=> 'dwsubmissions.dwSubmissionvils.update', 'uses' => 'Dwsubmissions\DwSubmissionvilController@update']);
Route::patch('dwsubmissions/dwSubmissionvils/{dwSubmissionvils}', ['as'=> 'dwsubmissions.dwSubmissionvils.update', 'uses' => 'Dwsubmissions\DwSubmissionvilController@update']);
Route::delete('dwsubmissions/dwSubmissionvils/{dwSubmissionvils}', ['as'=> 'dwsubmissions.dwSubmissionvils.destroy', 'uses' => 'Dwsubmissions\DwSubmissionvilController@destroy']);
Route::get('dwsubmissions/dwSubmissionvils/{dwSubmissionvils}', ['as'=> 'dwsubmissions.dwSubmissionvils.show', 'uses' => 'Dwsubmissions\DwSubmissionvilController@show']);
Route::get('dwsubmissions/dwSubmissionvils/{dwSubmissionvils}/edit', ['as'=> 'dwsubmissions.dwSubmissionvils.edit', 'uses' => 'Dwsubmissions\DwSubmissionvilController@edit']);


Route::get('dwsubmissions/dwSubmissionValuevils', ['as'=> 'dwsubmissions.dwSubmissionValuevils.index', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@index']);
Route::post('dwsubmissions/dwSubmissionValuevils', ['as'=> 'dwsubmissions.dwSubmissionValuevils.store', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@store']);
Route::get('dwsubmissions/dwSubmissionValuevils/create', ['as'=> 'dwsubmissions.dwSubmissionValuevils.create', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@create']);
Route::put('dwsubmissions/dwSubmissionValuevils/{dwSubmissionValuevils}', ['as'=> 'dwsubmissions.dwSubmissionValuevils.update', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@update']);
Route::patch('dwsubmissions/dwSubmissionValuevils/{dwSubmissionValuevils}', ['as'=> 'dwsubmissions.dwSubmissionValuevils.update', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@update']);
Route::delete('dwsubmissions/dwSubmissionValuevils/{dwSubmissionValuevils}', ['as'=> 'dwsubmissions.dwSubmissionValuevils.destroy', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@destroy']);
Route::get('dwsubmissions/dwSubmissionValuevils/{dwSubmissionValuevils}', ['as'=> 'dwsubmissions.dwSubmissionValuevils.show', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@show']);
Route::get('dwsubmissions/dwSubmissionValuevils/{dwSubmissionValuevils}/edit', ['as'=> 'dwsubmissions.dwSubmissionValuevils.edit', 'uses' => 'Dwsubmissions\DwSubmissionValuevilController@edit']);


Route::get('dwsubmissions/dwSubmission172s', ['as'=> 'dwsubmissions.dwSubmission172s.index', 'uses' => 'Dwsubmissions\DwSubmission172Controller@index']);
Route::post('dwsubmissions/dwSubmission172s', ['as'=> 'dwsubmissions.dwSubmission172s.store', 'uses' => 'Dwsubmissions\DwSubmission172Controller@store']);
Route::get('dwsubmissions/dwSubmission172s/create', ['as'=> 'dwsubmissions.dwSubmission172s.create', 'uses' => 'Dwsubmissions\DwSubmission172Controller@create']);
Route::put('dwsubmissions/dwSubmission172s/{dwSubmission172s}', ['as'=> 'dwsubmissions.dwSubmission172s.update', 'uses' => 'Dwsubmissions\DwSubmission172Controller@update']);
Route::patch('dwsubmissions/dwSubmission172s/{dwSubmission172s}', ['as'=> 'dwsubmissions.dwSubmission172s.update', 'uses' => 'Dwsubmissions\DwSubmission172Controller@update']);
Route::delete('dwsubmissions/dwSubmission172s/{dwSubmission172s}', ['as'=> 'dwsubmissions.dwSubmission172s.destroy', 'uses' => 'Dwsubmissions\DwSubmission172Controller@destroy']);
Route::get('dwsubmissions/dwSubmission172s/{dwSubmission172s}', ['as'=> 'dwsubmissions.dwSubmission172s.show', 'uses' => 'Dwsubmissions\DwSubmission172Controller@show']);
Route::get('dwsubmissions/dwSubmission172s/{dwSubmission172s}/edit', ['as'=> 'dwsubmissions.dwSubmission172s.edit', 'uses' => 'Dwsubmissions\DwSubmission172Controller@edit']);


Route::get('dwsubmissions/dwSubmissionValue172s', ['as'=> 'dwsubmissions.dwSubmissionValue172s.index', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@index']);
Route::post('dwsubmissions/dwSubmissionValue172s', ['as'=> 'dwsubmissions.dwSubmissionValue172s.store', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@store']);
Route::get('dwsubmissions/dwSubmissionValue172s/create', ['as'=> 'dwsubmissions.dwSubmissionValue172s.create', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@create']);
Route::put('dwsubmissions/dwSubmissionValue172s/{dwSubmissionValue172s}', ['as'=> 'dwsubmissions.dwSubmissionValue172s.update', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@update']);
Route::patch('dwsubmissions/dwSubmissionValue172s/{dwSubmissionValue172s}', ['as'=> 'dwsubmissions.dwSubmissionValue172s.update', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@update']);
Route::delete('dwsubmissions/dwSubmissionValue172s/{dwSubmissionValue172s}', ['as'=> 'dwsubmissions.dwSubmissionValue172s.destroy', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@destroy']);
Route::get('dwsubmissions/dwSubmissionValue172s/{dwSubmissionValue172s}', ['as'=> 'dwsubmissions.dwSubmissionValue172s.show', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@show']);
Route::get('dwsubmissions/dwSubmissionValue172s/{dwSubmissionValue172s}/edit', ['as'=> 'dwsubmissions.dwSubmissionValue172s.edit', 'uses' => 'Dwsubmissions\DwSubmissionValue172Controller@edit']);
