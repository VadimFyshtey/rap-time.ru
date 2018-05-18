<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class NewsArtists extends DefaultModel
{

    protected $table = 'news_artists';

    public $timestamps = false;

    protected $fillable = [
        'news_id',
        'artist_id',
    ];


}