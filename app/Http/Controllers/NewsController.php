<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MetaTag;

class NewsController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $news = Cache::remember('newsIndex_' . $currentPage, self::CACHE_TIME_ITEM_NEWS, function()
        {
            return News::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $news = News::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $news->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Все новости о рэп исполнителелях | Рэп новости');
        MetaTag::set('description', 'На нашем сайте вы найдете интересные новости о рэп исполнителелях.');

        return view('news.index', compact('news','popularNews', 'categories'));
    }

    public function view($alias, $id)
    {
        $news = News::with(['artists', 'tags'])
            ->with(['ratingNews' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->where('id', $id)->first();

        if(empty($news)) abort(404);

        $news->viewedCounter();

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $otherNews = Cache::remember('otherNews_' . $alias . '_' . $id, self::CACHE_TIME_OTHER, function() use ($alias, $id)
        {
            return News::select('id', 'title', 'alias')
                ->status()->inRandomOrder()->where('id', '!=', $id)->limit(self::LIMIT_OTHER)->get();
        });

        $comments = $news->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $news->title_seo);
        MetaTag::set('description', $news->description_seo);

        return view('news.view', compact('news', 'popularNews', 'otherNews', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $news = Cache::remember('newsCategory_' . $id . '_' . $currentPage, self::CACHE_TIME_ITEM_NEWS, function() use ($id)
        {
            return News::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderCreated()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $news = News::status()->where('category_id', $id)->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $news->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $category = Category::findOrfail($id);
        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Все новости о рэп исполнителелях по категории: ' . $category->title . ' | Рэп новости');
        MetaTag::set('description', 'На нашем сайте вы найдете интересные новости о рэп исполнителелях по категории: ' . $category->title . '.');

        return view('news.category', compact('news', 'popularNews', 'category', 'categories'));
    }

    public function tags($tag)
    {
        $news = News::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
            ->with('tags')->whereHas('tags', function($q) use ($tag) {
            return $q->where('tag', 'like', "%{$tag}%");
        })->paginate(self::PAGINATION_PAGE);

        if(count($news) === 0) abort(404);

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Рэп новости по тегу: ' . $tag);
        MetaTag::set('description', 'На нашем сайте вы найдете интересные новости о рэп исполнителелях. Рэп новости по тегу: ' . $tag);

        return view('news.tag', compact('news', 'popularNews', 'tag', 'categories'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $news = News::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
            ->where('title','LIKE',"%{$q}%")
            ->orWhere('short_content','LIKE',"%{$q}%")
            ->orWhere('full_content','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $news->appends(['q' => $q]);

        $popularNews = Cache::remember('popularNews', self::CACHE_TIME_POPULAR, function()
        {
            return News::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Поиск новостей: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы найдете интересные новости о рэп исполнителелях. Поиск новостей: ' . $q);

        return view('news.search', compact('news', 'popularNews', 'categories', 'q'));
    }

}