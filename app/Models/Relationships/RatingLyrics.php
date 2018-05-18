<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;
use App\Models\Lyrics;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingLyrics extends DefaultModel
{

    protected $table = 'rating_lyrics';

    public $timestamps = false;

    public function lyrics(): BelongsTo
    {
        return $this->belongsTo(Lyrics::class, 'lyrics_id', 'id');
    }

}