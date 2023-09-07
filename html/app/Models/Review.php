<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public function scopeShop($query, $str)
    {
        if ($str != Null) {
            return $query->where('shop_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeUser($query, $str)
    {
        if ($str != Null) {
            return $query->where('user_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeId($query, $str)
    {
        if ($str != Null) {
            return $query->where('id', $str);
        } else {
            return $query;
        }
    }
}
