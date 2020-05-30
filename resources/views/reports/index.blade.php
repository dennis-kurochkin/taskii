@extends('layouts.app')

@section('content')

@if(isset($tasks))
    @if(count($tasks) > 0)

        @if(request()->get('report') == 1)
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Назначена</th>
                        <th scope="col">Проект</th>
                        <th scope="col">Дата назначения</th>
                        <th scope="col">Дата сдачи</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                {{ $task->user->name }} {{ $task->user->surname }},<br>
                                {{ $task->user->email }}
                            </td>
                            <td>{{ $task->project->title }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->created_at)) }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->due_date)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(request()->get('report') == 2)
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Назначена</th>
                        <th scope="col">Проект</th>
                        <th scope="col">Дата назначения</th>
                        <th scope="col">Дата сдачи</th>
                        <th scope="col">Выполнена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>
                                {{ $task->user->name }} {{ $task->user->surname }},<br>
                                {{ $task->user->email }}
                            </td>
                            <td>{{ $task->project->title }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->created_at)) }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->due_date)) }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->completed_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(request()->get('report') == 3)
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Назначена</th>
                        <th scope="col">Проект</th>
                        <th scope="col">Планируемое</th>
                        <th scope="col">Фактическое</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>
                                {{ $task->user->name }} {{ $task->user->surname }},<br>
                                {{ $task->user->email }}
                            </td>
                            <td>{{ $task->project->title }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->due_date)) }}</td>
                            <td>{{ date('d.m.Y', strtotime($task->completed_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    @else
        <div class="alert alert-primary" role="alert">
            Недостаточно данных для формирования отчета
        </div>
    @endif
@else
    <div class="alert alert-danger" role="alert">
        Отчета для этого адреса не существует
    </div>
@endif

@endsection
