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

use App\News;




Route::group(['prefix' => 'admin',
              'namespace' => 'Admin',
              'middleware'=>'admin'
       ], function()
{

    Route::get('dashboard/news', 'AdminController@adminNews');
    Route::get('dashboard/comments', 'AdminController@adminComments');
    Route::get('dashboard/comments_all', 'AdminController@adminCommentsAll');

    Route::get('dashboard/users', 'AdminController@adminUsersGet');

    Route::get('dashboard/colors', 'AdminController@adminColorsGet');
    Route::post('dashboard/colors', 'AdminController@adminColorsSet');

    Route::post('dashboard/users/{id}/{status}', 'AdminController@renewusers');
    Route::post('dashboard/comments/{id}/{status}', 'AdminController@renewcomments');
    Route::post('dashboard/comments/edit/{id}/{comment}', 'AdminController@editcomments');

    Route::resource('dashboard', 'AdminController');

});


    Route::get('/livesearch/{str}', 'SearchController@livesearch');
    Route::get('/livesearch/results/{str}', 'SearchController@livesearchResults');

Route::get('/', 'NewsController@index');
Route::get('/top_commentator/{user_name}', 'CommentsController@search');
Route::get('/{category}/page1', 'NewsController@categoryindex');
Route::get('/{category}/{pageID}', 'NewsController@showSingleNew');
Route::post('/{category}/{pageID}/comments', 'CommentsController@store');
    Route::post('/ajax/vote_like/{comment_id}/{value}', 'CommentsController@vote_like');
    Route::post('/ajax/vote_dislike/{comment_id}/{value}', 'CommentsController@vote_dislike');


    Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
//Route::post('/login', 'SessionsController@store');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/search', 'SearchController@search');




