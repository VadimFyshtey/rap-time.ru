<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MetaTag;

class AlbumsController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {

        $albums = Cache::remember('albumsIndex', self::CACHE_TIME_ITEM, function()
        {
            return Album::status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $albums = Album::status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $albums->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularAlbums = Cache::remember('popularAlbumsIndex', self::CACHE_TIME_POPULAR, function()
        {
            return Album::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Скачать все альбомы рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы сможете скачать абсолютно любой рэп альбом бесплатно и без регистрации.');

        return view('albums.index', compact('albums', 'popularAlbums', 'categories'));
    }

    public function view($alias, $id)
    {

        $album = Album::with('artists')
            ->with(['ratingAlbums' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->where('id', $id)->first();

        if(empty($album)) abort(404);

        $album->viewedCounter();

        $popularAlbums = Cache::remember('popularAlbumsView', self::CACHE_TIME_POPULAR, function()
        {
            return Album::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $comments = $album->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $album->title_seo);
        MetaTag::set('description', $album->description_seo);

        return view('albums.view', compact('album', 'popularAlbums', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $albums = Cache::remember('albumsCategory', self::CACHE_TIME_ITEM, function() use ($id)
        {
            return Album::status()->orderCreated()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $albums = Album::status()->where('category_id', $id)->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $albums->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularAlbums = Cache::remember('popularAlbumsCategory', self::CACHE_TIME_POPULAR, function() use ($id)
        {
            return Album::status()->orderView()->where('category_id', $id)->limit(self::LIMIT_POPULAR)->get();
        });

        $category = Category::findOrfail($id);
        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Скачать все ' . $category->title . ' альбомы рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы сможете скачать абсолютно любые ' . $category->title . ' рэп альбомы бесплатно и без регистрации.');

        return view('albums.category', compact('albums', 'popularAlbums', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));
        $albums = Album::where('artist_name','LIKE',"%{$q}%")
            ->orWhere('album_name','LIKE',"%{$q}%")
            ->orWhere('short_content','LIKE',"%{$q}%")
            ->orWhere('full_content','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $albums->appends(['q' => $q]);

        $popularAlbums = Cache::remember('popularAlbumsSearch', self::CACHE_TIME_POPULAR, function()
        {
            return Album::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });


        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Поиск по альбомам: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы сможете скачать абсолютно любой рэп альбом бесплатно и без регистрации.');

        return view('albums.search', compact('albums', 'popularAlbums', 'categories', 'q'));
    }
}