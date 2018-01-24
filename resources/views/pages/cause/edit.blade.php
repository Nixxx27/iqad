@extends('layouts.pages')
@section('title') Department: edit @stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 style="cursor:pointer" onClick="go_back()"><i class="fa fa-chevron-circle-left"></i></h1>
            <h3>
                <strong>
                    <i class="fa fa-pencil-square-o"></i> Edit
                    {{--<span class="pull-right"><i class="fa fa-user"></i> {{ ucwords( Auth::user()->name ) }}</span>--}}
                </strong>
            </h3>

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
                {!! Form::open(array('name'=>'causeCategoryForm','id'=>'causeCategoryForm')) !!}
                <table class="table">
                    <tr>
                        <td><h4><strong><label for="causal_factor">Causal Factor</label></strong></h4></td>
                        <td>
                            <input type="text" name="causal_factor" id="causal_factor" value="{{ $cause->causal_factor }}"
                                   class="{{ $errors->has('causal_factor')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>
                    <tr>
                        <td><h4><strong><label for="cause_category">Cause Category</label></strong></h4></td>
                        <td>
                            <input type="text" name="cause_category" id="cause_category" value="{{ $cause->cause_category }}"
                                   class="{{ $errors->has('cause_category')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>

                    <tr>
                        <td><h4><strong><label for="item">Item</label></strong></h4></td>
                        <td>
                            <input type="text" name="item" id="item" value="{{ $cause->item }}"
                                   class="{{ $errors->has('item')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><button class="btn btn-primary btn-md">Save</button></td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
