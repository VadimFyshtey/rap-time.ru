<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\CommentArtist;
use App\Models\Relationships\RatingArtists;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Pagination\LengthAwarePaginator;

class Artist extends DefaultModel
{

    protected $table = 'artists';

    public $timestamps = false;

    protected $fillable = [
        'nickname',
        'full_name',
        'birthday',
        'location',
        'short_text',
        'biography',
        'image',
        'alias',
        'official_site',
        'fan_site',
        'social_vk',
        'social_facebook',
        'social_instagram',
        'social_twitter',
        'social_soundcloud',
        'social_youtube',
        'status',
        'category_id',
        'view',
        'popular'
    ];

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class, 'albums_artists');
    }

    public function interviews(): BelongsToMany
    {
        return $this->belongsToMany(Interview::class, 'interviews_artists');
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_artists');
    }

    public function lyrics(): BelongsToMany
    {
        return $this->belongsToMany(Lyrics::class, 'lyrics_artists');
    }

    public function ratingArtists(): HasOne
    {
        return $this->hasOne(RatingArtists::class, 'artist_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentArtist::class);
    }

}