<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;
use App\Models\Lyrics;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentLyrics extends DefaultModel
{

    protected $table = 'comments_lyrics';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'lyrics_id',
        'user_id'
    ];

    public function lyrics(): BelongsTo
    {
        return $this->belongsTo(Lyrics::class, 'lyrics_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}