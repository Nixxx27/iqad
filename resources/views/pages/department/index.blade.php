@extends('layouts.pages')
@section('title') Home @stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>
                <strong>
                    <i class="fa fa-list"></i> DEPARTMENTS
                    {{--<span class="pull-right"><i class="fa fa-user"></i> {{ ucwords( Auth::user()->name ) }}</span>--}}
                </strong>
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
                {!! Form::open(array('name'=>'departmentForm','id'=>'departmentForm')) !!}
                <table class="table">
                    <tr>
                        <td><h4><strong><label for="department">Department</label></strong></h4></td>
                        <td>
                            <input type="text" name="department" id="department" value="{{old('department')}}"
                                   class="{{ $errors->has('department')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>

                    <tr>
                        <td><h4><strong><label for="organization">Organization</label></strong></h4></td>
                        <td>
                            <input type="text" name="organization" id="organization" value="{{old('organization')}}"
                                   class="{{ $errors->has('department')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><button class="btn btn-primary btn-md">Save</button></td>
                    </tr>
                </table>
                {!! Form::close() !!}


                <form action="" name="myForm" id="myForm" method="get">
                    {{--<table class="CSSTableGenerator">--}}
                    {{--<tr>--}}
                    {{--<td>Sort</td>--}}
                    {{--<td>Finding #</td>--}}
                    {{--<td>Search</td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>{!! Form::select('sort',--}}
                    {{--array('asc' => 'Oldest', 'desc' => 'Latest'),$sort,--}}
                    {{--['style'=>'cursor:pointer;font-family: FontAwesome, Helvetica',--}}
                    {{--'class'=>'form-control',--}}
                    {{--'id'=>'sort',--}}
                    {{--'title'=>'Sort By']) !!}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<input type="text" class="form-control" name="x_like" id="x_like" value="{{ $like_display }}"  onchange="sameText()">--}}
                    {{--<input type="hidden" name="like" id="like" value="{{ $like }}">--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<input type="text" class="form-control" name="x_search" id="x_search" value="{{ $like_display }}"  onchange="sameText()">--}}
                    {{--<input type="hidden" name="search" id="search" value="{{ $like }}">--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--{!! Form::submit('Search',['style'=>'border:1px solid #828282','class'=>'btn btn-primary btn-sm']) !!}--}}
                    {{--</td>--}}
                    {{--<td> {!! Form::submit('view all',['style'=>'border:1px solid #828282','class'=>'btn btn-info btn-sm','onclick'=>'viewAll()']) !!}</td>--}}
                    {{--</tr>--}}
                    {{--</table>--}}
                </form>

                {{--{{ $sort }}--}}
                {{--{{ $like }}--}}

            </div>
        </div>
    </div>
    <div class="col-md-offset-2 col-sm-8 col-md-8">
        <table class="CSSTableGenerator" style="margin-top:20px">
            <tr>
                <td>Department</td>
                <td>Organization</td>
                <td colspan="2"></td>
            </tr>
            @foreach($department as $dept)
                <tr>
                    <td>{{ ucwords($dept->department) }}</td>
                    <td>{{ ucwords($dept->organization) }}</td>
                    <td style="text-align:center">
                        {!! Form::open(['method'=>'PATCH', 'action' => ['DepartmentController@edit', $dept->id]]) !!}
                        <button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
                        {!! Form::close() !!}
                    </td>
                    <td style="text-align:center">
                        {!! Form::open(['method'=>'PATCH', 'action' => ['DepartmentController@destroy', $dept->id]]) !!}
                        <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center">
                    {!! $department->appends(['sort' => Input::get('sort', 'asc'),'like' => Input::get('like') ])->render() !!}
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