<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\carbon;

class findings extends Model
{
    protected $table = 'finding_tbl';
    protected $dates = ['finding_due','date_discovered'];




    protected $fillable = [
        'audit_title',
        'finding_num',
        'finding_category',
        'risk',
        'findings',
        'department',
        'finding_status',
        'finding_due',
        'entered_by',
        'reference',
        'repeat_finding',
        'assigned_to',
        'date_discovered',
        'email',
        'descriptor',
        'cause',
        'person_org',
        'cause_category',
        'item',
        'remarks',
        "finding_alert"
    ];


//    public function setFindingNumAttribute($val)
//    {
//        $this->attributes['finding_num'] = 'F' . substr(Carbon::parse()->year, -2) . "-" . $val;
//    }

    public function setDateDiscoveredAttribute($date)
    {
        $this->attributes['date_discovered'] = Carbon::parse($date);
    }


    public function setFindingDueAttribute($date)
    {
        $this->attributes['finding_due'] = Carbon::parse($date);
//        if ($finding == 'high') {
//            $finding_due = Carbon::now()->addDays(4);
//            $finding_alert = 'yes';
//        } elseif ($finding == 'moderate') {
//            $finding_due = Carbon::now()->addDays(21);
//            $finding_alert = 'yes';
//        } else {
//            $finding_due = 0;
//            $finding_alert = 'no';
//        }
//
//        $this->attributes['finding_due'] = $finding_due;
//        $this->attributes['finding_alert'] = $finding_alert;

    }





}