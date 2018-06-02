<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class ArticlesController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $articles = Cache::remember('articlesIndex_' . $currentPage, self::CACHE_TIME_ITEM, function()
        {
            return Article::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $articles = Article::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
                ->status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $articles->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularArticles = Cache::remember('popularArticles', self::CACHE_TIME_POPULAR, function()
        {
            return Article::select('id', 'title', 'image', 'alias', 'view', 'created_at')
            ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', 'Статьи на рэп тематику, популярные статьи о реперах');
        MetaTag::set('description', 'На нашем сайте вы найдете интересные статьи о реперах, топы, факты и многое другое.');

        return view('articles.index', compact('articles','popularArticles'));
    }

    public function view($alias, $id)
    {
        $article = Article::with(['artists', 'tags'])
            ->with(['ratingArticles' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->where('id', $id)->first();

        if(empty($article)) abort(404);

        $article->viewedCounter();

        $popularArticles = Cache::remember('popularArticles', self::CACHE_TIME_POPULAR, function()
        {
            return Article::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $otherArticles = Cache::remember('otherArticles_' . $alias . '_' . $id, self::CACHE_TIME_OTHER, function() use ($alias, $id)
        {
            return Article::select('id', 'title', 'alias')
                ->status()->inRandomOrder()->where('id', '!=', $id)->limit(self::LIMIT_OTHER)->get();
        });

        $comments = $article->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $article->title_seo);
        MetaTag::set('description', $article->description_seo);

        return view('articles.view', compact('article', 'popularArticles', 'otherArticles' ,'comments'));
    }

    public function tags($tag)
    {
        $articles = Article::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
            ->with('tags')->whereHas('tags', function($q) use ($tag) {
            return $q->where('tag', 'like', "%{$tag}%");
        })->paginate(self::PAGINATION_PAGE);
        if(count($articles) === 0) abort(404);

        $popularArticles = Cache::remember('popularArticles', self::CACHE_TIME_POPULAR, function()
        {
            return Article::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', 'Статьи по тегу: ' . $tag);
        MetaTag::set('description', 'На нашем сайте вы найдете интересные статьи о реперах, топы, факты и многое другое. Статьи по тегу: ' . $tag);

        return view('articles.tag', compact('articles', 'popularArticles', 'tag'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $articles = Article::select('id', 'title', 'short_content', 'image', 'alias', 'view', 'rate_count', 'created_at')
            ->where('title','LIKE',"%{$q}%")
            ->orWhere('short_content','LIKE',"%{$q}%")
            ->orWhere('full_content','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $articles->appends(['q' => $q]);

        $popularArticles = Cache::remember('popularArticles', self::CACHE_TIME_POPULAR, function()
        {
            return Article::select('id', 'title', 'image', 'alias', 'view', 'created_at')
                ->status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        MetaTag::set('title', 'Поиск по статьям: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы найдете интересные статьи о реперах, топы, факты и многое другое. Поиск по статьям: ' . $q);

        return view('articles.search', compact('articles', 'popularArticles', 'q'));
    }

}