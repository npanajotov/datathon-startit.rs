<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betting extends Model
{
    protected $table = 'betting';
    protected $fillable = ['name', 'address', 'city', 'zip', 'phone', 'lat', 'lng'];
//    public $timestamps = false;
}
