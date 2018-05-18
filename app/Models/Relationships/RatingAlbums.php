<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\Album;
use App\Models\DefaultModel;

class RatingAlbums extends DefaultModel
{

    protected $table = 'rating_albums';

    public $timestamps = false;

    public function albums()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}