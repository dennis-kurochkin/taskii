@extends('layouts.app')

@section('content')

@if(count($tasks) > 0)
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
                            <form action="{{ route('tasks.update', $task) }}" method="POST" class="d-inline">
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
                        <p class="m-0"><small><strong>Проект: </strong>{{ $task->project->title }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-primary" role="alert">
        Назначенные вам задачи отсутствуют. Пожалуйста, свяжитесь с менеджером
    </div>
@endif

@endsection
