@extends('layouts.pages')
@section('title') New Findings @stop

@section('css')
 <style>
     label{
         text-shadow: 1px 1px 1px rgb(201,201,201);
     }
 </style>
@stop

@section('content')
    <div class="row  opa_white" style="margin-top:20px;display:none">
        <div class="col-md-12">
            <div class="row">
                <div id="top" class="col-md-8 col-md-offset-2" style="margin-top:20px;">
                    <h3 class="retro">
                        <strong> Finding Cause Action
                            <span style="color:darkslategray">Form <i class="fa fa-file-text"></i></span>
                        </strong>
                    </h3>
                    <hr>
                </div>{{--col-md-8--}}
            </div>{{--col-row--}}
            {!! Form::open(array('name'=>'findingsForm','id'=>'findingsForm')) !!}
            {{--{!! Form::open(array('url' => 'store', 'method' => 'post')) !!}--}}
            <div class="row">
                <div class="col-md-12">
                    @include('partials.alert_success')
                    @include('errors.list')
                    <h5>
                        <strong><label for="audit_title">AUDIT TITLE :</label></strong> <i  class="fa fa-plus-circle" style="cursor:pointer" title=" Click to set default title" data-toggle="modal" data-target="#myModal">
                    </i> 
                        <textarea style="padding-top:5px;margin-left:3px;margin-top:5px" name="audit_title"  id="audit_title" rows="2" title="write audit title"
                                  class="{{ $errors->has('audit_title')?  ' form-control border_black withErrors' : 'form-control border_black' }}" >{{ $default_title->audit_title }}</textarea>
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h5>
                        <strong><label for="finding_num">FINDING:</label></strong>
                       {{--{!! Form::label('finding_num', "F$year_now_last_2-268",--}}
                        {{--['style'=>'margin-left:20px;font-size:16px;font-weight: bold;padding-left:10px;cursor:not-allowed',--}}
                         {{--'class'=>'bottom_border',--}}
                         {{--'title'=>'finding number']) !!}--}}
                        <input type="text" name="finding_num" id="finding_num" value="{{ old('finding_num') }}"
                        class="{{ $errors->has('finding_num')?  ' form-control-static border_black withErrors' : 'form-control-static border_black' }}" >
                        @if ($errors->has('finding_num'))
                            <li><small><strong>please follow this format F15-123</strong></small></li>
                        @endif
                    </h5>

                </div>

                <div class="col-md-4">
                    <h5><strong><label for="finding_category">CATEGORY:</label></strong>
                        {!! Form::select('finding_category',
                        array('non compliance' => 'Non-Compliance',
                        'non conformance' => 'Non-Conformance',
                        'quality related concerns' => 'Quality Related Concerns',
                        'security'  => 'Security'), 'non conformance',
                        ['style'    =>'margin-left:20px;font-size:16px;font-weight: bold;cursor:pointer',
                        'id'        =>'finding_category',
                        'class'     =>'bottom_border',
                        'title'     =>'select category']); !!}
                    </h5>
                </div>
                <div class="col-md-offset-1 col-md-3">
                    <h5><strong><label for="risk">RISK:</label></strong>
                        {!! Form::select('risk',
                        array('high'=> 'High',
                        'moderate'  => 'Moderate',
                        'low'       => 'Low'),'moderate',
                        ['style'    =>'margin-left:20px;font-size:16px;font-weight: bold;cursor:pointer',
                        'id'        =>'risk',
                        'class'     =>'bottom_border',
                        'title'     =>'select risk']) !!}
                    </h5>
                </div>
            </div>{{--row--}}

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>
                                <textarea name="findings" id="findings" style="font-size:12px" title=" write findings..." rows="10"
                                          class="{{ $errors->has('findings')?  ' form-control border_black withErrors' : 'form-control border_black' }}">{{ old('findings') }}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>{{--col-md-12--}}
            </div>

            <div class="row">
                <div class="col-md-5">
                    <table class="table-condensed">
                        <tr>
                            <td>
                                <i class="fa fa-building"></i>
                                <label for="department">Department:</label>
                            </td>
                            <td>
                               <?php foreach ($dept_tbl as $dept){ $all_department[$dept->id] = ucwords( $dept->department); } ?>
                                {!! Form::select('department',$all_department, null,
                                ['style'    =>  'cursor:pointer',
                                'onchange'  =>  'show_organization()',
                                'class'     =>  'form-control border_black',
                                'title'     =>  'select department',
                                'id'        =>  'department']) !!}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-flag"></i>
                                <label for="finding_status">Response Status:</label>
                            </td>
                            <td>
                                {!! Form::select('finding_status',
                                array('accepted'=> 'Accepted',
                                'required'      => 'Required',
                                'not required'  => 'Not Required'),'accepted',
                                ['style'    =>'cursor: pointer',
                                'id'        =>'finding_status',
                                'class'     =>'form-control border_black',
                                'title'     =>'select status']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa fa-search"></i>
                                <label for="repeat_finding">Repeat Finding:</label>
                            </td>
                            <td>
                                {!! Form::select('repeat_finding',
                                array('yes'=> 'Yes',
                                'no'      => 'No'),'no',
                                ['style'    =>'cursor: pointer',
                                'id'        =>'repeat_finding',
                                'class'     =>'form-control border_black',
                                'title'     =>'select Yes/Nos']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa fa-book"></i>
                                 <label for="reference">Reference:</label>
                            </td>
                            <td>
                                <input type="text" name="reference" id="reference" title=" write reference..." value="{{ old('reference') }}"
                                       class="{{ $errors->has('reference')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                             </td>
                        </tr>


                    </table>
                </div><!--col-md-5-->

                <div class="col-md-5 col-md-offset-1">
                    <table class="table-condensed">
                        <tr>
                            <td>
                                <i class="fa fa-calendar"></i>
                                <label for="date_discovered">Date Discovered:</label>
                            </td>
                            <td>
                                <input type="text" name="date_discovered" id="date_discovered" value="{{ old('date_discovered') }}" style="cursor: pointer" data-format="d M Y" placeholder="pick date" title="pick a date"
                                       class="{{ $errors->has('date_discovered')?  ' form-control border_black withErrors date-picker ' : 'form-control border_black date-picker' }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa fa-user"></i>
                                <label for="assigned_to">Assigned To:</label> </td>
                            <td>
                                <input type="text" name="assigned_to" id="assigned_to" value="{{old('assigned_to')}}" title=" assigned to"
                                       class="{{ $errors->has('assigned_to')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa fa-user"></i>
                                <label for="email">Email:</label>
                            </td>
                            <td>
                                <input type="text" name="email" id="email" value="{{old('email')}}" title=" write email add..."
                                       class="{{ $errors->has('email')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                            </td>
                        </tr>
                    </table>
                </div>{{--col-md-5--}}
            </div>{{--col-row--}}
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        <i class="fa fa-user"></i>
                        <label for="descriptor">Descriptor:</label>
                        <textarea name="descriptor" id="descriptor" rows="3" title=" write descriptor..."
                                  class="{{ $errors->has('descriptor')?  ' form-control border_black withErrors' : 'form-control border_black' }}">{{ old('descriptor') }}</textarea>
                    </h5>
                </div>{{--col-md-6--}}

                <div class="col-md-6">
                    <h5>
                        <i class="fa fa-user"></i>
                        <label for="cause">Cause:</label>
                        <textarea name="cause" id="cause" rows="3" title=" write cause..."
                                  class="{{ $errors->has('cause')?  ' form-control border_black withErrors' : 'form-control border_black' }}">{{ old('cause') }}</textarea>
                    </h5>
                </div><!--col-md-6-->

                 <div class="col-md-3">
                        <h5 ><strong>{!! Form::label('person_org', 'Person/Org:') !!}</strong>
                            <input type="text" style="padding-left:10px;cursor:not-allowed;background-color:white" readonly class="form-control border_black" name="person_org" id="person_org">
                         </h5>
                    </div>

                     <div class="col-md-3">
                        <h5><strong><label for="causal_factor">Causal Factor:</label></strong>
                            <select name="causal_factor" style="cursor:pointer" onChange="show_cause_category()" class="form-control border_black" title="select Causal Factor" id="causal_factor">
                                <option value="0">Choose from list</option>
                                @foreach( $causal_factor as $factor)
                                    <option>{{$factor->causal_factor}}</option>
                                @endforeach
                            </select>
                        </h5>
                    </div>

                      <div class="col-md-3">
                        <h5 class="{{ $errors->has('cause_category ') ? ' has-error' : '' }}">
                            <strong><label for="cause_category ">Cause Category:</label></strong>
                            <select name="cause_category" style="cursor:pointer;" class="form-control border_black"
                            onChange="show_item()" title="select category" id='cause_category'>
                                    <option>Choose from list</option>
                            </select>
                           <!--  {!! Form::select('cause_category', array(),null,
                            ['style'=>'cursor:pointer',
                            'class' => 'form-control border_black',
                            'onChange'=>'show_item()',
                            'title' =>'select category',
                            'id'    => 'cause_category']) !!} -->
                        </h5>
                    </div>
         
                    <div class=" col-md-3">
                        <h5 class="{{ $errors->has('item') ? ' has-error' : '' }}">
                            <strong><label for="item">Item:</label></strong>
                            {!! Form::select('item', array(),null,
                            ['style'=>'cursor:pointer',
                            'class' => 'form-control border_black',
                            'title' =>'select item',
                            'id'    => 'item']) !!}
                        </h5>
                    </div>
    
            </div><!--col-row-->
            <div class="col-md-5 col-sm-5">
                <h5>
                    <strong><label for="remarks">Remarks:</label></strong>

                <textarea name="remarks" id="remarks" rows="2" title="add remarks..."
                          class="{{ $errors->has('remarks')?  ' form-control border_black withErrors' : 'form-control border_black' }}">{{old('remarks')}}</textarea>
                </h5>
            </div>
            <div class="col-md-2 col-sm-2 pull-right" style="margin-bottom:20px;background-color:#969494;border:1px inset #c6c4c4;padding:4px;text-align: center">
               <hr>

                <button type="submit" style="padding-left:15px;padding-right:15px;border:1px solid #828282;background-color:#2F4F4F;color:white" class="btn btn-default">
                    <i class='fa fa-floppy-o'></i> Save
                </button>

                <button type="button" style="border:1px solid #828282" class="btn btn-default btn-md" onClick="_cancel()">
                   <i class='fa fa-times'></i> Cancel
                </button>
             </div><!--col-md-8-->
        </div><!--col-md-12-->

    {!! Form::close() !!}


<!--Back to Top-->
        <span id="top-link-block" class="hidden_scroll" title="Go Top">
            <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <i class="fa fa-chevron-circle-up fa-3x bg_red"></i>
            </a>
        </span>

    </div><!--col-row opa-white-->


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Set Default Audit title</h4>
          </div>
          <div class="modal-body">
             {!! Form::open(array('url'=>'default_title','method'=>'get')) !!}
              <input type="text" name="audit_title" id="audit_title" value="{{ $default_title->audit_title }}"
                    class="{{ $errors->has('audit_title')?  ' form-control border_black withErrors' : 'form-control border_black' }}">
                <h5><small>leave empty to clear default</small></h5>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
           {!! Form::close() !!}
        </div>
      </div>
    </div>
@stop




@section('js')

    <script>
        effects_name(); //name effects
        show_organization(); //load person/org
        show_item(); //load item per category

         if ( ($(window).height() + 100) < $(document).height() ) {
            $('#top-link-block').removeClass('hidden_scroll').affix({
                // how far to scroll down before link "slides" into view
                offset: {top:100}
            });
        }

        function _cancel(){
            if( confirm("Are you sure you want to Cancels?")){
                window.location.href='home';
            }

        }

    </script>
@stop