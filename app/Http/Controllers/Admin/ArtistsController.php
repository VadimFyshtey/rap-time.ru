<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArtistRequest;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Artist;
use App\Models\Category;
use App\Models\News;
use App\Models\Relationships\AlbumArtists;
use App\Models\Relationships\ArticleArtists;
use App\Models\Relationships\CommentArtist;
use App\Models\Relationships\CommentNews;
use App\Models\Relationships\InterviewArtists;
use App\Models\Relationships\LyricsArtists;
use App\Models\Relationships\NewsArtists;
use App\Models\Relationships\NewsTags;
use App\Models\Relationships\RatingArtists;
use App\Models\Relationships\RatingNews;
use Illuminate\Http\Request;

class ArtistsController extends DefaultAdminController
{

    public function index()
    {
        $artists = Artist::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.artists.index', compact('artists'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.artists.add', compact('categories'));
    }

    public function create(ArtistRequest $request)
    {

        if($request->post()) {
            $artist = new Artist();

            $artist->full_name = $request->full_name;
            $artist->birthday = $request->birthday;
            $artist->location = $request->location;
            $artist->nickname = $request->nickname;
            $artist->short_text = $request->short_text;
            $artist->biography = $request->biography;
            $artist->alias = $request->alias;
            $artist->category_id = $request->category_id;
            $artist->status = $request->status === 'on' ? 1 : 0;
            $artist->official_site = $request->official_site;
            $artist->fan_site = $request->fan_site;
            $artist->social_vk = $request->social_vk;
            $artist->social_facebook = $request->social_facebook;
            $artist->social_instagram = $request->social_instagram;
            $artist->social_twitter = $request->social_twitter;
            $artist->social_soundcloud = $request->social_soundcloud;
            $artist->social_youtube = $request->social_youtube;
            $artist->title_seo = $request->title_seo;
            $artist->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::ARTIST_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $artist->image = $name;
                }
            }

            $artist->save();

        }
        return redirect()->route('adminArtistIndex')->with('status', "Исполнитель {$artist->nickname} добавлен.");
    }

    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        $category = Category::where('id', $artist->category_id)->first();
        $categories = Category::all();

        return view('admin.artists.edit', compact('artist', 'categories', 'category'));
    }

    public function update(ArtistRequest $request, $id)
    {

        if($request->post()){

            $artist = Artist::findOrFail($id);

            $artist->full_name = $request->full_name;
            $artist->birthday = $request->birthday;
            $artist->location = $request->location;
            $artist->nickname = $request->nickname;
            $artist->short_text = $request->short_text;
            $artist->biography = $request->biography;
            $artist->alias = $request->alias;
            $artist->category_id = $request->category_id;
            $artist->status = $request->status === 'on' ? 1 : 0;
            $artist->official_site = $request->official_site;
            $artist->fan_site = $request->fan_site;
            $artist->social_vk = $request->social_vk;
            $artist->social_facebook = $request->social_facebook;
            $artist->social_instagram = $request->social_instagram;
            $artist->social_twitter = $request->social_twitter;
            $artist->social_soundcloud = $request->social_soundcloud;
            $artist->social_youtube = $request->social_youtube;
            $artist->title_seo = $request->title_seo;
            $artist->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::NEWS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $artist->image = $name;
                }
            }

            $artist->save();

        }
        return redirect()->route('adminArtistIndex')->with('status', "Исполнитель {$artist->nickname} обновлен.");
    }

    public function delete($id)
    {
        NewsArtists::where('artist_id', $id)->delete();
        InterviewArtists::where('artist_id', $id)->delete();
        LyricsArtists::where('artist_id', $id)->delete();
        ArticleArtists::where('artist_id', $id)->delete();
        AlbumArtists::where('artist_id', $id)->delete();
        RatingArtists::where('artist_id', $id)->delete();
        CommentArtist::where('artist_id', $id)->delete();
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->back()->with('status', "Исполнитель {$artist->nickname} удален.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $artists = Artist::orderCreated()->where('nickname','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $artists->appends(['q' => $q]);
        return view('admin.artists.search', compact('artists', 'q'));
    }

    public function filter($value = null)
    {
        $value = trim(strip_tags($_GET['value']));
        $artists = Artist::orderCreated()->where('status', $value)->paginate(self::PAGINATION_PAGE);
        $artists->appends(['value' => $value]);
        return view('admin.artists.filter', compact('artists'));
    }

}
