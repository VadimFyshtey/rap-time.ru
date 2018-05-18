<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MetaTag;

class InterviewsController extends DefaultController
{

    public function index(Request $sort, $by = null)
    {

        $interviews = Cache::remember('interviewsIndex', self::CACHE_TIME_ITEM, function()
        {
            return Interview::status()->orderCreated()->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $interviews = Interview::status()->orderBy($sort->sort, $by)->paginate(self::PAGINATION_PAGE);
            $interviews->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularInterviews = Cache::remember('popularInterviewsIndex', self::CACHE_TIME_POPULAR, function()
        {
            return Interview::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Все интервью рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы найдете все интервью рэп исполнителей.');

        return view('interviews.index', compact('interviews' ,'popularInterviews', 'categories'));
    }

    public function view($alias, $id)
    {
        $interview = Interview::with('artists')
            ->with(['ratingInterviews' => function($query){
                return $query->where('user_id', Auth::id());
            }])
            ->with(['comments' => function($query){
                return $query->with('user');
            }])
            ->status()->where('alias', $alias)->first();

        if(empty($interview)) abort(404);

        $interview->viewedCounter();

        $popularInterviews = Cache::remember('popularInterviewsView', self::CACHE_TIME_POPULAR, function()
        {
            return Interview::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $comments = $interview->comments->groupBy('parent_id')->map(function($groupItems){
            return $groupItems->sortByDesc('created_at');
        });

        MetaTag::set('title', $interview->title_seo);
        MetaTag::set('description', $interview->description_seo);

        return view('interviews.view', compact('interview', 'popularInterviews', 'comments'));
    }

    public function category($alias, $id, Request $sort, $by = null)
    {

        $interviews = Cache::remember('interviewsCategory', self::CACHE_TIME_ITEM, function() use ($id)
        {
            return Interview::status()->orderCreated()->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
        });

        if(!empty($sort->sort) || !empty($by)) {
            $by = $sort->by;
            $interviews = Interview::status()->orderBy($sort->sort, $by)->where('category_id', $id)->paginate(self::PAGINATION_PAGE);
            $interviews->appends(['sort' => $sort->sort, 'by' => $by]);
        }

        $popularInterviews = Cache::remember('popularInterviewsCategory', self::CACHE_TIME_POPULAR, function() use ($id)
        {
            return Interview::status()->orderView()->where('category_id', $id)->limit(self::LIMIT_POPULAR)->get();
        });

        $category = Category::findOrfail($id);
        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', $category->title . ' интервью рэп исполнителей');
        MetaTag::set('description', 'На нашем сайте вы найдете ' . $category->title . ' интервью рэп исполнителей.');

        return view('interviews.category', compact('interviews', 'popularInterviews', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $interviews = Interview::where('title','LIKE',"%{$q}%")
            ->orWhere('full_content','LIKE',"%{$q}%")
            ->status()
            ->orderId()
            ->paginate(self::PAGINATION_PAGE);

        $interviews->appends(['q' => $q]);

        $popularInterviews = Cache::remember('popularInterviewsSearch', self::CACHE_TIME_POPULAR, function()
        {
            return Interview::status()->orderView()->limit(self::LIMIT_POPULAR)->get();
        });

        $categories = Cache::remember('categories', self::CACHE_TIME_CATEGORIES, function()
        {
            return Category::status()->orderId()->get();
        });

        MetaTag::set('title', 'Поиск по интервью: ' . $q);
        MetaTag::set('description', 'На нашем сайте вы найдете все интервью рэп исполнителей. Поиск по интервью: ' . $q);

        return view('interviews.search', compact('interviews', 'popularInterviews', 'categories', 'q'));
    }

}