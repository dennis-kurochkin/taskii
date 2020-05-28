<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stats.index', [
            'title' => 'Аналитика',
            'stats' => [
                'tasks_exists' => Task::count(),
                'tasks_completed' => Task::whereNotNull('completed_at')->count(),
                'tasks_uncompleted' => Task::where('completed_at', null)->count(),
                'tasks_overdue' => Task::whereDate(
                    'due_date',
                    '<',
                    Carbon::today()->toDateString()
                )->where('completed_at', null)->count(),
                'project_exists' => Project::count(),
                'users' => User::where('role', 'employee')->get()
            ]
        ]);
    }
}
