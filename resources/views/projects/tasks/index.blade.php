@extends('layouts.app')

@section('content')

<div class="list-group-item mb-3">
    <div class="d-flex w-100 justify-content-between">
        <h4 class="mb-1 font-weight-bold">{{ $project->title }}</h4>
    </div>
    @if($project->description)
        <p class="mb-1 lead">{{ $project->description }}</p>
    @endif
    <div class="mt-2">
        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-sm btn-success">Добавить задачу</a>
        <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-secondary">Редактировать</a>
        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" id="delete-project-{{ $project->id }}" class="btn btn-sm btn-danger">Удалить</button>
        </form>
    </div>
</div>

@if(count($tasks) > 0)
    <div class="pl-5">
        <div class="list-group shadow-sm">
            @foreach($tasks as $task)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto pr-0">
                            @if($task->completed_at)
                                <button type="button" class="btn btn-success disabled" title="Выполнено" disabled>
                                    <i class="fa fas fa-check"></i>
                                </button>
                            @else
                                <form action="{{ route('projects.tasks.update', [$project, $task]) }}" method="POST" class="d-inline">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="type" value="complete">
                                    <button type="submit" class="btn btn-outline-success" title="Выполнить">
                                        <i class="fa fas fa-check"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="col">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $task->title }}</h5>
                                <small>выполнить до {{ date('d.m', strtotime($task->due_date)) }}</small>
                            </div>
                            @if($task->description)
                                <p class="mb-1">{{ $task->description }}</p>
                            @endif
                            <p class="m-0"><small><strong>Исполнитель: </strong>{{ "{$task->user->name} {$task->user->surname}, {$task->user->email}" }}</small></p>
                            <div class="mt-2">
                                <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="d-inline">
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
    </div>
@else
    <div class="alert alert-primary" role="alert">
        Задач для проекта еще не создано. <a href="{{ route('projects.tasks.create', $project) }}">Создать?</a>
    </div>
@endif

<div class="d-flex mt-3 justify-content-end">
    <a href="{{ route('projects.index', $project) }}" class="btn btn-lg btn-secondary">Назад</a>
</div>

@endsection
