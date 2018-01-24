@extends('layouts.pages')
@section('title') Home @stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>
                <strong><i class="fa fa-list"></i> CAUSE CATEGORIES</strong>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-default btn-sm" onClick="showMe()"><i class="fa fa-plus"></i> Add New </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-5">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                    {!! Html::image('public/images/success_check.png','Property of SkyLogistics',array('height'=>'15px','width'=>'auto')) !!}
                </div>
            @endif
            @include('errors.list')
            <div  id="settings" style="display:none">
                {!! Form::open(array('name'=>'causeCategoryForm','id'=>'causeCategoryForm')) !!}
                <table class="table">
                     <tr>
                        <td><h4><strong><label for="causal_factor">Causal Factor</label></strong></h4></td>
                        <td>
                            <input type="text" name="causal_factor" id="causal_factor" value="{{old('causal_factor')}}"
                                   class="{{ $errors->has('causal_factor')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>

                    <tr>
                        <td><h4><strong><label for="cause_category">Category</label></strong></h4></td>
                        <td>
                            <input type="text" name="cause_category" id="cause_category" value="{{old('cause_category')}}"
                                   class="{{ $errors->has('cause_category')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>

                    <tr>
                        <td><h4><strong><label for="item">Item</label></strong></h4></td>
                        <td>
                            <input type="text" name="item" id="item" value="{{old('item')}}"
                                   class="{{ $errors->has('cause_category')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
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
    <div class="col-md-offset-2 col-sm-8 col-md-8">
        <table class="CSSTableGenerator" style="margin-top:20px">
            <tr>
                <td>Causal Factor</td>
                <td>Cause Category</td>
                <td>Item</td>
                <td colspan="2"></td>
            </tr>
            @foreach( $cause_category as $cause )
                <tr>
                     <td>{{ ucwords($cause->causal_factor) }}</td>
                    <td>{{ ucwords($cause->cause_category) }}</td>
                    <td>{{ ucwords($cause->item) }}</td>
                    <td style="text-align:center">
                        {!! Form::open(['method'=>'PATCH', 'action' => ['CauseController@edit', $cause->id]]) !!}
                        <button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
                        {!! Form::close() !!}
                    </td>
                    <td style="text-align:center">
                        {!! Form::open(['method'=>'PATCH', 'action' => ['CauseController@destroy', $cause->id]]) !!}
                        <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align:center">
                    {!! $cause_category->appends(['sort' => Input::get('sort', 'asc'),'like' => Input::get('like') ])->render() !!}
                </td>
            </tr>

        </table>
    </div>

    <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
        {{--{!! $finding_tbl->appends(['sort' => Input::get('sort', 'asc'),'like' => Input::get('like') ])->render() !!}--}}
    </div>
@stop

@section('js')
    <script>
        function showMe(){
            $('#settings').slideToggle(100);
        }

    </script>

@stop