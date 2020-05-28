@extends('layouts.app')

@section('head')

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//www.chartjs.org/samples/latest/utils.js"></script>
<script src="//www.chartjs.org/dist/2.9.3/Chart.min.js"></script>

@endsection


@section('content')

<div class="row mb-5">
    <div class="col">
        <div id="canvas-holder" style="margin: 0; max-width: 100%;">
            <canvas id="chart-area"></canvas>
        </div>

        <script>
            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            {{ $stats['tasks_overdue'] }},
                            {{ $stats['tasks_uncompleted'] }},
                            {{ $stats['tasks_completed'] }}
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.yellow,
                            window.chartColors.green
                        ],
                        label: 'Статистика выполнения задач'
                    }],
                    labels: [
                        'Просроченных',
                        'Невыполненных',
                        'Выполненных'
                    ]
                },
                options: {
                title: {
                    display: true,
                    text: 'Аналитика задач'
                }
                }
            };

            window.onload = function () {
                var ctx = document.getElementById('chart-area').getContext('2d');
                window.myPie = new Chart(ctx, config);
            };

        </script>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <canvas id="bar-chart" width="800" height="450"></canvas>

        <script>
            // Bar chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                labels: [
                    @foreach($stats['users'] as $user)
                        "{{ $user->name . ' ' . $user->surname }}",
                    @endforeach
                    ],
                datasets: [
                    {
                    label: "Количество задач",
                    backgroundColor: [
                        "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                    data: [
                        @foreach($stats['users'] as $user)
                        {{ $user->completedTasks->count() }},
                    @endforeach
                    ]
                    }
                ]
                },
                options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Выполненных задач сотрудниками'
                }
                }
            });
        </script>

    </div>
    <div class="col-6">
        <canvas id="bar-chart-2" width="800" height="450"></canvas>

        <script>
            // Bar chart
            new Chart(document.getElementById("bar-chart-2"), {
                type: 'bar',
                data: {
                labels: [
                    @foreach($stats['users'] as $user)
                        "{{ $user->name . ' ' . $user->surname }}",
                    @endforeach
                    ],
                datasets: [
                    {
                    label: "Количество задач",
                    backgroundColor: [
                        "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                    data: [
                        @foreach($stats['users'] as $user)
                        {{ $user->tasks->count() }},
                    @endforeach
                    ]
                    }
                ]
                },
                options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Назначенных задач сотрудникам'
                }
                }
            });
        </script>

    </div>
</div>

@endsection
