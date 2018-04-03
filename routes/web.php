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

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\DirectMessage;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'ArticleController@index')->name('blog');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::post('/contact', function(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'topic' => 'required',
        'content' => 'required',
    ]);
    if($validator->passes())
    {
        $email = new DirectMessage($request->input('email'), $request->input('topic'), $request->input('content'));
        Mail::to(   env('APP_DM_RECIPIENT')   )->send($email);
        return redirect('/contact')->withSuccess('<strong>Great</strong> I will respond shortly, thanks.');
    }
    return redirect('/contact')->withErrors($validator)->withInput();
})->middleware('recaptcha');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/articles', 'ArticleController@index');

Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles/create', 'ActionController@store');

Route::get('/articles/{article}', 'ArticleController@show');

Route::delete('/articles/{article}', 'ArticleController@delete');
Route::get('/articles/{article}/delete', 'ArticleController@delete');


Route::get('/math', 'MathController@index')->name('math');
Route::get('/math/flash-cards', 'MathController@showFlashCards')->name('flash-cards');
Route::get('/math/times-table', 'MathController@showTimesTable')->name('times-table');
Route::get('/math/formulas', 'MathController@showFormulas')->name('formulas');