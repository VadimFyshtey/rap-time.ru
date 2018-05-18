<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class InterviewArtists extends DefaultModel
{

    protected $table = 'interviews_artists';

    public $timestamps = false;

    protected $fillable = [
        'interview_id',
        'artist_id',
    ];

}