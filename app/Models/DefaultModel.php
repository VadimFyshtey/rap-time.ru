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

class DefaultModel extends Model
{

    public static function scopeStatus(Builder $builder): Builder
    {
        return $builder->where('status', 1);
    }

    public static function scopeOrderRating(Builder $builder): Builder
    {
        return $builder->orderBy('rate_count', 'desc');
    }

    public static function scopeOrderId(Builder $builder): Builder
    {
        return $builder->orderBy('id', 'desc');
    }

    public static function scopeOrderUpdated(Builder $builder): Builder
    {
        return $builder->orderBy('updated_at', 'desc');
    }

    public static function scopeOrderCreated(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }


    public static function scopeOrderView(Builder $builder): Builder
    {
        return $builder->orderBy('view', 'desc');
    }

    public function viewedCounter(){

        if($this->view >= 99999){
            return $this->view = 99999 . '+';
        }
        $this->view += 1;
        return $this->save();
    }
}