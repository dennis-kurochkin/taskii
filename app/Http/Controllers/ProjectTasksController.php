<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('projects.tasks.index', [
            'title' => "Задачи проекта {$project->title}",
            'project' => $project,
            'tasks' => $project->tasks
                ->sortBy('completed_at')
        ]);
    }

    /**
     * Display the task
     */
    public function show(Project $project, Task $task)
    {
        return view('projects.tasks.show', [
            'title' => $task->title,
            'project' => $project,
            'task' => $task
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.tasks.create', [
            'title' => "Добавить задачу для проекта {$project->title}",
            'project' => $project,
            'users' => User::where('role', 'employee')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project)
    {
        $task = new Task($this->validateTask());

        $task->project_id = $project->id;

        $task->save();

        return redirect()->route('projects.tasks.index', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        return view('projects.tasks.edit', [
            'title' => "Редактировать задачу \"{$task->title}\" для проекта \"{$project->title}\"",
            'project' => $project,
            'users' => User::where('role', 'employee')->get(),
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Task $task)
    {
        if (request('type') === 'complete') {
            $task->update(['completed_at' => Carbon::now()]);
        } else {
            $task->update($this->validateTask());
        }

        return redirect()->route('projects.tasks.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return back();
    }

    /**
     * Validate a task
     */
    protected function validateTask()
    {
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'user_id' => 'required|exists:users,id',
            'description' => 'max:511',
            'due_date' => 'required|date|after_or_equal:today',
            'completed_at' => 'after_or_equal:due_date',
            'priority' => 'required|min:1'
        ]);
    }
}
