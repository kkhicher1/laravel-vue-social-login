<?php

//get user name 

use App\Helpers\Facades\UserFacade;

if (!function_exists('name')) {
    function name()
    {
        return UserFacade::name();
    }
}

if (!function_exists('loggedInURL')) {
    function loggedInURL()
    {
        return UserFacade::getLoggedInURL();
    }
}
