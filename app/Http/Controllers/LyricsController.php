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
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $lyrics = Cache::remember('lyricsIndex_' . $currentPage, self::CACHE_TIME_ITEM, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $lyrics = Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $lyrics->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularLyrics = Cache::remember('popularLyrics', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_LYRICS)->get();
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

        $popularLyrics = Cache::remember('popularLyrics', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_LYRICS)->get();
        });

        $otherLyrics = Cache::remember('otherLyrics_' . $alias . '_' . $id, self::CACHE_TIME_OTHER, function() use ($alias, $id)
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias')
                ->status()->inRandomOrder()->where('id', '!=', $id)->limit(self::LIMIT_OTHER)->get();
        });

        $comments = $lyrics->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $lyrics->title_seo);
        MetaTag::set('description', $lyrics->description_seo);

        return view('lyrics.view', compact('lyrics', 'popularLyrics', 'otherLyrics', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $lyrics = Cache::remember('lyricsCategory_' . $id . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($id)
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderCreated()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $lyrics = Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderBy($sort->sort, $by)->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
            $lyrics->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularLyrics = Cache::remember('popularLyrics', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_LYRICS)->get();
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

        $lyrics = Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'rate_count', 'created_at')
            ->where('artist_name','LIKE',"%{$q}%")
            ->orWhere('lyrics_name','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $lyrics->appends(['q' => $q]);

        $popularLyrics = Cache::remember('popularLyrics', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_LYRICS)->get();
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