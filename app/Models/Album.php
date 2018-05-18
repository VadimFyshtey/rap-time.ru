<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\CommentAlbum;
use App\Models\Relationships\RatingAlbums;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends DefaultModel
{

    protected $table = 'albums';

    public $timestamps = false;

    protected $fillable = [
        'artist_name',
        'album_name',
        'short_text',
        'short_content',
        'full_content',
        'image',
        'alias',
        'status',
        'category_id',
        'view',
        'link_first',
        'link_second',
        'title_seo',
        'description_seo'
    ];

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'albums_artists');
    }

    public function ratingAlbums(): HasOne
    {
        return $this->hasOne(RatingAlbums::class, 'album_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentAlbum::class);
    }

}