<?php

Auth::routes();
//Frontend routes
Route::get('/', function () { return redirect('/home'); });
Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
//$this->get('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', ['as'=>'auth.password.reset', 'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm'])->name('auth.password.reset');
$this->post('password/email', ['as'=>'auth.password.reset', 'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail'])->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

//Admin routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/phpinfo','AdminController@phpinfo');
    Route::get('/home', 'AdminController@index');
    Route::get('/', 'AdminController@index');
    Route::group(['middleware' => ['auth', 'roles'], 'roles'=>'administrator'],function () {
        Route::resource('permissions', 'Admin\PermissionsController');
        Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
        Route::resource('roles', 'Admin\RolesController');
        Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
        Route::resource('users', 'Admin\UsersController');
        Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    });
    Route::resource('settings', 'SettingController');
});

//InfyOm Builder
Route::get('/generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator.field.template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator.generate');



Route::get('dwsync/dwEntityTypes', ['as'=> 'dwsync.dwEntityTypes.index', 'uses' => 'Dwsync\DwEntityTypeController@index']);
Route::post('dwsync/dwEntityTypes', ['as'=> 'dwsync.dwEntityTypes.store', 'uses' => 'Dwsync\DwEntityTypeController@store']);
Route::get('dwsync/dwEntityTypes/create', ['as'=> 'dwsync.dwEntityTypes.create', 'uses' => 'Dwsync\DwEntityTypeController@create']);
Route::put('dwsync/dwEntityTypes/{dwEntityTypes}', ['as'=> 'dwsync.dwEntityTypes.update', 'uses' => 'Dwsync\DwEntityTypeController@update']);
Route::patch('dwsync/dwEntityTypes/{dwEntityTypes}', ['as'=> 'dwsync.dwEntityTypes.update', 'uses' => 'Dwsync\DwEntityTypeController@update']);
Route::delete('dwsync/dwEntityTypes/{dwEntityTypes}', ['as'=> 'dwsync.dwEntityTypes.destroy', 'uses' => 'Dwsync\DwEntityTypeController@destroy']);
Route::get('dwsync/dwEntityTypes/{dwEntityTypes}', ['as'=> 'dwsync.dwEntityTypes.show', 'uses' => 'Dwsync\DwEntityTypeController@show']);
Route::get('dwsync/dwEntityTypes/{dwEntityTypes}/edit', ['as'=> 'dwsync.dwEntityTypes.edit', 'uses' => 'Dwsync\DwEntityTypeController@edit']);



Route::get('dwsync/dwProjects', ['as'=> 'dwsync.dwProjects.index', 'uses' => 'Dwsync\DwProjectController@index']);
Route::post('dwsync/dwProjects', ['as'=> 'dwsync.dwProjects.store', 'uses' => 'Dwsync\DwProjectController@store']);
Route::get('dwsync/dwProjects/create', ['as'=> 'dwsync.dwProjects.create', 'uses' => 'Dwsync\DwProjectController@create']);
Route::put('dwsync/dwProjects/{dwProjects}', ['as'=> 'dwsync.dwProjects.update', 'uses' => 'Dwsync\DwProjectController@update']);
Route::patch('dwsync/dwProjects/{dwProjects}', ['as'=> 'dwsync.dwProjects.update', 'uses' => 'Dwsync\DwProjectController@update']);
Route::delete('dwsync/dwProjects/{dwProjects}', ['as'=> 'dwsync.dwProjects.destroy', 'uses' => 'Dwsync\DwProjectController@destroy']);
Route::get('dwsync/dwProjects/{dwProjects}', ['as'=> 'dwsync.dwProjects.show', 'uses' => 'Dwsync\DwProjectController@show']);
Route::get('dwsync/dwProjects/{dwProjects}/edit', ['as'=> 'dwsync.dwProjects.edit', 'uses' => 'Dwsync\DwProjectController@edit']);
Route::get('dwsync/dwProjects/{dwProjects}/extra', ['as'=> 'dwsync.dwProjects.extra', 'uses' => 'Dwsync\DwProjectController@extra']);
Route::get('dwsync/dwProjects/check/from/submissions/{dwProjects}', ['as'=> 'dwsync.dwProjects.checkFromSubmissions', 'uses' => 'Dwsync\DwProjectController@checkFromSubmissions']);
Route::post('dwsync/dwProjects/insert/from/submissions/', ['as'=> 'dwsync.dwProjects.insertFromSubmissions', 'uses' => 'Dwsync\DwProjectController@insertFromSubmissions']);
Route::get('dwsync/dwProjects/check/from/xform/{dwProjects}', ['as'=> 'dwsync.dwProjects.checkFromXform', 'uses' => 'Dwsync\DwProjectController@checkFromXform']);
Route::post('dwsync/dwProjects/insert/from/xform/', ['as'=> 'dwsync.dwProjects.insertFromXform', 'uses' => 'Dwsync\DwProjectController@insertFromXform']);
Route::post('dwsync/dwProjects/check/from/xls/{dwProjects}', ['as'=> 'dwsync.dwProjects.checkFromXls', 'uses' => 'Dwsync\DwProjectController@checkFromXls']);
Route::post('dwsync/dwProjects/insert/from/xls/', ['as'=> 'dwsync.dwProjects.insertFromXls', 'uses' => 'Dwsync\DwProjectController@insertFromXls']);
Route::get('dwsync/dwProjects/sync/{dwProjects}', ['as'=> 'dwsync.dwProjects.sync', 'uses' => 'Dwsync\DwProjectController@sync']);
Route::get('dwsync/dwProjects/check/existing/questions/{dwProjects}', ['as'=> 'dwsync.dwProjects.checkExistingQuestions', 'uses' => 'Dwsync\DwProjectController@checkExistingQuestions']);
Route::post('dwsync/dwProjects/remove/existing/questions/', ['as'=> 'dwsync.dwProjects.removeExistingQuestions', 'uses' => 'Dwsync\DwProjectController@removeExistingQuestions']);

