@extends('layouts.app')

@section('content')

@if(count($projects) > 0)
    <div class="list-group shadow-sm">
        @foreach($projects as $project)
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1 font-weight-bold">{{ $project->title }}</h4>
                </div>
                @if($project->description)
                    <p class="mb-1 lead">{{ $project->description }}</p>
                @endif
                <p class="m-0"><strong>Задач: </strong></p>
                <div class="mt-2">
                    <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-sm btn-success">Добавить задачу</a>
                    <a href="{{ route('projects.tasks.index', $project) }}" class="btn btn-sm btn-primary">Управление задачами</a>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-secondary">Редактировать</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-project-{{ $project->id }}" class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-primary" role="alert">
        Проектов в системе на найдено. <a href="{{ route('projects.create') }}">Создайте новый!</a>
    </div>
@endif

@endsection
