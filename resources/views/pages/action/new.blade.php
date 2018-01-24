@extends('layouts.pages')
@section('title') New Findings @stop

@section('css')

@section('content')
    <table>
        <tr>
            <td><button type="button" class="btn btn-info" onClick="go_back()" title="go back"><i class="fa fa-chevron-circle-left"></i> Back</button></td>
        </tr>
    </table>
    <div class="row  opa_white" style="margin-top:10px;display:none">
        <div class="col-md-12">
            @include('partials.alert_success')
            @include('errors.list')
            <div class="row">
                <div id="top" class="col-md-8 col-md-offset-2" style="margin-top:20px;">
                    <h3 class="retro">
                        <strong><i class="fa fa-plus-square"></i> new action For
                            <span style="color:darkslategray"> {{ strtoupper($finding_num) }} </span>
                        </strong>
                    </h3>
                    <hr>
                </div>{{--col-md-8--}}
            </div>{{--col-row--}}
            {!! Form::open(array('action' =>  array('ActionController@store', $finding_num),'name'=>'actionForm','id'=>'actionForm','method'=>'post','files'=>true )) !!}

            <div class="row">
                <div class="col-md-4">
                    <h5>
                        <strong><label for="action_num">ACTION #:</label></strong>
                        <input type="text" name="action_num" id="action_num" value="{{ old('action_num') }}"
                               class="{{ $errors->has('action_num')?  ' form-control-static border_black withErrors' : 'form-control-static border_black' }}" >
                    </h5>

                </div>

                <div class="col-md-4">
                    <h5>
                        <strong><label for="action_status">STATUS:</label></strong>
                        <input type="text" name="action_status" id="action_status" value="{{ old('action_status') }}"
                               class="{{ $errors->has('action_status')?  ' form-control-static border_black withErrors' : 'form-control-static border_black' }}" >
                     </h5>
                </div>

                <div class="col-md-offset-1 col-md-3">
                    <h5>
                        <strong><label for="action_due">DUE:</label></strong>
                        <input type="text" name="action_due" id="action_due" value="{{ old('action_due') }}" style="cursor: pointer" data-format="d M Y" placeholder="pick date" title="pick a date"
                               class="{{ $errors->has('action_due')?  ' form-control-static border_black withErrors date-picker ' : 'form-control-static border_black date-picker' }}">
                     </h5>
                </div>
            </div>{{--row--}}

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>
                                <textarea name="actions" id="actions" style="font-size:12px" title=" write actions..." rows="10"
                                          class="{{ $errors->has('actions')?  ' form-control border_black withErrors' : 'form-control border_black' }}">{{ old('findings') }}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>{{--col-md-12--}}
            </div>

            <div class="row">
                <hr>
                <div class="col-md-6">
                    <label>Attachment:</label>
                    <p><button type="button" class="btn btn-md btn-default" onclick="addMoreFiles()"><i class="fa fa-plus-square"></i> add</button>
                        <button type="button" class="btn btn-md btn-default" onclick="removeFile()"><i class="fa fa-times"></i> remove</button>
                     </p>
                    <p id="last"><input type="file" name="attachments[]" multiple="1" /></p>
                    <p><button type="submit" class="btn btn-md btn-primary"><i class="fa fa-floppy-o"></i> Save</button></p>
             </div>
        </div>
        </div>{{--col-md-12--}}

        {!! Form::close() !!}
</div>{{--col-row opa-white--}}

@stop



@section('js')

    <script>
       function addMoreFiles(){
            var countfile = ($('form input:file').length)+1;
            var add_attachment = $('<p id="add"><input type="file" name="attachments[]" multiple="1"/><p>');
            add_attachment.hide();
            $("#last:last").append(add_attachment);
            add_attachment.fadeIn('slow');

            console.log(countfile);
        }

        function removeFile()
        {
           $( "#add" ).remove();
        }
    </script>
@stop