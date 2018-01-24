<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class action extends Model
{
    protected $table = 'action_tbl';
    protected $dates = ['action_due'];

    protected $fillable = array(
        'action_num',
        'finding_numlink',
        'action_status',
        'action_due',
        'actions',

    );

    public function setActionDueAttribute($date)
    {
        $this->attributes['action_due'] = Carbon::parse($date);
    }

    public function findings()
    {
        return $this->belongsTo('App\findings');
    }

}
