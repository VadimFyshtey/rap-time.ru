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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingInterviews extends DefaultModel
{

    protected $table = 'rating_interviews';

    public $timestamps = false;

    public function interview(): BelongsTo
    {
        return $this->belongsTo(Interview::class, 'interview_id', 'id');
    }

}