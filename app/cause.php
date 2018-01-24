<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cause extends Model
{
    //public $timestamps = false;
    protected $table = 'cause_tbl';

    protected $fillable = [
        'causal_factor',
        'cause_category',
        'item'
    ];
}
