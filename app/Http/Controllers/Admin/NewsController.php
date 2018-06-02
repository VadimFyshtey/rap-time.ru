<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Relationships\CommentNews;
use App\Models\Relationships\NewsArtists;
use App\Models\Relationships\NewsTags;
use App\Models\Relationships\RatingNews;
use Illuminate\Http\Request;

class NewsController extends DefaultAdminController
{

    public function index()
    {
        $news = News::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.news.index', compact('news'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.news.add', compact('categories'));
    }

    public function create(NewsRequest $request)
    {

        if($request->post()) {
            $news = new News();

            $news->title = $request->title;
            $news->short_text = $request->short_text;
            $news->short_content = $request->short_content;
            $news->full_content = $request->full_content;
            $news->alias = $request->alias;
            $news->category_id = $request->category_id;
            $news->status = $request->status === 'on' ? 1 : 0;
            $news->title_seo = $request->title_seo;
            $news->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::NEWS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $news->image = $name;
                }
            }

            $news->save();

            if($news->id) {

                if(!empty($request->tagsNews)){
                    foreach ($request->tagsNews as $tag) {
                        $newsTags = new NewsTags();
                        $newsTags->news_id = $news->id;
                        $newsTags->tag = $tag;
                        $newsTags->save();
                    }
                }

                if(!empty($request->artistNews)){
                    foreach ($request->artistNews as $artist) {
                        $newsArtist = new NewsArtists();
                        $newsArtist->news_id = $news->id;
                        $newsArtist->artist_id = $artist;
                        $newsArtist->save();
                    }
                }

            }

        }
        return redirect()->route('adminNewsIndex')->with('status', "Новость {$news->title} добавлена.");
    }

    public function edit($id)
    {
        $news = News::with(['tags', 'artists'])->findOrFail($id);
        $category = Category::where('id', $news->category_id)->first();
        $categories = Category::all();

        return view('admin.news.edit', compact('news', 'categories', 'category'));
    }

    public function update(NewsRequest $request, $id)
    {

        if($request->post()){

            $news = News::findOrFail($id);

            $news->title = $request->title;
            $news->short_text = $request->short_text;
            $news->short_content = $request->short_content;
            $news->full_content = $request->full_content;
            $news->alias = $request->alias;
            $news->category_id = $request->category_id;
            $news->status = $request->status === 'on' ? 1 : 0;
            $news->title_seo = $request->title_seo;
            $news->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::NEWS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $news->image = $name;
                }
            }

            $news->save();

            if($news->id) {
                NewsArtists::where('news_id', $id)->delete();
                NewsTags::where('news_id', $id)->delete();
                if(!empty($request->tagsNews)){
                    foreach ($request->tagsNews as $tag) {
                        $newsTags = new NewsTags();
                        $newsTags->news_id = $news->id;
                        $newsTags->tag = $tag;
                        $newsTags->save();
                    }
                }

                if(!empty($request->artistNews)){
                    foreach ($request->artistNews as $artist) {
                        $newsArtist = new NewsArtists();
                        $newsArtist->news_id = $news->id;
                        $newsArtist->artist_id = $artist;
                        $newsArtist->save();
                    }
                }

            }
        }
        return redirect()->route('adminNewsIndex')->with('status', "Новость {$news->title} обновлена.");
    }

    public function delete($id)
    {
        NewsArtists::where('news_id', $id)->delete();
        NewsTags::where('news_id', $id)->delete();
        RatingNews::where('news_id', $id)->delete();
        CommentNews::where('news_id', $id)->delete();
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('status', "Новость {$news->title} удалена.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $news = News::orderCreated()->where('title','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $news->appends(['q' => $q]);
        return view('admin.news.search', compact('news', 'q'));
    }

    public function filter($value = null)
    {
        $value = trim(strip_tags($_GET['value']));
        $news = News::orderCreated()->where('status', $value)->paginate(self::PAGINATION_PAGE);
        $news->appends(['value' => $value]);
        return view('admin.news.filter', compact('news'));
    }

}
