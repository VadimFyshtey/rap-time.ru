<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{

    const LIMIT_POPULAR            = 4;
    const LIMIT_POPULAR_HOME       = 15;
    const LIMIT_LAST_ITEM          = 3;
    const LIMIT_LYRICS             = 6;
    const LIMIT_LAST_ACTIVE        = 4;
    const PAGINATION_PAGE          = 21;
    const PROFILE_AVATAR_PATH      = '/img/uploads/profile/';
    const CACHE_TIME_ITEM          = 60 * 4;
    const CACHE_TIME_ITEM_ARTISTS  = 40;
    const CACHE_TIME_POPULAR       = 60 * 24;
    const CACHE_TIME_CATEGORIES    = 60 * 48;

    function getExtension($filename) {
        return substr($filename, strrpos($filename, '.'));
    }

}
