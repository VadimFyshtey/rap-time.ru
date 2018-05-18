<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Models\Relationships\CommentAlbum;
use App\Models\Relationships\CommentArticle;
use App\Models\Relationships\CommentArtist;
use App\Models\Relationships\CommentInterview;
use App\Models\Relationships\CommentLyrics;
use App\Models\Relationships\CommentNews;
use App\Models\Relationships\RatingAlbums;
use App\Models\Relationships\RatingArticles;
use App\Models\Relationships\RatingArtists;
use App\Models\Relationships\RatingInterviews;
use App\Models\Relationships\RatingLyrics;
use App\Models\Relationships\RatingNews;
use App\Models\Role;
use App\Models\User;

class UsersController extends DefaultAdminController
{

    public function index()
    {
        $users = User::with('roles')->paginate(self::PAGINATION_PAGE);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);

        $role = Role::where('id', $user->role_id)->first();
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'role', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {

        if($request->post()){

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->is_banned = $request->is_banned === 'on' ? 1 : 0;
            $user->comment = $request->comment;

            if(isset($request->avatar)){
                $path = public_path() . self::USERS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['avatar']['name']);
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"],  $path . $name)){
                    $user->avatar = self::USERS_IMAGE_PATH . '/' . $name;
                }
            }

            $user->save();
        }
        return redirect()->route('adminUserIndex')->with('status', "Пользователь {$user->name} обновлен.");
    }

    public function delete($id)
    {
        RatingNews::where('user_id', $id)->delete();
        RatingArtists::where('user_id', $id)->delete();
        RatingLyrics::where('user_id', $id)->delete();
        RatingArticles::where('user_id', $id)->delete();
        RatingInterviews::where('user_id', $id)->delete();
        RatingAlbums::where('user_id', $id)->delete();

        CommentNews::where('user_id', $id)->delete();
        CommentArtist::where('user_id', $id)->delete();
        CommentLyrics::where('user_id', $id)->delete();
        CommentArticle::where('user_id', $id)->delete();
        CommentInterview::where('user_id', $id)->delete();
        CommentAlbum::where('user_id', $id)->delete();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('status', "Пользователь {$user->name} удален.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $users = User::where('name','LIKE',"%{$q}%")->orWhere('email','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $users->appends(['q' => $q]);
        return view('admin.users.search', compact('users', 'q'));
    }

}
