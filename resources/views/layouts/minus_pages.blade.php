@include('partials.prevent_caching')
<!DOCTYPE html>
<html>
<head>
    <title>Quality Assurance System:@yield('title')</title>
    <link rel="stylesheet" href="/QADapps/{{ elixir('css/styles.css') }}">
    {!! Html::style('/public/css/fontsawesome/css/font-awesome.min.css') !!}

    @yield('css')
</head>
<body>
@include('partials.nav_simple')

<div class="container">
    @yield('content')
    @yield('footer')

    @include('partials.footer')
    {{--{{var_dump($errors)}}--}}
</div>
</body>
</html>

{!! Html::script('scripts.js',array('type'=>'text/javascript')) !!}
@yield('js')
