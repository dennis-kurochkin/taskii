<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/users', 'UsersController@index')->name('users.index')->middleware('auth');
Route::delete('/users/create', 'UsersController@destroy')->name('users.destroy')->middleware('auth');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy')->middleware('auth');

Route::get('/stats', 'StatsController@index')->name('stats.index')->middleware('auth');

Route::get('/projects', 'ProjectsController@index')->name('projects.index')->middleware('auth');
Route::post('/projects', 'ProjectsController@store')->name('projects.store')->middleware('auth');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create')->middleware('auth');
Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show')->middleware('auth');
Route::delete('/projects/{project}', 'ProjectsController@destroy')->name('projects.destroy')->middleware('auth');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit')->middleware('auth');
Route::put('/projects/{project}', 'ProjectsController@update')->name('projects.update')->middleware('auth');

Route::get('/tasks', 'TasksController@index')->name('tasks.index')->middleware('auth');
Route::post('/tasks', 'TasksController@store')->name('tasks.store')->middleware('auth');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create')->middleware('auth');
Route::delete('/tasks/{task}', 'TasksController@destroy')->name('tasks.destroy')->middleware('auth');
Route::get('/tasks/{task}/edit', 'TasksController@edit')->name('tasks.edit')->middleware('auth');
Route::put('/tasks/{task}', 'TasksController@update')->name('tasks.update')->middleware('auth');

Route::get('/help', 'HelpController@index')->name('help.index')->middleware('auth');

Auth::routes();
