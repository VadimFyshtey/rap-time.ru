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
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentNews extends DefaultModel
{

    protected $table = 'comments_news';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'news_id',
        'user_id'
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}