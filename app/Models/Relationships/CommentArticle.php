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
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentArticle extends DefaultModel
{

    protected $table = 'comments_articles';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'article_id',
        'user_id'
    ];

    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}