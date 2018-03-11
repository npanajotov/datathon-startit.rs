<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $table = 'schools';
    protected $fillable = ['name', 'address', 'city', 'zip', 'phone', 'lat', 'lng', 'type'];
}
