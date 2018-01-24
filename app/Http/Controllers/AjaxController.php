<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cause;
use App\department;

class AjaxController extends Controller
{
    public function get_organization()
    {
        $organization = department::find( $_GET['selected_department'] );
        return $organization ? ucwords($organization->organization) : '-- select department --';
    }

      public function get_cause_category()
    {
        $cause_category = cause::where( 'causal_factor','=', $_GET['selected_causal_factor'] )->get();
        foreach ($cause_category as $category)
            {
                echo "<option value='$category->cause_category'>". ucwords($category->cause_category) . "</option>";
            }

    }

    public function get_item()
    {
        $items = cause::where( 'cause_category','=', $_GET['selected_category'] )->get();
        foreach ($items as $item)
            {
                echo "<option value='$item->item'>". ucwords($item->item) . "</option>";
            }

    }
}
