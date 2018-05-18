<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Relationships\ArticleArtists;
use App\Models\Relationships\ArticleTags;
use App\Models\Relationships\CommentArticle;
use App\Models\Relationships\RatingArticles;

class ArticlesController extends DefaultAdminController
{

    public function index()
    {
        $articles = Article::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.articles.index', compact('articles'));
    }

    public function add()
    {
        return view('admin.articles.add');
    }

    public function create(ArticleRequest $request)
    {

        if($request->post()) {
            $article = new Article();

            $article->title = $request->title;
            $article->short_text = $request->short_text;
            $article->short_content = $request->short_content;
            $article->full_content = $request->full_content;
            $article->alias = $request->alias;
            $article->status = $request->status === 'on' ? 1 : 0;
            $article->title_seo = $request->title_seo;
            $article->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::ARTICLES_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $article->image = $name;
                }
            }

            $article->save();

            if($article->id) {

                if(!empty($request->tagsArticle)){
                    foreach ($request->tagsArticle as $tag) {
                        $articleTags = new ArticleTags();
                        $articleTags->article_id = $article->id;
                        $articleTags->tag = $tag;
                        $articleTags->save();
                    }
                }

                if(!empty($request->artistArticle)){
                    foreach ($request->artistArticle as $artist) {
                        $articleArtist = new ArticleArtists();
                        $articleArtist->article_id = $article->id;
                        $articleArtist->artist_id = $artist;
                        $articleArtist->save();
                    }
                }

            }

        }
        return redirect()->route('adminArticleIndex')->with('status', "Статью {$article->title} добавлено.");
    }

    public function edit($id)
    {
        $article = Article::with(['tags', 'artists'])->findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {

        if($request->post()){

            $article = Article::findOrFail($id);

            $article->title = $request->title;
            $article->short_text = $request->short_text;
            $article->short_content = $request->short_content;
            $article->full_content = $request->full_content;
            $article->alias = $request->alias;
            $article->status = $request->status === 'on' ? 1 : 0;
            $article->title_seo = $request->title_seo;
            $article->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::ARTICLES_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $article->image = $name;
                }
            }

            $article->save();

            if($article->id) {
                ArticleArtists::where('article_id', $id)->delete();
                ArticleTags::where('article_id', $id)->delete();
                if(!empty($request->tagsArticle)){
                    foreach ($request->tagsArticle as $tag) {
                        $articleTags = new ArticleTags();
                        $articleTags->article_id = $article->id;
                        $articleTags->tag = $tag;
                        $articleTags->save();
                    }
                }

                if(!empty($request->artistArticle)){
                    foreach ($request->artistArticle as $artist) {
                        $articleArtist = new ArticleArtists();
                        $articleArtist->article_id = $article->id;
                        $articleArtist->artist_id = $artist;
                        $articleArtist->save();
                    }
                }

            }
        }
        return redirect()->route('adminArticleIndex')->with('status', "Статью {$article->title} обновлено.");
    }

    public function delete($id)
    {
        ArticleArtists::where('article_id', $id)->delete();
        ArticleTags::where('article_id', $id)->delete();
        RatingArticles::where('article_id', $id)->delete();
        CommentArticle::where('article_id', $id)->delete();
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('status', "Статью {$article->title} удалено.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $articles = Article::orderCreated()->where('title','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $articles->appends(['q' => $q]);
        return view('admin.articles.search', compact('articles', 'q'));
    }

}
