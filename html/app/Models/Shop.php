<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    // use HasUuids;
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    
    protected $primaryKey = 'id';
    protected $guarded = array('id');
    protected $keyType = 'string';

    public static $rules = array(
        'area' => 'required',
        'genre' => 'required',
        'owner_id' => 'required',
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

}
