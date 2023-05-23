<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'area' => 'required',
        'genre' => 'required',
        'owner_id' => 'required',
        'name' => 'required',
    );
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function Genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function scopeConcated($query){
        return $query->area->area;
    }

}
