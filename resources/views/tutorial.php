<?php
//
//
////ROUTES ================================
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//
//Route::get('/about', "PagesController@about");
//Route::get('/contactus', "PagesController@contact_us");
//
//
//
//
//
////CONTROLLER ================================
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//
//class PagesController extends Controller
//{
//
//    public function about()
//    {
// //===========PASSING VARIABLES ==============
//    	$fname = 'Nikko';
//        return view('pages.about')->with('fname',$fname);
// 	  	// <h4> {{ $fname }} Zabala</h4> //IN ABOUT BLADE
//
//
//        //BY USING ARRAY
//  	 	$fname = 'Nikko';
//    	$lname = 'Zabala';
//        return view('pages.about')->with([
//        	'fname'=>$fname,
//        	'lname'=>$lname
//        	]);
//
//        //BY OBJECT
//
//    	$data = [];
// 		$data['first'] = 'Nikko';
// 		$data['last']= 'Zabala';
// 		return view('pages.about', $data);
//
// 		//BY COMPACT FUNCTION
// 		$first = 'Nikko';
//    	$last = 'Zabala';
//        return view('pages.about', compact('first','last')); //will check for equivalent key and its content first & last then it will build an associative array.
//
// 	}
//
//
//
//
//    public function contact_us(){
//        return view('pages.contact_us');
//    }
//}
//
//// VIEWS LAYOUT====================
//
//<!DOCTYPE html>
//<html>
//    <head>
//        <title>Quality Assurance System:@yield('title')</title>
//
//    </head>
//    <body>
//        <div class="content">
//        @yield('content')
//        </div>
//
//
//        @yield('footer')
//    </body>
//</html>
//
//
////ABOUT.BLADE.PHP
//
//@extends('layout')
//
//@section('title') Contact Page @stop
//
//@section('content')
//    <h1>Contact Us </span></h1>
//    <h2>(02) 851-1049 local 8702</h2>
//@stop
//
//// IF IN VIEWS
//
//@if ($first =='john')
//	<h2>hi John</h2>
//@else
//	<h2>hi elsa</h2>
//@endif
//
//// also has
//@unless
//
//@foreach ($people as $person)
//	<li>{{ $person }}</li>
//@endforeach
//
//
// public function contact_us(){
//
//    	$people = [
//    	'Nikko Zabala',
//    	'Jinnevib Cantiga',
//    	'Mine'];
//
//        return view('pages.contact_us',compact('people'));
//    }
//
//
//
//     @if (count($people))
//        Thanks to:
//        @foreach( $people as $person )
//            <li>{{ $person }}</li>
//        @endforeach
//
//    @endif
//
//
//    //MIGRATIONS
//
//
//    php artisan migrate
//
//    php artisan migrate:rollback
//
//    //create new db
//    php artisan make:migration create_articles_table --create="articles"
//
//
//
//
//
//
//
//    //============ELEQUENT=======
//
//
//
//    //create eloquent / model
//
//    php artisan make:model articles
//
//
//    // QUERIES DATABASE ACCESS===================
//    $users = DB::table('login')->get(); //select * from login.
//
//    $users = DB::table('login')->find(1); //select * from login where ID=1
//   return dd($user) // die(var_dump($user));
//
//
//    $user = DB::table('login')->find(1);
//    return $user->username;
//
//    //WHERE
//
//    $user = DB::table('login')->where('username', '!=', 'JeffreyWay')->get(); //where username notequal to jeffreyway
//    return dd($user);
//
//    //other options
//    DB::select('select * from users');
//
//    DB::INSERT('inser INTO login username VALUES ()');
//
//    $sql = "select * from login where username='nikko.zabala'";
//    $user = DB::select($sql);
//
//
////ELOQUENT
//    use App\login; //added
//      $users = new \App\login;
//        return $users->all();
//
//
//  public function login(){
//
//    $login = new login;
//    //$login->username = "test_username";
//    //$login->password = "test_password";
//    //$login->save();
//    return $login->all();
//
//    return $login->find(1)->username;
//
//
//
//
//
//    $article = App\Article::where('body','lorem ipsum')->first();
//    $article->body;
//
//
//    $login= login::find(2);
//    //var_dump($login);
//    $ab = 'nikkoz';
//    $login->update([
//        'username'=>$ab,
//        'password'=>'newPasswordz'
//        ]);
//    // $login->username = 'as';
//    // $login->password = '22';
//    $login->save();
//
//
//
//$login = login::create(['username'=>'test']);
//
//    $login->delete();
//
//
// }
//
////CREATE MULTIPLE
//$article = App\Article::create([
//    'title'=>'new article',
//    'body'=> 'new body',
//    'published_at'=> \carbon\carbon::now()
//]) //add in mass assignment NO NEED TO SAVE
//}
//
////===================
////CHANGES MULTIPLE
//$article = App\Article::update([
//    'title'=>'new article',
//    'body'=> 'new body',
//    'published_at'=> \carbon\carbon::now()
//])
//
//
//$login= login::findorfail(2);


//======================================
//UPDATING MULTIPLE LATEST
//
//        $department = department::find(1);
//        $department->update(['organization'=>'abc']);
//
//         return department::all();
//==========================================
//        $department = department::find(5);
//        $department->update([
//            'department'    =>  'Central Baggage Division',
//            'organization'  =>  'CBS Personnel'
//        ]);
//
//        $dept_tbl= department::all();
//
//
//// ===========FORMS
//
//
//{!! Form::open(array('url' => 'apps/about')) !!}
//
//            {!! Form::password('password', array('class' => 'awesome','id' => 'testpasswordid')) !!}
//
//            {!! Form::checkbox('name', 'value')  !!}
//
//            {!! Form::file('fileupload', $attributes = array('id'=> 'testid')) !!}
//
//
//            {!! Form::date('name', \Carbon\Carbon::now()) !!}
//
//
//            {!! Form::label('task', 'time') !!}
//            {!! Form::text('task', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
//
//
//
//            {!! Form::selectRange('number', 10, 20) !!}
//
//            {!! Form::selectMonth('month')  !!}
//
//
//            {!! Form::textarea('month')  !!}
//
//
//
//
//            @if($sizes)
//    @foreach ($sizes as $size)
//        {{$size}} </br>
//        @endforeach
//            @endif
//
//            {!!Form::submit('Click Me!'); !!}
//            {!! Form::close() !!}
//
//            {!! link_to_asset('foo/bar.zip', $title = null, $attributes = array(), $secure = null) !!}





\Carbon\Carbon::setToStringFormat('m/d/Y');
echo $date =  \Carbon\Carbon::now();
echo "<br>";
echo $tomorrow = \Carbon\Carbon::now()->addDay(20). "<br>";
echo   \Carbon\Carbon::now()->subMinutes(2)->diffForHumans(). "<br>";


echo $howOldAmI =  \Carbon\Carbon::createFromDate(1989, 1, 27)->age . "<br>";


printf("Right now is %s", \Carbon\Carbon::now()->toDateTimeString());

echo "<br>";

echo $tomorrow =  \Carbon\Carbon::tomorrow();

echo "<br>";


echo  $now = \Carbon\Carbon::parse();

echo "<br>";
echo $now->year;