<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AlbumRequest;
use App\Models\Album;
use App\Models\Category;
use App\Models\Relationships\AlbumArtists;
use App\Models\Relationships\CommentAlbum;
use App\Models\Relationships\RatingAlbums;

class AlbumsController extends DefaultAdminController
{

    public function index()
    {
        $albums = Album::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.albums.index', compact('albums'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.albums.add', compact('categories'));
    }

    public function create(AlbumRequest $request)
    {

        if($request->post()) {
            $album = new Album();

            $album->artist_name = $request->artist_name;
            $album->album_name = $request->album_name;
            $album->short_text = $request->short_text;
            $album->short_content = $request->short_content;
            $album->full_content = $request->full_content;
            $album->alias = $request->alias;
            $album->category_id = $request->category_id;
            $album->status = $request->status === 'on' ? 1 : 0;
            $album->link_first = $request->link_first;
            $album->link_second = $request->link_second;
            $album->title_seo = $request->title_seo;
            $album->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::ALBUMS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $album->image = $name;
                }
            }

            $album->save();

            if($album->id) {

                if(!empty($request->artistAlbum)){
                    foreach ($request->artistAlbum as $artist) {
                        $albumArtist = new AlbumArtists();
                        $albumArtist->album_id = $album->id;
                        $albumArtist->artist_id = $artist;
                        $albumArtist->save();
                    }
                }

            }

        }
        return redirect()->route('adminAlbumIndex')->with('status', "Альбом {$album->artist_name} - {$album->album_name} добавлен.");
    }

    public function edit($id)
    {
        $album = Album::with('artists')->findOrFail($id);
        $category = Category::where('id', $album->category_id)->first();
        $categories = Category::all();

        return view('admin.albums.edit', compact('album', 'categories', 'category'));
    }

    public function update(AlbumRequest $request, $id)
    {

        if($request->post()){

            $album = Album::findOrFail($id);

            $album->artist_name = $request->artist_name;
            $album->album_name = $request->album_name;
            $album->short_text = $request->short_text;
            $album->short_content = $request->short_content;
            $album->full_content = $request->full_content;
            $album->alias = $request->alias;
            $album->category_id = $request->category_id;
            $album->status = $request->status === 'on' ? 1 : 0;
            $album->link_first = $request->link_first;
            $album->link_second = $request->link_second;
            $album->title_seo = $request->title_seo;
            $album->description_seo = $request->description_seo;


            if(isset($request->image)){
                $path = public_path() . self::ALBUMS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $album->image = $name;
                }
            }

            $album->save();

            if($album->id) {
                AlbumArtists::where('album_id', $id)->delete();

                if(!empty($request->artistAlbum)){
                    foreach ($request->artistAlbum as $artist) {
                        $albumArtist = new AlbumArtists();
                        $albumArtist->album_id = $album->id;
                        $albumArtist->artist_id = $artist;
                        $albumArtist->save();
                    }
                }

            }
        }
        return redirect()->route('adminAlbumIndex')->with('status', "Альбом {$album->artist_name} - {$album->album_name} обновлен.");
    }

    public function delete($id)
    {
        AlbumArtists::where('album_id', $id)->delete();
        RatingAlbums::where('album_id', $id)->delete();
        CommentAlbum::where('album_id', $id)->delete();
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->back()->with('status', "Альбом {$album->artist_name} - {$album->album_name} удален.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $albums = Album::orderCreated()->where('album_name','LIKE',"%{$q}%")->orWhere('artist_name','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $albums->appends(['q' => $q]);
        return view('admin.albums.search', compact('albums', 'q'));
    }

    public function filter($value = null)
    {
        $value = trim(strip_tags($_GET['value']));
        $albums = Album::orderCreated()->where('status', $value)->paginate(self::PAGINATION_PAGE);
        $albums->appends(['value' => $value]);
        return view('admin.albums.filter', compact('albums'));
    }

}
