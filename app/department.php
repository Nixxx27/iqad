<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //public $timestamps = false;
    protected $table = 'department_tbl';

    protected $fillable = [
        'department',
        'organization'
    ];
}
