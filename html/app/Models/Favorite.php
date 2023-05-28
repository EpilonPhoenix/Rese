<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class Favorite extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id',function (Builder $builder){
            $user_id =Auth::id();
            $builder->where('user_id',$user_id);
        });
    }
    public function Shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function scopeShopId($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('shop_id',$str);
        }else{
            return $query;
        }
    }

}

