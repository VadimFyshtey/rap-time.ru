<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\Album;
use App\Models\DefaultModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentAlbum extends DefaultModel
{

    protected $table = 'comments_albums';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'album_id',
        'user_id'
    ];

    public function albums(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}