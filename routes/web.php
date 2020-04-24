<?php

use App\Helpers\Facades\UserFacade;



Route::view('/', 'welcome');

Route::get('/redirect/{service}', 'Auth\SocialAuthController@redirect');
Route::get('/callback/{service}', 'Auth\SocialAuthController@callback');


Route::get('/test', function () {
    UserFacade::getRoleName();
});

require('admin.php');
require('writer.php');


Auth::routes();
