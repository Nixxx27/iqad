<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\department;


class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $department = department::orderBy('id', 'DESC')->paginate(10);
        $department->setPath('department');
        return view('pages.department.index', compact('department'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['department' => 'required|min:2',
                'organization' => 'required|min:2']);

        department::create($request->all());
        return redirect('department')->with([
            'flash_message' => "Department succesfully Added!"
        ]);
    }


    public function edit($id)
    {
        $dept = department::findorfail($id);
        return view('pages.department.edit', compact('dept'));
    }

    public function update($id, Request $request)
    {
        $dept = department::findorFail($id);
        $dept->update($request->all()) ;

        return redirect('department')->with([
            'flash_message' => 'Updated Successfull'
        ]);

    }

    public function destroy($id)
    {
        $dept = department::findorFail($id);
        return view('pages.department.delete',compact('dept'));

    }

    public function delete($id)
    {
        $dept = department::findorfail($id);
        $dept->delete();

        return redirect('department')->with([
            'flash_message' => 'Deleted Successfull'
        ]);
    }

}