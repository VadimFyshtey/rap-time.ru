<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 20.04.2018
 * Time: 13:46
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lyrics;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MetaTag;

class LyricsController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {

        $lyrics = Cache::remember('lyricsIndex', self::CACHE_TIME_ITEM, function()
        {
            return Lyrics::status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $lyrics = Lyrics::status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $lyrics->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularLyrics = Cache::remember('popularLyricsIndex', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Все тексты песен рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы найдете все тексты песен рэп исполнителей.');

        return view('lyrics.index', compact('lyrics', 'popularLyrics', 'categories'));
    }

    public function view($alias, $id)
    {
        $lyrics = Lyrics::with( 'artists')
            ->with(['ratingLyrics' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->where('id', $id)->first();

        if(empty($lyrics)) abort(404);

        $lyrics->viewedCounter();

        $popularLyrics = Cache::remember('popularLyricsView', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $comments = $lyrics->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $lyrics->title_seo);
        MetaTag::set('description', $lyrics->description_seo);

        return view('lyrics.view', compact('lyrics', 'popularLyrics', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $lyrics = Cache::remember('lyricsCategory', self::CACHE_TIME_ITEM, function() use ($id)
        {
            return Lyrics::status()->orderCreated()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $lyrics = Lyrics::status()->orderBy($sort->sort, $by)->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
            $lyrics->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularLyrics = Cache::remember('popularLyricsCategory', self::CACHE_TIME_POPULAR, function() use ($id)
        {
            return Lyrics::status()->orderView()->where('category_id', $id)->limit(self::LIMIT_POPULAR)->get();
        });

        $category = Category::findOrfail($id);
        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', $category->title . ' тексты песен рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы найдете ' . $category->title . ' тексты песен рэп исполнителей.');

        return view('lyrics.category', compact('lyrics', 'popularLyrics', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $lyrics = Lyrics::where('artist_name','LIKE',"%{$q}%")
            ->orWhere('lyrics_name','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $lyrics->appends(['q' => $q]);

        $popularLyrics = Cache::remember('popularLyricsSearch', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Поиск по текстам песен: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы найдете все тексты песен рэп исполнителей. Поиск по текстам песен: ' . $q);

        return view('lyrics.search', compact('lyrics', 'popularLyrics', 'categories', 'q'));
    }

}