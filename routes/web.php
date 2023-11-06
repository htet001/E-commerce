<?php

use App\Models\Post;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('city/{id}/post', function ($id) {
    $city = City::find($id);

    foreach ($city->posts as $post) {
        echo $post->title;
    }
});

Route::get('user/{id}/role', function ($id) {
    $user = User::find($id);
    echo $user->name;
    foreach ($user->roles as $role) {
        echo $role->rank . "<br>";
    }
});

Route::get('post/insert', function () {
    Post::create(['user_id' => 2, 'title' => 'second title', 'content' => 'second Contnet']);
});

Route::get('user/{id}/city', function ($id) {
    $user = User::where('id', $id)->firstOrFail();
    echo $user->name . "<br>";
    //echo $user->city->name;
});

Route::get('user/{id}/post', function ($id) {
    $user = User::where('id', $id)->firstOrFail();
    echo $user->name;
});

Route::get('post/{id}/show', function ($id) {
    $post = Post::find($id);
    echo $post->content . "<br>";
    echo $post->user->email;
});

Route::get('/user/insert', function () {
    // $user = new User();

    // $user->name = "htet";
    // $user->email = "htet@gmail.com";
    // $user->password = Hash::make('123123');

    // $user->save();

    $pass = Hash::make('123123');
    User::create(['name' => 'Doen', 'email' => 'doen@gmail.com', 'password' => $pass]);
});