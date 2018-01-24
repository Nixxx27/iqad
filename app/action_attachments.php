<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class action_attachments extends Model
{
    protected $table = 'action_attachment_tbl';

    protected $fillable = [
        'action_numlink',
        'attachment',
        'location'
    ];
}
