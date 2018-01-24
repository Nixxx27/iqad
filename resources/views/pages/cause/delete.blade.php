@extends('layouts.pages')
@section('title') Department: edit @stop

    @section('css')
        <style>
            td{
                padding-left:20px;
            }
        </style>
    @stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 style="cursor:pointer" onClick="go_back()"><i class="fa fa-chevron-circle-left"></i></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-5 ">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                    {!! Html::image('public/images/success_check.png','Property of SkyLogistics',array('height'=>'15px','width'=>'auto')) !!}
                </div>
            @endif
            @include('errors.list')
            <div>
                {!! Form::open(array('name'=>'deleteCauseForm','id'=>'deleteCauseForm')) !!}
                <table class="CSSTableGenerator">
                    <tr>
                       <td><h4><strong>Confirm Delete? </strong></h4></td>
                        <td><button class="btn btn-danger btn-md"> Yes </button></td>
                        <td><button type='button' class="btn btn-info btn-md"  onClick="go_back()"> No </button></td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
963you