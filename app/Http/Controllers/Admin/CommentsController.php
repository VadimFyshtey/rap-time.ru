<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 16.05.2018
 * Time: 13:04
 */

namespace App\Http\Controllers\Admin;

use App\Models\Relationships\CommentAlbum;
use App\Models\Relationships\CommentArticle;
use App\Models\Relationships\CommentArtist;
use App\Models\Relationships\CommentInterview;
use App\Models\Relationships\CommentLyrics;
use App\Models\Relationships\CommentNews;
use Illuminate\Http\Request;

class CommentsController extends DefaultAdminController
{

    public function indexNews()
    {

        $comments = CommentNews::with('news')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.news', compact('comments'));
    }

    public function deleteNews(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentNews::destroy($id);
            CommentNews::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }


    public function indexArtist()
    {

        $comments = CommentArtist::with('artists')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.artist', compact('comments'));
    }

    public function deleteArtist(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentArtist::destroy($id);
            CommentArtist::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function indexAlbum()
    {

        $comments = CommentAlbum::with('albums')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.album', compact('comments'));
    }

    public function deleteAlbum(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentAlbum::destroy($id);
            CommentAlbum::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function indexLyrics()
    {

        $comments = CommentLyrics::with('lyrics')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.lyrics', compact('comments'));
    }

    public function deleteLyrics(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentLyrics::destroy($id);
            CommentLyrics::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function indexInterview()
    {

        $comments = CommentInterview::with('interviews')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.interview', compact('comments'));
    }

    public function deleteInterview(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentInterview::destroy($id);
            CommentInterview::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function indexArticle()
    {

        $comments = CommentArticle::with('articles')->OrderCreated()->paginate(self::PAGINATION_PAGE);

        return view('admin.comments.article', compact('comments'));
    }

    public function deleteArticle(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentArticle::destroy($id);
            CommentArticle::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

}