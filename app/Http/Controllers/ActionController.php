<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use carbon\carbon;
use App\action;
use App\action_attachments;
use App\findings;

class ActionController extends Controller
{
    public function action_new($finding_num)
    {
        return view('pages.action.new',compact('finding_num') );
    }

    public function store(Request $request ,$finding_num)
    {
        $this->validate($request,
            [   'action_num' => 'required|min:2',
                'action_status' =>  'required|min:2',
                'action_due'    =>  'required|date_format:d M Y',
                'actions'       =>  'required|min:5'] );
        /*
         * Upload Attachments
         */
        if ($request->hasFile('attachments'))
        {
                $msg = 'uploaded';
                $files = $request['attachments'];
                $file_count = count($files);
                $uploadcount = 0;
                foreach ($files as $file) {

                    $date = carbon::now()->format('Ymd');
                    $destinationPath = "attachments/" . $date;
                    $filename = $file->getClientOriginalName();
                    $upload_success = $file->move($destinationPath, $filename);

                    /*
                     * Add Attachment to Database
                     */
                    action_attachments::create([
                        'action_numlink' => $request['action_num'],
                        'location' => $destinationPath ."/" . $filename,
                        'attachment' => $filename,
                    ]);

                    $uploadcount++;
                }
            }

        /*
         * Update finding_tbl finding_alert
         */
        $aa = findings::where('finding_num','=',$finding_num)->get();
            foreach($aa as $ab){
                $ab->finding_alert = 'no';
                $ab->save();
            }

         /*
         * Create new Action into Database
         */
        $request['finding_numlink'] = $finding_num;
        action::create($request->all());
         return redirect('home')->with([
            'flash_message' => "Action Successfully Created !"
        ]);
     }
}
