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
    protected $fillable = ['id', 'area_id', 'genre_id', 'user_id', 'date', 'time', 'name', 'about', 'picture'];
    protected $keyType = 'string';

    public static $rules = array(
        'area_id' => 'required',
        'genre_id' => 'required',
        'user_id' => 'required',
        'name' => 'required', 'max:50'
    );
    #CSV処理関連
    public function csvHeader(): array
    {
        return [
            'area_id',
            'genre_id',
            'name',
            'about',
        ];
    }
    public function getCsvData(): \Illuminate\Support\Collection
    {
        $data = DB::table('shops')->get();
        return $data;
    }
    public function insertRow($row): array
    {
        return [
            $row->area_id,
            $row->genre_id,
            $row->name,
            $row->about,
        ];
    }
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
    public function Review()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function scopeArea($query, $str)
    {
        if ($str != Null) {
            return $query->where('area_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeGenre($query, $str)
    {
        if ($str != Null) {
            return $query->where('genre_id', $str);
        } else {
            return $query;
        }
    }
    public function scopeSearch($query, $str)
    {
        if ($str != Null) {
            return $query->where('name', 'like', '%' . $str . '%');
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
    public function scopeOwner($query, $str)
    {
        if ($str != Null) {
            return $query->where('user_id', $str);
        } else {
            return $query;
        }
    }
}
