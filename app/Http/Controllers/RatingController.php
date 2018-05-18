<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Article;
use App\Models\Artist;
use App\Models\Interview;
use App\Models\Lyrics;
use App\Models\News;
use App\Models\Relationships\RatingAlbums;
use App\Models\Relationships\RatingArticles;
use App\Models\Relationships\RatingArtists;
use App\Models\Relationships\RatingInterviews;
use App\Models\Relationships\RatingLyrics;
use App\Models\Relationships\RatingNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends DefaultController
{

    public function rateNews(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $news = News::findOrFail($request->news_id);

            $rating = new RatingNews();
            $rating->news_id = $request->news_id;
            $rating->user_id = Auth::user()->id;;
            $rating->rate = $request->rate;
            $rating->save();

            $news->rate_count = $news->rate_count + $request->rate;
            $news->save();
        }
        return redirect()->back();
    }

    public function rateArtist(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $artist = Artist::findOrFail($request->artist_id);

            $rating = new RatingArtists();
            $rating->artist_id = $request->artist_id;
            $rating->user_id = Auth::user()->id;
            $rating->rate = $request->rate;
            $rating->save();

            $artist->rate_count = $artist->rate_count + $request->rate;
            $artist->save();
        }
        return redirect()->back();
    }

    public function rateAlbum(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $artist = Album::findOrFail($request->album_id);

            $rating = new RatingAlbums();
            $rating->album_id = $request->album_id;
            $rating->user_id = Auth::user()->id;
            $rating->rate = $request->rate;
            $rating->save();

            $artist->rate_count = $artist->rate_count + $request->rate;
            $artist->save();
        }
        return redirect()->back();
    }

    public function rateArticle(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $article = Article::findOrFail($request->article_id);

            $rating = new RatingArticles();
            $rating->article_id = $request->article_id;
            $rating->user_id = Auth::user()->id;
            $rating->rate = $request->rate;
            $rating->save();

            $article->rate_count = $article->rate_count + $request->rate;
            $article->save();
        }
        return redirect()->back();
    }

    public function rateInterview(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $interview = Interview::findOrFail($request->interview_id);

            $rating = new RatingInterviews();
            $rating->interview_id = $request->interview_id;
            $rating->user_id = Auth::user()->id;
            $rating->rate = $request->rate;
            $rating->save();

            $interview->rate_count = $interview->rate_count + $request->rate;
            $interview->save();
        }
        return redirect()->back();
    }

    public function rateLyrics(Request $request)
    {
        if ($request->ajax() && Auth::check()) {

            $lyrics = Lyrics::findOrFail($request->lyrics_id);

            $rating = new RatingLyrics();
            $rating->lyrics_id = $request->lyrics_id;
            $rating->user_id = Auth::user()->id;
            $rating->rate = $request->rate;
            $rating->save();

            $lyrics->rate_count = $lyrics->rate_count + $request->rate;
            $lyrics->save();
        }
        return redirect()->back();
    }

}