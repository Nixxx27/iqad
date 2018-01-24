<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public $user_message;

    public function index()
    {
        return view('pages.email');
        $this->user_message =$message;
        Mail::send('pages.email', ['key' => 'value'], function($message)
        {

            $send_to = "nikko Zabala";
            $message->setPriority(1);
            $attachment = 'http://localhost:8080/QADapps/storage/excel/exports/2.xls';
            $message->from( 'mail.manager@gmail.com', 'Quality Assurance Dept' );
            $message->to('nikko.zabala@skygroup.com.ph', $send_to)->subject('Welcome!');
            $message->addCc('kevin.sia@skygroup.com.ph');


            $message->setBody(
                "testst"
            );
            $message->attach($attachment);
        });
    }
}
