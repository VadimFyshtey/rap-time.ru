<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Relationships\CommentAlbum;
use App\Models\Relationships\CommentArticle;
use App\Models\Relationships\CommentArtist;
use App\Models\Relationships\CommentInterview;
use App\Models\Relationships\CommentLyrics;
use App\Models\Relationships\CommentNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends DefaultController
{
    // SAVE

    public function artistCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentArtist();

            $comment->user_id = $request->user_id;
            $comment->artist_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    public function newsCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentNews();

            $comment->user_id = $request->user_id;
            $comment->news_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    public function albumCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentAlbum();

            $comment->user_id = $request->user_id;
            $comment->album_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    public function lyricsCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentLyrics();

            $comment->user_id = $request->user_id;
            $comment->lyrics_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    public function interviewCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentInterview();

            $comment->user_id = $request->user_id;
            $comment->interview_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    public function articleCommentSave(CommentRequest $request)
    {
        if($request->ajax()) {

            $comment = new CommentArticle();

            $comment->user_id = $request->user_id;
            $comment->article_id =$request->comment_post_ID;
            $comment->parent_id = $request->comment_parent;
            $comment->text = $request->text;
            $comment->save();
        }

        return redirect()->back();
    }

    // DELETE

    public function artistCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentArtist::destroy($id);
            CommentArtist::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function newsCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentNews::destroy($id);
            CommentNews::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function albumCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentAlbum::destroy($id);
            CommentAlbum::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function lyricsCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentLyrics::destroy($id);
            CommentLyrics::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function interviewCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentInterview::destroy($id);
            CommentInterview::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

    public function articleCommentDelete(Request $request, $id)
    {
        if($request->isMethod('get')) {
            CommentArticle::destroy($id);
            CommentArticle::where('parent_id', $id)->delete();
        }

        return redirect()->back();
    }

}
