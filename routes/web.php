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

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::get('/stats', 'StatsController@index')->name('stats.index');

    Route::get('/projects', 'ProjectsController@index')->name('projects.index');
    Route::post('/projects', 'ProjectsController@store')->name('projects.store');
    Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
    Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
    Route::delete('/projects/{project}', 'ProjectsController@destroy')->name('projects.destroy');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
    Route::put('/projects/{project}', 'ProjectsController@update')->name('projects.update');

    Route::get('/tasks', 'TasksController@index')->name('tasks.index');
    Route::post('/tasks', 'TasksController@store')->name('tasks.store');
    Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
    Route::delete('/tasks/{task}', 'TasksController@destroy')->name('tasks.destroy');
    Route::get('/tasks/{task}/edit', 'TasksController@edit')->name('tasks.edit');
    Route::put('/tasks/{task}', 'TasksController@update')->name('tasks.update');

    Route::get('/help', 'HelpController@index')->name('help.index');
});
