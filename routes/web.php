<?php


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('/home', 'PostsController@index');

Route::get('/posts','PostsController@index')->name('posts');;

Route::get('/posts/create','PostsController@create')->name('CriarPosts');

Route::post('/posts','PostsController@store');

Route::get('/like/{id}','PostsController@like');

Route::get('/deslike/{id}','PostsController@deslike');

Route::get('/comentar','comentariosController@Comentar')->name('Comentar');

Route::get('/deletarComentario','comentariosController@DeletarComentario')->name('DeletarComentario');

Route::resource('notifications', 'NotificationController');


