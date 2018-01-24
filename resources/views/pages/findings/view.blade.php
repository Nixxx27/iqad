@extends('layouts.pages')
@section('title') New Findings @stop

@section('css')

@stop

@section('content')
    <div class="row" style="margin-top:20px;display:none" id="viewBody">
        <div class="col-md-12">
            <table align="left" id="top">
                <tr>
                    <td style="padding-right:20px"><button type="button" class="btn btn-default" onClick="go_back()" title="go back"><i class="fa fa-chevron-circle-left"></i> Back</button></td>
                  </tr>
            </table>
            <table align="right">
                <tr>
                    <td style="padding-right:20px">
                        {!! Form::open(['method'=>'GET', 'action' => ['ExcelController@export_each_findings', $findings->id, $findings->finding_num] ]) !!}
                        <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export to Excel  </button>
                        {!! Form::close() !!}
                    </td>
                    <td style="padding-right:20px">
                       {!! Form::open(['method'=>'GET', 'action' => ['ActionController@action_new', $findings->finding_num] ]) !!}
                        <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Action  </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
            <br/>
            <table class="CSSTableGenerator" style="margin-top:20px">
                <tr>
                    <td colspan="4"><h3><strong>{{ ucwords($findings->audit_title)  }}</strong></h3> </td>
                </tr>
                <tr>
                    <td><label>Finding:</label>  <h5><strong> {{ $findings->finding_num }}</strong></h5></td>
                    <td><label>Category:</label> <h5><strong> {{ ucwords($findings->finding_category) }}</strong></h5></td>
                    <td><label>Risk:</label> <h5><strong> {{ ucwords($findings->risk) }}</strong></h5></td>
                    <td><label>Status:</label> <h5><strong> {{ ucwords($findings->finding_status) }}</strong></h5></td>
                 </tr>

                <tr>
                    <td><label>Response Due:</label> {{ $findings->finding_due->format('M-d-Y D') }}</td>
                    <td><label>Department:</label> {{ $department->department }}</td>
                    <td><label>Date Discovered:</label> {{ $findings->date_discovered->format('M-d-Y D') }}</td>
                    <td><label>Repeat Finding:</label> {{ ucwords( $findings->repeat_finding ) }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <textarea readonly style="cursor:default;font-weight:normal" id="findings" rows="20" class="form-control">{{ $findings->findings }}</textarea>
                    </td>
                </tr>

                <tr>
                    <td><label>Assigned to:</label>{{ ucwords( $findings->assigned_to ) }}</td>
                    <td><label>Email:</label>{{ ucwords( $findings->email ) }}</td>
                    <td colspan="2"><label>Reference:</label>{{ ucwords( $findings->reference ) }}</td>
                </tr>

                <tr>
                    <td><label>Person/Org:</label> {{  ucwords( $findings->person_org ) }}</td>
                    <td><label>Category:</label> {{  ucwords( $findings->cause_category ) }}</td>
                    <td colspan="2"><label>Item:</label> {{  ucwords( $findings->item ) }}</td>
                </tr>

                <tr>
                    <td><label>Descriptor:</label>
                        <textarea readonly  style="cursor:default;font-weight:normal" id="descriptor" rows="4" class="form-control">{{ $findings->descriptor }}</textarea>
                    </td>
                    <td><label>Cause:</label>
                        <textarea readonly  style="cursor:default;font-weight:normal" id="cause" rows="4" class="form-control">{{ $findings->cause }}</textarea>
                    </td>
                    <td colspan="2"><label>Remarks:</label>
                        <textarea readonly  style="cursor:default;font-weight:normal" id="remarks" rows="4" class="form-control">{{ $findings->remarks }}</textarea>
                    </td>
                </tr>
            </table>
                {{--======= ACTIONS =====--}}
            <br/>
        <button class="btn btn-default" id="viewActionsBtn"> <span class="badge">{{ $action_count }}</span>  actions</span></button>
        <div id="actions" style="display:none">
            @if($action)
            @foreach( $action as $actions)
                <table class="CSSTableBlack" style="margin-top:10px">
                    <tr>
                        <td colspan="3">{{ ucwords($actions->action_num) }}</td>
                    </tr>
                    <tr>
                        <td><label>Status:</label>  <h5><strong> {{ ucwords($actions->action_status) }}</strong></h5> </td>
                        <td><label>Due:</label> <h5><strong> {{ $actions->action_due->format('M-d-Y D') }}</strong></h5></td>
                     </tr>
                    <tr>
                        <td colspan="2">
                            <textarea readonly id="findings" rows="10" class="form-control">{{ $actions->actions }}</textarea>
                        </td>
                    </tr>

                    <?php $action_attachment = $action_attachments->where('action_numlink','=',$actions->action_num)->get(); $test_count = $action_attachment->count(); $attach_count = 1;?>
                    @foreach($action_attachment as $attach)

                        <tr>
                                <td colspan="3"><span style="font-size:12px">
                                        <a href="/QADapps/{{ $attach->location }}" target="_blank">
                                            <span class='badge'>{{ $attach_count++ }} </span>
                                            {{ $attach->attachment }}
                                        </a>
                                    </span>
                                </td>
                         </tr>
                        @endforeach
                </table>
            @endforeach
            @endif
        </div>
    </div>
        <!--Back to Top-->
            <span id="top-link-block" class="hidden_scroll" title="Go Top">
                <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                    <i class="fa fa-chevron-circle-up fa-3x bg_red"></i>
                </a>
            </span>
    </div>
    @stop


@section('js')

    <script>
        if ( ($(window).height() +100) < $(document).height() ) {
            $('#top-link-block').removeClass('hidden_scroll').affix({
                // how far to scroll down before link "slides" into view
                offset: {top:100}
            });
        }

        $('#viewActionsBtn').on('click',function(){
           $('#actions').fadeToggle('slow');
        })

        $('#viewBody').fadeToggle('slow')
    </script>

@stop