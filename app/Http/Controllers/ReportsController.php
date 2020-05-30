<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ReportsController extends Controller
{
    public function index()
    {
        $params = [
            'title' => 'Отчеты'
        ];


        switch (request()->query('report')) {
            case 1:
                /*

                due_date = 20.05.2020
                today_date = 28.05.2020

                if due_date < today_date - 7 days = 21.05.2020



                */
                // If today's date more than (due_date + 7 days)
                // If due_date + 7 days less than today
                $params = [
                    'title' => 'Незавершенные задачи, затянувшиеся по срокам',
                    'tasks' =>
                    Task::where('completed_at', null)
                        ->whereDate(
                            'due_date',
                            '<=',
                            Carbon::today()->subDays(7)
                        )
                        ->get()
                ];

                break;
            case 2:
                $params = [
                    'title' => 'Задачи, завершенные на этой неделе',
                    'tasks' =>
                    Task::whereNotNull('completed_at')
                        ->whereDate(
                            'completed_at',
                            '>=',
                            Carbon::today()->subDays(7)->toDateString()
                        )
                        ->get()
                ];

                break;
            case 3:
                $params = [
                    'title' => 'Завершение задач за месяц:<br> планируемое и фактическое',
                    'tasks' =>
                    Task::whereNotNull('completed_at')
                        ->whereDate(
                            'completed_at',
                            '>=',
                            Carbon::today()->subMonth(1)->toDateString()
                        )
                        ->get()
                ];

                break;
        }

        return view('reports.index', $params);
    }
}
