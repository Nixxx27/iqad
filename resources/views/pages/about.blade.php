@extends('layouts.pages')
@section('title') About @stop

@section('content')

        <div class="row" style="margin-top:20px">
            <div class="col-md-12 about_bg_div opa">
                <div style="text-align: center">
                    <h1><span class="color_pink"><i class="fa fa-info-circle"></i> A</span>bout</h1>
                    <h3><strong>Internal Quality Audit Database System </strong></h3>
                    <p>Property of: {{ $company_name }}</p>
                    <p><small>Developed by: {{ $dev_name }} |  {{ $dev_email }}</small></p>
                    <p><small>Information & Communication Tech. Dept.@ {{ $year_now }}</small></p>
                </div>
                {{--<div class="button">twitter</div>--}}
            </div>
        </div>


@stop