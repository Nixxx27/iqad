@extends('layouts.pages')
@section('title') Home @stop

@section('css')
    <style>
        td {text-align:center;!important;}
    </style>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>
                <strong>
                    <i class="fa fa-list"></i> VIEW ALL: FINDINGS
                    {{--<span class="pull-right"><i class="fa fa-user"></i> {{ ucwords( Auth::user()->name ) }}</span>--}}
                </strong>
            </h3>
            <div class="pull-right" style="margin-bottom:5px">
                <button type="button" class="btn btn-default btn-sm" onClick="showMe()"><i class="fa fa-search"></i> Search</button>
                <button type="button" class="btn btn-default btn-sm" onClick="addNewFinding()" title="Add new findings"><i class="fa fa-plus-circle"></i> Findings </button>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-9">

            <div style="display:none" id="settings">
                <form action="" name="myForm" id="myForm" method="get">
                    <table >
                        <tr>
                            <td>Sort</td>
                            <td>Risk</td>
                            <td>Finding #</td>
                            <td>Search</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{!! Form::select('sort',
                                array('asc' => 'Oldest', 'desc' => 'Latest'),$sort,
                                ['style'=>'cursor:pointer;font-family: FontAwesome, Helvetica',
                                'class'=>'form-control',
                                'id'=>'sort',
                                'title'=>'Sort By']) !!}
                            </td>
                            <td>{!! Form::select('risk',
                                array('%'=>'--risk--','low'=>'Low', 'high' => 'High', 'moderate' => 'Moderate'),$risk,
                                ['style'=>'cursor:pointer;font-family: FontAwesome, Helvetica',
                                'class'=>'form-control',
                                'id'=>'risk',
                                'title'=>'Sort By']) !!}
                            </td>
                            <td>
                                <input type="text" class="form-control" name="like" id="like" value="{{ $like }}">

                            </td>
                            <td>
                                <input type="text" class="form-control" name="search" id="search" value="{{ $search }}">
                            </td>
                            <td>
                                {!! Form::submit('Search',['style'=>'border:1px solid #828282','class'=>'btn btn-primary btn-sm']) !!}
                            </td>
                            <td> {!! Form::submit('view all',['style'=>'border:1px solid #828282','class'=>'btn btn-info btn-sm','onclick'=>'viewAll()']) !!}</td>
                        </tr>
                    </table>
                </form>

                {{--{{ $sort }}--}}
                {{--{{ $like }}--}}

            </div>
        </div>
    </div>


    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <table class="CSSTableGenerator" style="margin-top:20px;display:none" id="tableBody">
        <tr>
            <td>#</td>
            <td>Finding #</td>
            <td>Title</td>
            <td>Category</td>
            <td>Due</td>
            <td>Status</td>

            <td>Risk</td>
            <td>Entered By</td>
            <td>Overdue</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($finding_tbl as $findings)
            <tr>
               <?php $bgcolor = "background-color:#e21a23"; ?> <!-- red-->
                <td style="{{ $bgcolor }}">{{$findings->id}}</td>
                <td style="{{ $bgcolor }}">{{$findings->finding_num}}</td>
                <td style="{{ $bgcolor }}">{{ ucwords($findings->audit_title) }}</td>
                <td style="{{ $bgcolor }}">{{ ucwords($findings->finding_category) }}</td>
                <td style="{{ $bgcolor }}">{{$findings->finding_due->format('M d Y D') }} </td>
                <td style="{{ $bgcolor }}">{{ ucwords($findings->finding_status) }}</td>
                <td style="{{ $bgcolor }};text-align: center;">{{ ucwords($risk = $findings->risk) }} </td><td style="{{ $bgcolor }}">{{ ucwords($findings->entered_by) }}</td>
                <td style="{{ $bgcolor }}">@if( $findings->finding_alert=="yes" )
                        <?php $diff =  $findings->finding_due->isPast(); ?>
                        @if($diff==1)
                            <span style="font-style:italic;font-weight:bold;font-size:12px">{{ $findings->finding_due->diffforhumans() }}
                                {!! Html::image('public/images/warning.gif','Property of SkyLogistics',array('height'=>'17px','width'=>'auto','title'=>'this finding is overdue!')) !!}
                                </span>
                        @endif
                    @endif
                </td>
                <td style="text-align:center">
                    {!! Form::open(['method'=>'GET', 'action' => ['ActionController@action_new', $findings->finding_num]]) !!}
                    <button class="btn btn-primary btn-sm" title="Add new Action">Action <i class="fa fa-plus-circle"></i> </button>
                    {!! Form::close() !!}
                </td>
                <td style="text-align:center">
                    {!! Form::open(['method'=>'GET', 'action' => ['FindingsController@show', $findings->id]]) !!}
                    <button class="btn btn-info btn-sm">view <i class="fa fa-chevron-circle-right"></i> </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
        {!! $finding_tbl->appends(['sort' => Input::get('sort', 'asc'),'risk' => Input::get('risk'),'like' => Input::get('like'),'search' => Input::get('search') ])->render() !!}
    </div>
@stop

@section('js')
    <script>
        function sameText()
        {
            var displayText = $('#x_like').val(),
                    origText = $('#like');

            if (displayText == '') {
                origText.val('%');
            } else {
                origText.val(displayText);
            };

        }

        function addNewFinding()
        {
            window.location.href="create_new";

        }

        function showMe(){
            $('#settings').fadeToggle('slow');
        }

        function viewAll(){
            $('#like').val('%');
            $('#search').val('%');
            $('#risk').prop('selectedIndex',0);
            $('#myForm').submit();

        }

        $('#tableBody').fadeToggle('slow');
    </script>

@stop