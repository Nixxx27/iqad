<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewFindingsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'audit_title'       =>  'required|min:2',
          //  'finding_num'       =>  'required|regex:  /F(\d{2})-/ ',
            'findings'          =>  'required|min:10',
            'finding_category'  =>  'required',
            'risk'              =>  'required',
            'department'        =>  'required',
            'reference'         =>  'required',
            'date_discovered'   =>  'required|date_format:d M Y',
            'assigned_to'       =>  'required',
            'email'             =>  'required|email',
            'descriptor'        =>  'required|min:5',
            'cause'             =>  'required|min:5',
            'item'              =>  'required',
            'assigned_to'       =>  'required'
        ];
    }
}
