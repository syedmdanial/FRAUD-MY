<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//main routes

use App\User;
use App\Scammer;
use App\Report;

Route::get('/charts',function(){  //get approved cases on graph
    return DB::table('reports')
  ->selectRaw('medium, COUNT(*) as count')
  ->groupBy('medium')
  ->where('status','1')
  ->get();
});

Route::get('/', function () { //homepage
    return view('welcome');
});

Route::get('/dump',function(){  //to create superadmin

    User::create([
        'username' => 'admin',
        'name' => 'Syed Danial',
        'address' => '',
        'phone' => '0124080499',
        'email' => 'fraud.my@gmail.com',
        'slug' => str_slug('admin', '-'),
        'role' => '1',
        'picture' => 'img/default.png',
        'password' => bcrypt("123456")
    ]);

    return redirect('/');
});

Route::get('/login',function(){   //redirect to dashboard after login
    if (Auth::check()){
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

Route::get('/register',function(){ //redirect to dashboard/register
    if (Auth::check()){
        return redirect('/dashboard');
    }
    return view('register');
});

Route::get('/all',function(){  //list scammers
    $scammers=Scammer::where('status',1)->get();
    $reports=array();
    return view('search',compact('scammers','reports'));
});

Route::get('/search',function(){   //homepage search
    $scammers=App\Scammer::search(request('query'))->get();
    $reports=App\Report::search(request('query'))->get();
    return view('search',compact('scammers','reports'));
});

Route::get('/searchApi',function(){  //google extension plugin search
    $scammers=App\Scammer::search(request('query'))->get();
    $reports=App\Report::search(request('query'))->get();
    return response($scammers, 200);
});

Route::get('/search/detail/{scammer}',function(Scammer $scammer){
    return view('detail',compact('scammer'));
});

Route::get('/contact',function(){
    return view('contact');
});

Route::post('/contact','UserController@contact');

Route::post('/register',"UserController@register");

Route::post('/login','UserController@login');

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');  //check authentication first

Route::get('/logout',function(){   //logout
    auth()->logout();
    return redirect('/');
});

//end main routes

//Manages User routes

Route::get('/user/new',function(){
    return view('dashboard.user.new');
})->middleware('auth');

Route::get('/user/edit/{user}',function(User $user){
    return view('dashboard.user.edit',compact('user'));
})->middleware('auth');

Route::post('/user/new',"UserController@store")->middleware('auth');

Route::get('/user/view',"UserController@show")->middleware('auth');

Route::put('/user/edit/{user}',"UserController@update")->middleware('auth');

Route::delete('/user/delete/{user}','UserController@delete')->middleware('auth');

Route::get('/user/profile/basic',function(){
    return view('dashboard.user.profile.basic');
})->middleware('auth');

Route::get('/user/profile/password',function(){
    return view('dashboard.user.profile.password');
})->middleware('auth');

Route::put('/user/profile/basic','UserController@profileBasic')->middleware('auth');

Route::put('/user/profile/password','UserController@profilePassword')->middleware('auth');

//End User Routes

//Scammer Routes

Route::get('/scammer/new',function(){
    return view('dashboard.scammer.new');
})->middleware('auth');

Route::post('/scammer/new',"ScammerController@store")->middleware('auth');

Route::get('/scammer/list',function(){
    $scammers=Scammer::where('status',1)->get();

    return view('dashboard.scammer.list',compact('scammers'));

})->middleware('auth');

Route::get('/scammer/new/report/{scammer}',function(Scammer $scammer){
    return view('dashboard.scammer.newreport',compact('scammer'));
});

Route::post('/scammer/new/report/{scammer}',"ScammerController@report")->middleware('auth');


Route::get('/view/my/scammer',function(){
     $users=User::find(auth()->user()->id);

     $scammers=$users->scammers;

     return view('dashboard.view.my.scammer',compact('scammers'));
})->middleware('auth');

Route::get('/view/my/report',function(){
    $users=User::find(auth()->user()->id);

    $scammers=$users->scammers;

    return view('dashboard.view.my.report',compact('scammers'));
})->middleware('auth');

Route::get('/report/{scammer}',function(Scammer $scammer){
    $reports=Report::where('scammer_id',$scammer->id)->get();

    return view('dashboard.view.report',compact('reports'));
})->middleware('auth');

Route::get('/view/all/scammer',function(){
    $scammers=Scammer::all();

    return view('dashboard.view.all.scammer',compact('scammers'));
})->middleware('auth');

Route::get('/view/all/report',function(){
    $reports=Report::all();

    return view('dashboard.view.all.report',compact('reports'));
})->middleware('auth');

Route::get('/scammer/edit/{scammer}',function(Scammer $scammer){
    return view('dashboard.scammer.edit',compact('scammer'));
})->middleware('auth');

Route::put('/scammer/edit/{scammer}','ScammerController@update')->middleware('auth');

Route::delete('/scammer/delete/{scammer}','ScammerController@delete')->middleware('auth');

Route::get('/report/edit/{report}',function(Report $report){
    return view('dashboard.scammer.editreport',compact('report'));
})->middleware('auth');

Route::put('/report/edit/{report}','ReportController@update')->middleware('auth');

Route::delete('/report/delete/{report}','ReportController@delete')->middleware('auth');

//End Scammer Routes

//Manage Scammer Routes





//End Manage Scammer Routes
