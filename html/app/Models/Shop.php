<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
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
    protected $fillable = ['id','area_id','genre_id','user_id','date','time','name','about','picture'];
    protected $keyType = 'string';

    public static $rules = array(
        'area_id' => 'required',
        'genre_id' => 'required',
        'user_id' => 'required',
        'name' => 'required',
    );
    public function Area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function Genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function Favorite()
    {
        return $this->hasOne('App\Models\Favorite');
    }
    public function scopeArea($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('area_id',$str);
        }else{
            return $query;
        }
    }
    public function scopeGenre($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('genre_id',$str);
        }else{
            return $query;
        }
    }
    public function scopeSearch($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('name','like','%'.$str.'%');
        }else{
            return $query;
        }
    }
    public function scopeId($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('id',$str);
        }else{
            return $query;
        }
    }
    public function scopeOwner($query, $str)
    {
        if ($str != Null)
        {
            return $query->where('user_id',$str);
        }else{
            return $query;
        }
    }


}
