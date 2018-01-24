@extends('layouts.pages')
@section('title') New Findings @stop

@section('css')
    <style>
        ul li{
            display: inline-block;
            padding-right: 10px;
            list-style-type: none;
        }
    </style>
@stop

@section('content')
    <table class="CSSTableGenerator" style="margin-top:20px">
        <tr>
            <td>Finding #</td>
            <td>Title</td>
            <td>Category</td>
            <td>Response Due</td>
            <td>Status</td>
            <td></td>
       </tr>
          @foreach($finding_tbl as $findings)
            <tr>
                <td>{{$findings->finding_num}}</td>
                <td>{{ ucwords($findings->audit_title) }}</td>
                <td>{{ ucwords($findings->finding_category) }}</td>
                <td>{{$findings->finding_due}}</td>
                <td>{{ ucwords($findings->finding_status) }}</td>
                <td style="text-align:center">
                    {!! Html::image('public/images/edit.png','Property of SkyLogistics',array('height'=>'25px','width'=>'auto','title'=>'Edit')) !!}
                    {!! Html::image('public/images/error.png','Property of SkyLogistics',array('height'=>'25px','width'=>'auto','title'=>'Delete')) !!}
                </td>
            </tr>
                @endforeach
    </table>
        <div class="col-md-offset-5">
            {!! $finding_tbl->render() !!}
        </div>
@stop
