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
    Route::get('/help', 'HelpController@index')
        ->name('help.index');

    Route::put('/tasks/{task}/comment', 'CommentsController@store')
        ->name('comments.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', 'UsersController@index')
        ->name('users.index');
    Route::delete('/users/{user}', 'UsersController@destroy')
        ->name('users.destroy');
    Route::get('/users/{user}/edit', 'UsersController@edit')
        ->name('users.edit');
    Route::put('/users/{user}', 'UsersController@update')
        ->name('users.update');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('/stats', 'StatsController@index')
        ->name('stats.index');

    Route::get('/projects', 'ProjectsController@index')
        ->name('projects.index');
    Route::post('/projects', 'ProjectsController@store')
        ->name('projects.store');
    Route::get('/projects/create', 'ProjectsController@create')
        ->name('projects.create');
    Route::delete('/projects/{project}', 'ProjectsController@destroy')
        ->name('projects.destroy');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit')
        ->name('projects.edit');
    Route::put('/projects/{project}', 'ProjectsController@update')
        ->name('projects.update');

    Route::get('/projects/{project}/tasks', 'ProjectTasksController@index')
        ->name('projects.tasks.index');
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')
        ->name('projects.tasks.store');
    Route::get('/projects/{project}/tasks/create', 'ProjectTasksController@create')
        ->name('projects.tasks.create');
    Route::delete('/projects/{project}/tasks/{task}', 'ProjectTasksController@destroy')
        ->name('projects.tasks.destroy');
    Route::get('/projects/{project}/tasks/{task}/edit', 'ProjectTasksController@edit')
        ->name('projects.tasks.edit');
    Route::get('/projects/{project}/tasks/{task}', 'ProjectTasksController@show')
        ->name('projects.tasks.show');
    Route::put('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')
        ->name('projects.tasks.update');
});

Route::middleware(['auth', 'employee'])->group(function () {

    Route::get('/tasks', 'TasksController@index')
        ->name('tasks.index');
    Route::put('/tasks/{task}', 'TasksController@update')
        ->name('tasks.update');
    Route::get('/tasks/{task}', 'TasksController@show')
        ->name('tasks.show');
});
