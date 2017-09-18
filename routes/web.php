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

});

//InfyOm Builder
Route::get('/generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator.field.template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator.generate');

$this->resource('settings', 'SettingController');