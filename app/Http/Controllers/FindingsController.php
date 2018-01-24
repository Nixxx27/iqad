<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\action;
use App\action_attachments;
use App\audit_title;
use App\cause;
use App\department;
use App\findings;
use Auth;
use Carbon\carbon;
use DB;
use App\Http\Requests;
use App\Http\Requests\NewFindingsRequest;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Mail;


class FindingsController extends Controller
{
    public $search,$f_num,$u_message,$u_emailadd,$assigned;
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        /**
         * @pass variables
         * @param Asc Desc
         * @param Where
         */
        $sort = $request->input('sort','desc');
        $like = $request->input('like','%');
        $this->search = $request->input('search','%');
        $risk = $request->input('risk','%');
        $like_display = ($like=='%')? '' :  $like ;

        /**
         * @create Pagination
         */
        $finding_tbl = findings::where('finding_num', 'like', '%'.$like . '%')
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
        return view('pages.index',compact('finding_tbl','sort','like','like_display','risk','search') );
    }


    public function about()
    {
        return view('pages.about');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /**
         * $dept_tbl= department::all()
         * @return all Department
         */
        $dept_tbl = department::orderBy('department', 'ASC')->get();


        /**
         * @return last record in default title
         */

        $default_title =audit_title::orderBy('id','desc')->first();


        /**
         * @return all unique Causal_factor 
         */
        $causal_factor  =  cause::orderBy('causal_factor', 'ASC')->groupBy('causal_factor')->get();

        //$test = cause::lists('causal_factor');

        return view('pages.findings.new',compact('dept_tbl','default_title','causal_factor') );
    }


    /*
     * Store a newly created resource in storage.
     *
     * @param  NewFindingsRequest  $request
     * @return Response
     */
    public function store(NewFindingsRequest $request)
    {
        $this->f_num        =   $request['finding_num'];
        $this->u_message    =   $request['message-text'];
        $this->u_emailadd   =   $request['email'];
        $this->assigned     =   $request['assigned_to'];

        /* @param variables */
        if ( $request['risk'] == 'high') {
            $finding_due = Carbon::now()->addDays(4);
            $finding_alert = 'yes';
        } elseif ( $request['risk'] == 'moderate') {
            $finding_due = Carbon::now()->addDays(21);
            $finding_alert = 'yes';
        } else {
            $finding_due = 0;
            $finding_alert = 'no';
        }

        $request['finding_due'] = $finding_due;
        $request['finding_alert'] = $finding_alert;
        $request['entered_by'] = Auth::user()->name;

       findings::create( $request->all() );

        $request['finding_due'] =  $request['finding_due']->format('d M Y');
        Mail::send('pages.email', $request->all(), function($message)
        {
            $message->setPriority(1);
            // $attachment = 'http://localhost:8080/QADapps/storage/excel/exports/2.xls';
            $message->from( 'mail.manager@gmail.com', 'Quality Assurance Dept' );
            $message->to( $this->u_emailadd ,  $this->assigned )->subject('Finding ID :' . $this->f_num);
            $message->addBcc('ict@skygroup.com.ph');

//            $message->setBody(
//                $this->u_message
//           );
//            $message->attach($attachment);
        });

        return redirect('create_new')->with([
            'flash_message' => "Finding succesfully Added!"
        ]);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Return finding details;
        $findings = findings::findorfail($id);
        // Return all actions for this finding;
        $action = action::where('finding_numlink','=',$findings->finding_num)->orderBy('id', 'DESC')->get();
        $action_count = $action->count();
          //  foreach($action as $actions){ $action_num = $actions->action_num;  $action_attachment = action_attachments::where('action_numlink','=',$action_num)->get();}
        // Return all attachments for this finding;
        $action_attachments = new action_attachments();
        // Convert department numeric value to string;
        $department = department::findorfail($findings->department);
        return view('pages.findings.view',compact('id','findings','department','action','action_attachments','action_count') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return "this is $id "  . __function__;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function contact_us()
    {
        $people = [
        'Nikko Zabala',
        'Jinnevib Cantiga',
        'Mine'];
        return view('pages.contact_us',compact('people'));
    }

    public function login()
    {
        return view('pages.login_new');
    }

    public function pagination()
    {

        $finding_tbl = findings::paginate(2);
        $finding_tbl->setPath('pagination');
        return view('pages.pagination',compact('finding_tbl') );
    }

    
}
