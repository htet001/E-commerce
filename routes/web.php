<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getall', function () {
    $post = Post::all();
    foreach ($post as $posts) {
        echo $posts->title . "<br>";
    }
});

Route::get('/find', function () {
    $post = Post::all();
    return $post;
});

Route::get('/insert', function () {
    $post = new Post();

    $post->title = "Testing 1 bro";
    $post->content = "Content";

    $post->save();
});

Route::get('/update2', function () {
    $post = Post::find(1);

    $post->title = "Laravel Tutorial";
    $post->content = "Content Sir";

    $post->save();
});

Route::get('/update', function () {
    Post::where('id', 1)->where('is_admin', 1)->update(['title' => 'PHP OOP', 'content' => 'OOP']);
});

Route::get('/create', function () {
    Post::create(['title' => 'This is title', 'content' => 'This is content']);
});

Route::get('/delete', function () {
    Post::destroy([1, 2, 3]);
});

Route::get('/softdelete', function () {
    $post = Post::find(4);
    $post->delete();
});

Route::get('/findSoftDelete', function () {
    $post = Post::withTrashed()->where('id', 4)->get();
    //$post = Post::onlyTrashed()->where('id', 4)->get();
    return $post;
});



// Route::get('/read', function () {
//     $result = DB::select('select * from posts');
//     $var = '';
//     foreach ($result as $post) {
//         $var .= $post->title . "<br>" . $post->body . "<br>";
//     }
//     return $var;
// });

// Route::get('/insert', function () {
//     DB::insert('insert into posts (title,content) value(?,?)', ['JAVA', 'HSL']);
// });

// Route::get('/update', function () {
//     $answer = DB::update('update posts set title=? where id=?', ['Testing', 2]);
//     return $answer;
// });

// Route::get('/delete', function () {
//     $answer = DB::delete('delete from posts where id=?', [2]);
//     return $answer;
// });