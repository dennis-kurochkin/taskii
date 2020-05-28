<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index', [
            'tasks' => Task::all()
        ]);
    }
}
