<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notification', function () {
   $user = \App\User::find(1);
//   $comment = \App\Comment::withTrashed()->find(1);

   $user->notify(new \App\Notifications\Auth\UserJoined($user));
    $user->notify(new \App\Notifications\Comment\CommentCreated($comment));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
