<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
	public $timestamps = false;
    protected $table = 'login';

    protected $fillable = [
    	'username',
    	'password'
    ];

}
