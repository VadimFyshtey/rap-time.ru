<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use MetaTag;

class ProfileController extends DefaultController
{

    public function index($id)
    {
        if($id != Auth::id()) abort('404');

        $user = User::with(['ratingAlbums' => function($query){
                return $query->with('albums')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }])
            ->with(['ratingLyrics' => function($query){
                return $query->with('lyrics')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }])
            ->with(['ratingArtists' => function($query){
                return $query->with('artists')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }])
            ->with(['ratingInterview' => function($query){
                return $query->with('interview')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }   ])
            ->with(['ratingArticles' => function($query){
                return $query->with('articles')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }])
            ->with(['ratingNews' => function($query){
                return $query->with('news')->orderUpdated()->limit(self::LIMIT_LAST_ACTIVE);
            }])
            ->findOrFail($id);

        MetaTag::set('title', 'Rap-Time.ru | Профиль пользователя ' . $user->name);
        MetaTag::set('description', 'Наш сайт полностью посвящен рэпу, в нас вы найдете биографии, альбомы, новости, тексты песен своих любимых реперов.');

        return view('profile.index', compact('user'));
    }

    public function update($id, ProfileRequest $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->profileName;

        if(isset($request->profileAvatar)){

            $path = public_path() . self::PROFILE_AVATAR_PATH;
            $name = time() . random_int(8, 30) . $this->getExtension($_FILES["profileAvatar"]["name"]);
            if(move_uploaded_file($_FILES["profileAvatar"]["tmp_name"],  $path . $name)){
                $user->avatar = self::PROFILE_AVATAR_PATH . $name;
            }

        }
        $user->save();
        return redirect()->back();
    }

}