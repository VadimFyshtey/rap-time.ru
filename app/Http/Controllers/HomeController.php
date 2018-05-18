<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Article;
use App\Models\Artist;
use App\Models\Interview;
use App\Models\Lyrics;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mail;
use MetaTag;

class HomeController extends DefaultController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artists = Cache::remember('artistsHome', self::CACHE_TIME_ITEM, function()
        {
            return Artist::status()->orderView()->limit(self::LIMIT_POPULAR_HOME)->get();
        });

        $albums = Cache::remember('albumsHome', self::CACHE_TIME_ITEM, function()
        {
            return Album::status()->orderView()->limit(self::LIMIT_POPULAR_HOME)->get();
        });

        $news = Cache::remember('newsHome', self::CACHE_TIME_ITEM, function()
        {
            return News::status()->orderCreated()->limit(self::LIMIT_POPULAR)->get();
        });

        $interviews = Cache::remember('interviewsHome', self::CACHE_TIME_ITEM, function()
        {
            return Interview::status()->orderCreated()->limit(self::LIMIT_POPULAR)->get();
        });

        $articles = Cache::remember('articlesHome', self::CACHE_TIME_ITEM, function()
        {
            return Article::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $lyrics = Cache::remember('lyricsHome', self::CACHE_TIME_ITEM, function()
        {
            return Lyrics::status()->orderView()->limit(self::LIMIT_LYRICS)->get();
        });

        MetaTag::set('title', 'Rap-Time.ru | Главная страница');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('home.index', compact('artists', 'albums', 'news', 'interviews', 'articles', 'lyrics'));
    }

    public function contact(Request $request)
    {
        if($request->ajax()) {

            $data = $request->all();
            Mail::send('layouts.components.email', compact('data'), function($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email']);
                $message->to($mail_admin)->subject($data['subject']);

            });
        }
        return redirect()->back();
    }

    public function info()
    {

        MetaTag::set('title', 'Rap-Time.ru | Информация о проекте');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('layouts.components.project.info');
    }

    public function contactPage()
    {
        MetaTag::set('title', 'Rap-Time.ru | Контакты');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('layouts.components.project.contact');
    }

    public function advertising()
    {

        MetaTag::set('title', 'Rap-Time.ru | Размещение рекламы');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('layouts.components.project.advertising');
    }

    public function copyright()
    {

        MetaTag::set('title', 'Rap-Time.ru | Правообладателям');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('layouts.components.project.copyright');
    }

    public function by88()
    {
        MetaTag::set('title', 'Rap-Time.ru | By88');
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('layouts.components.project.by88');
    }

}
