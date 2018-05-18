<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\CommentLyrics;
use App\Models\Relationships\NewsTags;
use App\Models\Relationships\RatingLyrics;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lyrics extends DefaultModel
{

    protected $table = 'lyrics';

    public $timestamps = false;

    protected $fillable = [
        'lyrics_name',
        'artist_name',
        'text',
        'translate',
        'alias',
        'status',
        'category_id',
        'view',
        'title_seo',
        'description_seo'
    ];

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'lyrics_artists');
    }

    public function ratingLyrics(): HasOne
    {
        return $this->hasOne(RatingLyrics::class, 'lyrics_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentLyrics::class);
    }

}