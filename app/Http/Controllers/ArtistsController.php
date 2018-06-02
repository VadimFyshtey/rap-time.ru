<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Interview;
use App\Models\Lyrics;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MetaTag;

class ArtistsController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {

        $artists = Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
            ->status()
            ->with(['ratingArtists' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->orderView()->paginate(self::PAGINATION_PAGE);

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $artists = Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()
                ->with(['ratingArtists' => function($query){
                    return $query->where('user_id', Auth::id());
                }])
                ->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $artists->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularArtists = Cache::remember('popularArtists', self::CACHE_TIME_POPULAR, function()
        {
            return Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()->orderRating()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Все рэп исполнители - Биографии, факты, альбомы, тексты песен и другое');
        MetaTag::set('description', 'На нашем сайте вы найдете всех рэп исполнителей их биографию, факты, альбомы, тексты песен и многое другое.');

        return view('artists.index', compact('artists', 'popularArtists', 'categories'));
    }

    public function view($alias)
    {

        $artist = Artist::with(['albums' => function($query){
                return $query->orderCreated()->take(self::LIMIT_LAST_ITEM);
            }])
            ->with(['interviews' => function($query){
                return $query->orderCreated()->take(self::LIMIT_LAST_ITEM);
            }])
            ->with(['news' => function($query){
                return $query->orderCreated()->take(self::LIMIT_LAST_ITEM);
            }])
            ->with(['lyrics' => function($query){
                return $query->orderCreated()->take(self::LIMIT_LYRICS);
            }])
            ->with(['ratingArtists' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->first();

        if(empty($artist)) abort(404);

        $artist->viewedCounter();

        $comments = $artist->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $artist->title_seo);
        MetaTag::set('description', $artist->description_seo);

        return view('artists.view', compact('artist', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $artists = Cache::remember('artistCategory_' . $id . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($id)
        {
            return Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()
                ->with(['ratingArtists' => function($query){
                    return $query->where('user_id', Auth::id());
                }])
                ->orderView()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $artists = Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()
                ->with(['ratingArtists' => function($query){
                    return $query->where('user_id', Auth::id());
                }])
                ->orderBy($sort->sort, $by)->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
            $artists->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularArtists = Cache::remember('popularArtists', self::CACHE_TIME_POPULAR, function()
        {
            return Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()->orderRating()->limit(self::LIMIT_POPULAR)->get();
        });

        $category = Category::findOrfail($id);
        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', $category->title . ' рэп исполнители - Биография, факты, альбомы, тексты песен и другое');
        MetaTag::set('description', 'На нашем сайте вы найдете исполнителей по категории: ' . $category->title . ' их биографию, факты, альбомы, тексты песен и многое другое.');

        return view('artists.category', compact('artists', 'popularArtists','category', 'categories'));
    }

    public function artistAlbums($alias)
    {

        $limit = self::PAGINATION_PAGE;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $artistAlbums = Cache::remember('artistAlbumsIndex_' . $alias . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($limit, $alias)
        {
            return Artist::with(['albums' => function($query) use ($limit){
                return $query->orderCreated()->paginate($limit);
            }])->where('alias', $alias)->status()->first();
        });

        $popularAlbums = Cache::remember('popularAlbums', self::CACHE_TIME_POPULAR, function()
        {
            return Album::select('id', 'artist_name', 'album_name', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', $artistAlbums->nickname . ' - Скачать все альбомы');
        MetaTag::set('description', 'Все альбомы ' . $artistAlbums->nickname . ' на нашем сайте. Заходите и скачивайте альбомы '  . $artistAlbums->nickname . '.');

        return view('artists.album', compact('artistAlbums', 'popularAlbums', 'limit'));
    }

    public function artistInterviews($alias)
    {

        $limit = self::PAGINATION_PAGE;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $artistInterviews = Cache::remember('artistInterviewsIndex_' . $alias . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($limit, $alias)
        {
            return Artist::with(['interviews' => function($query) use ($limit){
                return $query->orderCreated()->paginate($limit);
            }])->where('alias', $alias)->status()->first();
        });

        $popularInterviews = Cache::remember('popularInterviews', self::CACHE_TIME_POPULAR, function()
        {
            return Interview::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', $artistInterviews->nickname . ' - Читать все интервью');
        MetaTag::set('description', 'Интересные интервью ' . $artistInterviews->nickname . ' у нас на сайте. Заходите читайте у нас много информации о ' . $artistInterviews->nickname . '.');

        return view('artists.interview', compact('artistInterviews', 'popularInterviews', 'limit'));
    }

    public function artistNews($alias)
    {

        $limit = self::PAGINATION_PAGE;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $artistNews = Cache::remember('artistNewsIndex_' . $alias . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($limit, $alias)
        {
            return Artist::with(['news' => function($query) use ($limit){
                return $query->orderCreated()->paginate($limit);
            }])->where('alias', $alias)->first();
        });

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', $artistNews->nickname . ' - Читать все новости');
        MetaTag::set('description', 'Все новости о ' . $artistNews->nickname . ' у нас на сайте, интересные события и самое интресное о ' . $artistNews->nickname . '.');

        return view('artists.news', compact('artistNews', 'popularNews', 'limit'));
    }

    public function artistLyrics($alias)
    {

        $limit = self::PAGINATION_PAGE;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $artistLyrics = Cache::remember('artistLyricsIndex_' . $alias . '_' . $currentPage, self::CACHE_TIME_ITEM, function() use ($limit, $alias)
        {
            return Artist::with(['lyrics' => function($query) use ($limit){
                return $query->orderCreated()->paginate($limit);
            }])->where('alias', $alias)->status()->first();
        });

        $popularLyrics = Cache::remember('popularLyrics', self::CACHE_TIME_POPULAR, function()
        {
            return Lyrics::select('id', 'artist_name', 'lyrics_name', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', $artistLyrics->nickname . ' - Все тексты песен');
        MetaTag::set('description', 'Все тексты песен ' . $artistLyrics->nickname . ' у нас на сайте. Так же перевод песен ' . $artistLyrics->nickname . '.');

        return view('artists.lyrics', compact('artistLyrics', 'popularLyrics', 'limit'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $artists = Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
            ->status()
            ->with(['ratingArtists' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->where('nickname','LIKE',"%{$q}%")
            ->orderView()
            ->paginate(self::PAGINATION_PAGE);

        $artists->appends(['q' => $q]);

        $popularArtists = Cache::remember('popularArtists', self::CACHE_TIME_POPULAR, function()
        {
            return Artist::select('id', 'nickname', 'image', 'alias', 'rate_count', 'view')
                ->status()->orderRating()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Поиск по исполнителям: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы найдете всех рэп исполнителей их биографию, факты, альбомы, тексты песен и многое другое. Поиск по исполнителям: ' . $q);

        return view('artists.search', compact('artists', 'popularArtists', 'categories', 'q'));
    }

}