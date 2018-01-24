<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\audit_title;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TitleController extends Controller
{
    public function set_default_audit_title(Request $request)
    {
        $this->validate($request,
            ['audit_title' => 'required|min:4'] );
        
       audit_title::create( $request->all() );

		return redirect('create_new')->with([
            'flash_message' => "Successfully Set Default Audit Title!"
        ]);
    }
}
