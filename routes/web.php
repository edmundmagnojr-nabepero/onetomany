<?php

use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/create', function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first post with Edwin Diaz 2', 'body'=>'I love larvel with Edwin Diaz']);
    $user->posts()->save($post);
});

Route::get('/read', function(){
    $user = User::findOrFail(1);
    foreach($user->posts as $post){
        echo $post->title."<br>";
    }
    // return $user->posts;
});

Route::get('/update', function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awasome, thank you Edwin Diaz']);
    $user->posts()->where('id','=','2')->update(['title'=>'I love laravel 2', 'body'=>'This is awasome, thank you Edwin Diaz']);
});

Route::get('/delete', function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->delete();
});
