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

}