<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models\Relationships;

use App\Models\DefaultModel;

class NewsTags extends DefaultModel
{

    protected $table = 'news_tags';

    public $timestamps = false;

    protected $fillable = [
        'news_id',
        'tag',
    ];

}