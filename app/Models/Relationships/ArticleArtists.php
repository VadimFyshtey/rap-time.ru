<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class ArticleArtists extends DefaultModel
{

    protected $table = 'articles_artists';

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'artist_id',
    ];

}