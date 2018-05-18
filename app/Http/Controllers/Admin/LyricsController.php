<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LyricsRequest;
use App\Models\Category;
use App\Models\Lyrics;
use App\Models\Relationships\CommentLyrics;
use App\Models\Relationships\LyricsArtists;
use App\Models\Relationships\RatingLyrics;

class LyricsController extends DefaultAdminController
{

    public function index()
    {
        $lyrics = Lyrics::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.lyrics.index', compact('lyrics'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.lyrics.add', compact('categories'));
    }

    public function create(LyricsRequest $request)
    {

        if($request->post()) {
            $lyrics = new Lyrics();

            $lyrics->artist_name = $request->artist_name;
            $lyrics->lyrics_name = $request->lyrics_name;
            $lyrics->text = $request->text;
            $lyrics->translate = $request->translate;
            $lyrics->alias = $request->alias;
            $lyrics->category_id = $request->category_id;
            $lyrics->status = $request->status === 'on' ? 1 : 0;
            $lyrics->video_url = $request->video_url;
            $lyrics->title_seo = $request->title_seo;
            $lyrics->description_seo = $request->description_seo;

            $lyrics->save();

            if($lyrics->id) {

                if(!empty($request->artistLyrics)){
                    foreach ($request->artistLyrics as $artist) {
                        $lyricsArtist = new LyricsArtists();
                        $lyricsArtist->lyrics_id = $lyrics->id;
                        $lyricsArtist->artist_id = $artist;
                        $lyricsArtist->save();
                    }
                }

            }

        }
        return redirect()->route('adminLyricsIndex')->with('status', "Текст песни {$lyrics->artist_name} - {$lyrics->lyrics_name} добавлен.");
    }

    public function edit($id)
    {
        $lyrics = Lyrics::with('artists')->findOrFail($id);
        $category = Category::where('id', $lyrics->category_id)->first();
        $categories = Category::all();

        return view('admin.lyrics.edit', compact('lyrics', 'categories', 'category'));
    }

    public function update(LyricsRequest $request, $id)
    {

        if($request->post()){

            $lyrics = Lyrics::findOrFail($id);

            $lyrics->artist_name = $request->artist_name;
            $lyrics->lyrics_name = $request->lyrics_name;
            $lyrics->text = $request->text;
            $lyrics->translate = $request->translate;
            $lyrics->alias = $request->alias;
            $lyrics->category_id = $request->category_id;
            $lyrics->status = $request->status === 'on' ? 1 : 0;
            $lyrics->video_url = $request->video_url;
            $lyrics->title_seo = $request->title_seo;
            $lyrics->description_seo = $request->description_seo;

            $lyrics->save();

            if($lyrics->id) {
                LyricsArtists::where('lyrics_id', $id)->delete();

                if(!empty($request->artistLyrics)){
                    foreach ($request->artistLyrics as $artist) {
                        $lyricsArtist = new LyricsArtists();
                        $lyricsArtist->lyrics_id = $lyrics->id;
                        $lyricsArtist->artist_id = $artist;
                        $lyricsArtist->save();
                    }
                }

            }
        }
        return redirect()->route('adminLyricsIndex')->with('status', "Текст песни {$lyrics->artist_name} - {$lyrics->lyrics_name} обновлен.");
    }

    public function delete($id)
    {
        LyricsArtists::where('lyrics_id', $id)->delete();
        RatingLyrics::where('lyrics_id', $id)->delete();
        CommentLyrics::where('lyrics_id', $id)->delete();
        $lyrics = Lyrics::findOrFail($id);
        $lyrics->delete();

        return redirect()->back()->with('status', "Текст песни {$lyrics->artist_name} - {$lyrics->lyrics_name} удален.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $lyrics = Lyrics::orderCreated()->where('artist_name','LIKE',"%{$q}%")->orWhere('lyrics_name','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $lyrics->appends(['q' => $q]);
        return view('admin.lyrics.search', compact('lyrics', 'q'));
    }

}
