<?php

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

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin.Products Route
Route::get('/admin/players', 'PlayerController@Index');

Route::get('/admin/players/create', 'PlayerController@Create');

Route::post('/admin/players/create', 'PlayerController@Store');

Route::get('/admin/players/edit/{id}', 'PlayerController@Edit');

Route::post('/admin/players/edit', 'PlayerController@Update');

Route::get('/admin/players/delete/{id}', 'PlayerController@Delete');

Route::delete('/admin/players/delete', 'PlayerController@Remove');

Route::get('/admin/players/{id}', 'PlayerController@Show');

// playerstore Routes
Route::get('/players', 'PlayerController@Playersstore')->name('PlayersStore');

Route::get('/players/{id}', 'PlayerController@PlayersDetails')->name('PlayersDetails');

Route::post('/players/comment', 'PlayerController@AddComment')->name('PlayersComment');

// Admin.teams Route
Route::get('/admin/teams', 'TeamsController@Index');

Route::get('/admin/teams/create', 'TeamsController@Create');

Route::post('/admin/teams/create', 'TeamsController@Store');

Route::get('/admin/teams/edit/{id}', 'TeamsController@Edit');

Route::post('/admin/teams/edit', 'TeamsController@Update');

Route::get('/admin/teams/delete/{id}', 'TeamsController@Delete');

Route::delete('/admin/teams/delete', 'TeamsController@Remove');

Route::get('/admin/teams/{id}', 'TeamsController@Show');

// teamsstore Routes
Route::get('/teams', 'TeamsController@Teamsstore')->name('TeamsStore');

Route::get('/teams/{id}', 'TeamsController@TeamsDetails')->name('TeamsDetails');

// Awards.teams Route
Route::get('/admin/awards', 'AwardsController@Index');

Route::get('/admin/awards/create', 'AwardsController@Create');

Route::post('/admin/awards/create', 'AwardsController@Store');

Route::get('/admin/awards/edit/{id}', 'AwardsController@Edit');

Route::post('/admin/awards/edit', 'AwardsController@Update');

Route::get('/admin/awards/delete/{id}', 'AwardsController@Delete');

Route::delete('/admin/awards/delete', 'AwardsController@Remove');

Route::get('/admin/awards/{id}', 'AwardsController@Show');

// awardsstore Routes
Route::get('/awards', 'AwardsController@Awardsstore')->name('AwardsStore');

Route::get('/awards/{id}', 'AwardsController@AwardsDetails')->name('AwardsDetails');

// Categories
Route::get('/admin/categories', 'CategoryController@index')->name('categories');

Route::post('/admin/categories/create', 'CategoryController@create')->name('createCategory');

Route::post('/admin/categories/edit/{id}', 'CategoryController@edit')->name('editCategory');

Route::delete('/admin/categories/delete/{id}', 'CategoryController@delete')->name('deleteCategory');

Route::get('/mongodb', function () {
    return view('mongodb');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
