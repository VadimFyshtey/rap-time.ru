<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\Artist;
use App\Models\DefaultModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingArtists extends DefaultModel
{

    protected $table = 'rating_artists';

    public $timestamps = false;

    public function artists(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }

}