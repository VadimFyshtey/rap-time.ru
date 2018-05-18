<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\Artist;
use App\Models\DefaultModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentArtist extends DefaultModel
{

    protected $table = 'comments_artists';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'artist_id',
        'user_id'
    ];

    public function artists(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}