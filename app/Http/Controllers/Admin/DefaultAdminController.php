<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 05.05.2018
 * Time: 19:47
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class DefaultAdminController extends Controller
{

    const PAGINATION_PAGE        = 20;
    const NEWS_IMAGE_PATH        = '/img/news/';
    const ARTIST_IMAGE_PATH      = '/img/artists/';
    const ALBUMS_IMAGE_PATH      = '/img/albums/';
    const INTERVIEWS_IMAGE_PATH  = '/img/interviews/';
    const ARTICLES_IMAGE_PATH    = '/img/articles/';
    const USERS_IMAGE_PATH       = '/img/uploads/profile/';

    public function getExtension($filename) {
        return substr($filename, strrpos($filename, '.'));
    }

    public function clearCache()
    {
        Cache::flush();

        return redirect()->back();
    }

}