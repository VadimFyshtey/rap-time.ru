<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;
use App\Models\News;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingNews extends DefaultModel
{

    protected $table = 'rating_news';

    public $timestamps = false;

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

}