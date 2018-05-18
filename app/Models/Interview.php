<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use App\Models\Relationships\CommentInterview;
use App\Models\Relationships\RatingInterviews;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Interview extends DefaultModel
{

    protected $table = 'interviews';

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
        return $this->belongsToMany(Artist::class, 'interviews_artists');
    }

    public function ratingInterviews(): HasOne
    {
        return $this->hasOne(RatingInterviews::class, 'interview_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentInterview::class);
    }

}