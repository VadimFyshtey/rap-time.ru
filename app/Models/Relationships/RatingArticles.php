<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\Article;
use App\Models\DefaultModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingArticles extends DefaultModel
{

    protected $table = 'rating_articles';

    public $timestamps = false;

    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

}