Route::get('dwsync/dwQuestions', ['as'=> 'dwsync.dwQuestions.index', 'uses' => 'Dwsync\DwQuestionController@index']);
Route::post('dwsync/dwQuestions', ['as'=> 'dwsync.dwQuestions.store', 'uses' => 'Dwsync\DwQuestionController@store']);
Route::get('dwsync/dwQuestions/create', ['as'=> 'dwsync.dwQuestions.create', 'uses' => 'Dwsync\DwQuestionController@create']);
Route::put('dwsync/dwQuestions/{dwQuestions}', ['as'=> 'dwsync.dwQuestions.update', 'uses' => 'Dwsync\DwQuestionController@update']);
Route::patch('dwsync/dwQuestions/{dwQuestions}', ['as'=> 'dwsync.dwQuestions.update', 'uses' => 'Dwsync\DwQuestionController@update']);
Route::delete('dwsync/dwQuestions/{dwQuestions}', ['as'=> 'dwsync.dwQuestions.destroy', 'uses' => 'Dwsync\DwQuestionController@destroy']);
Route::get('dwsync/dwQuestions/{dwQuestions}', ['as'=> 'dwsync.dwQuestions.show', 'uses' => 'Dwsync\DwQuestionController@show']);
Route::get('dwsync/dwQuestions/{dwQuestions}/edit', ['as'=> 'dwsync.dwQuestions.edit', 'uses' => 'Dwsync\DwQuestionController@edit']);
Route::get('dwsync/dwQuestions/create/from/submissions', ['as'=> 'dwsync.dwQuestions.createFromSubmissions', 'uses' => 'Dwsync\DwQuestionController@createFromSubmissions']);
Route::post('dwsync/dwQuestions/check/from/submissions', ['as'=> 'dwsync.dwQuestions.checkFromSubmissions', 'uses' => 'Dwsync\DwQuestionController@checkFromSubmissions']);
Route::post('dwsync/dwQuestions/store/from/submissions', ['as'=> 'dwsync.dwQuestions.storeFromSubmissions', 'uses' => 'Dwsync\DwQuestionController@storeFromSubmissions']);
Route::get('dwsync/dwQuestions/create/from/xlsform', ['as'=> 'dwsync.dwQuestions.createFromXlsform', 'uses' => 'Dwsync\DwQuestionController@createFromXlsform']);
Route::post('dwsync/dwQuestions/store/from/xlsform', ['as'=> 'dwsync.dwQuestions.storeFromXlsform', 'uses' => 'Dwsync\DwQuestionController@storeFromXlsform']);

include "dynamic_web.php";