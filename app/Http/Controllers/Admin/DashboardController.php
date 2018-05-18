<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Article;
use App\Models\Artist;
use App\Models\Interview;
use App\Models\Lyrics;
use App\Models\News;
use App\Models\User;
use DB;

class DashboardController extends Controller
{

    public function index()
    {

        $news = News::count();
        $artists = Artist::count();
        $albums = Album::count();
        $lyrics = Lyrics::count();
        $interviews = Interview::count();
        $articles = Article::count();
        $user = User::count();

        return view('admin.dashboard.index', compact('news', 'artists', 'albums', 'lyrics', 'interviews', 'articles', 'user'));
    }

}
