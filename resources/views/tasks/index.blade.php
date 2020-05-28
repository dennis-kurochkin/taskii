@extends('layouts.app')

@section('content')

@if(count($tasks) > 0)
    <div class="list-group shadow-sm">
        @foreach($tasks as $task)
            @include('components.task', ['task' => $task, 'project' => $task->project])
        @endforeach
    </div>
@else
    <div class="alert alert-primary" role="alert">
        Назначенные вам задачи отсутствуют. Пожалуйста, свяжитесь с менеджером
    </div>
@endif

@endsection
