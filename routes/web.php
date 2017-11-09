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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
	return App\Post::all();
});

Route::get('/posts/{id}', function ($id) {
	return App\Post::findOrFail($id);
});

Route::get('/posts/create', function () {
	$post = ['title' => 'Title', 'body' => 'Post body.'];
	App\Post::create($post);
	return redirect('/posts');
});

Route::get('/posts/{id}/edit', function ($id) {
	$post = App\Post::findOrFail($id);
	$data = ['title' => 'New Title', 'body' => 'New post body.'];
	$post->update($data);
	return redirect('/posts');
});

Route::get('/posts/{id}/audits', function ($id) {
	$post = App\Post::findOrFail($id);
	return $post->audits;
});

Route::get('/comment/create/{post_id}', function ($post_id) {
	$comment = ['comment' => 'Comment', 'post_id' => $post_id];
	App\Comment::create($comment);
	return redirect('/posts');
});