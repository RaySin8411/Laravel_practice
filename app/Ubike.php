<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubike extends Model
{
    //
    protected $fillable = [
        'sno',
        'sna',
        'tot',
        'sbi',
        'sarea',
        'mday',
        'lat',
        'lng',
        'ar',
        'snaen',
        'sarean',
        'bemp',
        'act'
    ];
}
