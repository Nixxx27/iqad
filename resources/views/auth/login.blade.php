@include('partials.prevent_caching')
<!DOCTYPE html>
<html>
<head>
    <title>Quality Assurance System: Login</title>
    <link rel="stylesheet" href="/QADapps/public/{{ elixir('css/styles.css') }}">
    {!! Html::style('public/css/fontsawesome/css/font-awesome.min.css') !!}

    <style>
        .bg_white{
            background-color: rgb(255 ,255, 255);
            background-color: rgba(255 ,255, 255, 0.7);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            -webkit-border-radius: 8px 8px 8px 8px;
            border-radius: 8px 8px 8px 8px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top nav_opa" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b style="font-size:16px;color:#CF0053">
                    <span class="name">Quality Assurance Department |</span>
                </b>
                <span style="font-family:'century gothic'">IQAD System</span>
            </a>
        </div>
        <div class="pull-right">
            <h4 style="color: #cccccc;font-family:'century gothic'">
                {!! Html::image('public/images/skylogisticslogo.png','Property of SkyLogistics',array('height'=>'25px','width'=>'auto')) !!}
                <small style="  text-shadow: 0.5px 0.4px 0 rgb(119,117,117)">SkyLogistics Internal Quality Audit Database</small>
            </h4>
        </div>
    </div>
</nav>
<hr style="margin-bottom:60px;border-top:none">

<div class="container">
    <div class="row" style="margin-bottom:50px">
        <div class="col-md-offset-3 col-md-5 col-sm-offset-3 col-sm-7 bg_white"
             style="margin-top:15%;padding-top:50px;padding-right:30px;padding-left:20px;padding-bottom:10px">

            <form method="POST" action="/QADapps/login">
                {!! csrf_field() !!}


                @if(Session::has('logout_msg'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ Session::get('logout_msg') }}</strong>
                        {!! Html::image('public/images/success_check.png','Property of SkyLogistics',array('height'=>'15px','width'=>'auto')) !!}
                    </div>
                @endif

                @include('errors.list')

                <table class="table">
                    <tr>
                        <td>
                            {!! Form::label('name','Username') !!}
                        </td>
                        <td>
                            {!! Form::text('name',null,['class'=>'form-control bg','value'=>"{{ old('name') }}" ]) !!}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            {!! Form::label('password','Password') !!}
                        </td>
                        <td>
                            {!! Form::password('password',['class'=>'form-control bg']) !!}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="remember"> Remember Me
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td >
                            {!! Form::submit('Login',['class'=>'btn btn-primary btn-md']); !!}
                            {!! Form::submit('Clear',['class'=>'btn btn-primary btn-md']); !!}

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    @include('partials.footer')
    <embed src="/QADapps/public/sound/enterauthorizationcode.mp3" controller="true" autoplay="true" autostart="True" width="0" height="0" />
</div>
</body>
</html>
{{--{!! Html::script('scripts.js',array('type'=>'text/javascript')) !!}--}}
<script src="/QADapps/public/js/scripts.js"></script>
@yield('js')