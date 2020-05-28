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
                @include('components.task', ['task' => $task, 'project' => $project])
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
