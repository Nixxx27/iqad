<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cause;

class CauseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cause_category = cause::orderBy('id', 'DESC')->paginate(10);
        $cause_category->setPath('department');
        return view('pages.cause.index', compact('cause_category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['causal_factor' => 'required|min:2',
            'cause_category' => 'required|min:2',
                'item' => 'required|min:2']);

        cause::create($request->all());
        return redirect('cause_category')->with([
            'flash_message' => "Category succesfully Added!"
        ]);
    }

    public function edit($id)
    {
        $cause = cause::findorfail($id);
        return view('pages.cause.edit', compact('cause'));
    }

    public function update($id, Request $request)
    {
        $cause = cause::findorFail($id);
        $cause->update($request->all()) ;

        return redirect('cause_category')->with([
            'flash_message' => 'Updated Successfull'
        ]);
    }

    public function destroy($id)
    {
        $cause = cause::findorFail($id);
        return view('pages.cause.delete',compact('cause'));

    }

    public function delete($id)
    {
        $cause = cause::findorfail($id);
        $cause->delete();

        return redirect('cause_category')->with([
            'flash_message' => 'Deleted Successfull'
        ]);
    }



}
