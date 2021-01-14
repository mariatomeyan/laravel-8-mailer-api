<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
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

Route::get('/', function () {
    $user = User::first();

    $files = [
        array('file'=> public_path('robots.txt'), 'options'=> [] ),
        array('file'=> public_path('testing.txt'), 'options'=> [] )
    ];

    \App\Jobs\SendEmails::dispatch(
        [
            array(
                'address' => $user->email,
                'name' => $user->name
            )
        ],
        [
          array(
                'address' => 'marisbjb@gmail.com',
                'name' => 'jdshfjdkhf sdfhsdjfh'
          )
        ],
        'New Subject',
        $files
    );

});
Route::get('/images', function (){
    return \Illuminate\Support\Facades\Storage::disk('images')->url('images/images.txt');
});
