<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 31.03.2018
 * Time: 15:36
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Artists extends Model
{

    protected $table = 'artists';


    protected $fillable = [
        'nickname',
        'full_name',
        'birthday',
        'location',
        'short_text',
        'biography',
        'image',
        'alias',
        'official_site',
        'fan_site',
        'social_vk',
        'social_facebook',
        'social_instagram',
        'social_twitter',
        'social_soundcloud',
        'social_youtube',
        'status'
    ];

    public static function scopeStatus(Builder $builder): Builder
    {
        return $builder->where('status', 1);
    }

    public static function scopeOrder(Builder $builder): Builder
    {
        return $builder->orderBy('id', 'desc');
    }

}