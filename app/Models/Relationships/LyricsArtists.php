<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class LyricsArtists extends DefaultModel
{

    protected $table = 'lyrics_artists';

    public $timestamps = false;

    protected $fillable = [
        'lyrics_id',
        'artist_id',
    ];

}