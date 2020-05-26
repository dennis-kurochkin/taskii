@extends('layouts.app')

@section('content')

@if(count($tasks) > 0)
    <div class="list-group shadow-sm">
        @foreach($tasks as $task)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-auto pr-0">
                        <a href="#" class="btn btn-outline-success" title="Выполнить">
                            <i class="fa fas fa-check"></i>
                        </a>
                    </div>
                    <div class="col">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $task->title }}</h5>
                            <small>выполнить до {{ date('d.m', strtotime($task->due_date)) }} <a href="">Не успеваете?</a></small>
                        </div>
                        @if($task->description)
                            <p class="mb-1">{{ $task->description }}</p>
                        @endif
                        <p class="m-0"><small><strong>Проект: </strong>{{ $task->project->title }}</small></p>
                        <p class="m-0"><small><strong>Исполнитель: </strong>{{ "{$task->user->name} {$task->user->surname}, {$task->user->email}" }}</small></p>
                        <div class="mt-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Редактировать</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Назначенные вам задачи отсутствуют. Пожалуйста, свяжитесь с менеджером.</p>
@endif

@endsection
