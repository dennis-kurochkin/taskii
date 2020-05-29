<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        return view('tasks.index', [
            'title' => 'Задачи',
            'tasks' => Auth::user()->tasks->sortBy('due_date')
        ]);
    }
    /**
     * Update the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Task $task)
    {
        $task->update(['completed_at' => Carbon::now()]);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', [
            'title' => $task->title,
            'task' => $task
        ]);
    }
}
