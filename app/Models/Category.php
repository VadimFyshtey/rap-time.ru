<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

class Category extends DefaultModel
{

    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'status',
        'alias',
    ];

}