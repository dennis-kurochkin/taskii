<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;
use App\User;
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
     * Display a task
     *
     * @return Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', [
            'title' => "Задача №{$task->id}",
            'task' => $task
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create', [
            'title' => 'Создать задачу',
            'projects' => Project::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Create a new task.
     *
     * @return Response
     */
    public function store()
    {
        $task = new Task($this->validateTask());

        $task->save();


        return redirect(route('tasks.index'));
    }

    /**
     * Destroy the given task.
     *
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect(route('tasks.index'));
    }

    /**
     * Validate a task
     */

    protected function validateTask()
    {
        // dd(request());
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'max:511',
            'due_date' => 'required|date|after_or_equal:today',
            'priority' => 'required|min:1'
        ]);
    }
}
