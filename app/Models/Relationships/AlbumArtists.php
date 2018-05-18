<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class AlbumArtists extends DefaultModel
{

    protected $table = 'albums_artists';

    public $timestamps = false;

    protected $fillable = [
        'album_id',
        'artist_id',
    ];

}