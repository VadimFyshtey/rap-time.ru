<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\CommentNews;
use App\Models\Relationships\NewsTags;
use App\Models\Relationships\RatingNews;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends DefaultModel
{

    protected $table = 'news';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'short_text',
        'short_content',
        'full_content',
        'image',
        'alias',
        'status',
        'category_id',
        'view',
        'title_seo',
        'description_seo'
    ];

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'news_artists');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(NewsTags::class);
    }

    public function ratingNews(): HasOne
    {
        return $this->hasOne(RatingNews::class, 'news_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentNews::class);
    }

}