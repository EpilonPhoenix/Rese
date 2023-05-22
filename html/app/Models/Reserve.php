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
}
