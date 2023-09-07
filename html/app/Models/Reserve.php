<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class Reserve extends Model
{
    use HasFactory;

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }
    public function uniqueIds()
    {
        return ['id'];
    }
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'shop_id', 'reservationstatuses_id', 'date', 'time', 'number_of_people'];
    protected $keyType = 'string';

    public static $rules = array(
        'id' => 'required',
        'user_id' => 'required',
        'shop_id' => 'required',
        'reservationstatuses_id' => 'required',
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
    public function Reservationstatus()
    {
        return $this->belongsTo('App\Models\Reservationstatus');
    }

    public function scopeUser($query, $str)
    {
        if ($str != Null) {
            return $query->where('user_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeShop($query, $str)
    {
        if ($str != Null) {
            return $query->where('shop_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeId($query, $str)
    {
        if ($str != Null) {
            return $query->find($str);
        } else {
            return $query;
        }
    }
    public function scopeDate($query, $str)
    {
        if ($str != Null) {
            return $query->where('date', $str);
        } else {
            return $query;
        }
    }
}
