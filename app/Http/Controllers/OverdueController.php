<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\findings;
use Carbon\carbon;

class OverdueController extends Controller
{
    public $search;
    public function index(Request $request)
    {
        /**
         * @pass variables
         * @param Asc Desc
         * @param Where
         */
        $sort = $request->input('sort', 'desc');
        $like = $request->input('like', '%');
        $this->search = $request->input('search','%');
        $risk = $request->input('risk', '%');
        $like_display = ($like == '%') ? '' : $like;


        /**
         * @create Pagination
         */
        $date = carbon::parse()->format('Y-m-d');
        $finding_tbl = findings::where('finding_due', '<', $date)
            ->where('finding_alert', '=', 'yes')
            ->where('finding_num', 'like', '%' . $like . '%')
            ->where('id', 'like', '%')
            ->where('risk', 'like', '%'.$risk . '%')
            ->where(function($q){
                $q->Where('finding_category', 'like', '%'.$this->search . '%')
                    ->orWhere('audit_title', 'like', '%'.$this->search . '%')
                    ->orWhere('findings', 'like', '%'.$this->search . '%')
                    ->orWhere('entered_by', 'like', '%'.$this->search . '%')
                    ->orWhere('date_discovered', 'like', '%'.$this->search . '%');
            })
            ->orderBy('id', $sort)->paginate(10);
        $finding_tbl->setPath('home');

        $search =  $this->search;
        return view('pages.findings.overdue', compact('finding_tbl', 'sort', 'like', 'like_display', 'date', 'risk','search'));

    }
}
