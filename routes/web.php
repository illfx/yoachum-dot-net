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
});

Route::get('/contact', function() {
    return view('contact');
});

Route::post(
    '/contact', function(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);
    if($validator->passes())
    {
        $email = new DirectMessage($request->input('email'), $request->input('subject'), $request->input('message'));
        Mail::to(env('APP_DM_RECIPIENT'))->send($email);
        return redirect('/contact')->withSuccess('<strong>Great</strong> I will respond shortly, thanks.');
    }
    return redirect('/contact')->withErrors($validator)->withInput();
})->middleware('recaptcha');


Route::get('/resume', function(){
    return view('resume');
});