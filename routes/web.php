<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;


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

Route::get('/info', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/messages', function () {
    return view('messages');
})->middleware(['auth'])->name('messages');

Route::post('/getMessage',function(Request $request){
    //$message = new Message;
    $message = Message::create([
        'name'      => $request->name,
        'email'     => $request->email,
        'subject'   => $request->subject,
        'message'   => $request->message
    ]);
    if($message->save())
        return response()->json("OK");
    else
        return response()->json("Database Error");

})->name('getMessage');

Route::get('/test',function(){
    $message = Message::create([
        'name'      => "Manish",
        'email'     => "manish@mail.com",
        'subject'   => "Subject",
        'message'   => "Message"
    ]);
    $message->save();

});

Route::get('/', function(){ return view('front'); });

Route::get('/career',function(){ return view('career'); });

Route::get('/career/{id}',function($id){ echo $id; });

require __DIR__.'/auth.php';

