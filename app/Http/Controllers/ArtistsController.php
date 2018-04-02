<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 14:43
 */

namespace App\Http\Controllers;


use App\Models\Artists;

class ArtistsController extends Controller
{

    public function index()
    {
        $artists = Artists::status()->order()->get();
        return view('artists.index', compact('artists'));
    }

}