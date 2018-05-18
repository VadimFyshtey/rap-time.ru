<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\ArticleTags;
use App\Models\Relationships\CommentArticle;
use App\Models\Relationships\RatingArticles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends DefaultModel
{

    protected $table = 'articles';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'short_text',
        'short_content',
        'full_content',
        'image',
        'alias',
        'status',
        'view',
        'title_seo',
        'description_seo'
    ];

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'articles_artists');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(ArticleTags::class);
    }

    public function ratingArticles(): HasOne
    {
        return $this->hasOne(RatingArticles::class, 'article_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentArticle::class);
    }

}