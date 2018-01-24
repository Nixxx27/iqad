<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audit_title extends Model
{
    protected $table = 'default_title';
    protected $fillable = ['audit_title'];
}
