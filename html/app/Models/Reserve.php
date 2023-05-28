<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'shop_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'number_of_people' => 'required',
    );
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function scopeUser($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('user_id',$str);
        }else{
            return $query;
        }
    }
    public function scopeShop($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('shop_id',$str);
        }else{
            return $query;
        }
    }
    public function scopeId($query, $str)
    {
        if ($str != Null)
        {
            return $query->find($str);
        }else{
            return $query;
        }
    }

}
