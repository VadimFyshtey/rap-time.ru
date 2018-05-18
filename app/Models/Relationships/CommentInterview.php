<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;
use App\Models\Interview;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentInterview extends DefaultModel
{

    protected $table = 'comments_interviews';

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = [
        'text',
        'parent_id',
        'interview_id',
        'user_id'
    ];

    public function interviews(): BelongsTo
    {
        return $this->belongsTo(Interview::class, 'interview_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}