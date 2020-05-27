@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Наименование *</label>
        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            id="title"
            value="{{ $task->title }}"
            placeholder="Поправить верстку"
            required>

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="user_id">Исполнитель *</label>
        <select
            name="user_id"
            class="form-control @error('user_id') is-invalid @enderror"
            id="user_id"
            required>

            <option value="">Выберите</option>

            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }} | {{ $user->email }}</option>
            @endforeach

        </select>

        @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="due_date">Срок выполнения *</label>
        <input
            type="date"
            name="due_date"
            class="form-control @error('due_date') is-invalid @enderror"
            id="due_date"
            value="{{ date('Y-m-d', strtotime($task->due_date)) }}"
            required>

        @error('due_date')
            <span class="invalid-feedback" role="alert">
                <strong>Срок выполнения должен быть не раньше сегодняшнего дня.</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="completed_at">Выполнена *</label>
        <input
            type="date"
            name="completed_at"
            class="form-control @error('completed_at') is-invalid @enderror"
            id="completed_at"
            value="{{ date('Y-m-d', strtotime($task->completed_at)) }}"
            required>

        @error('completed_at')
            <span class="invalid-feedback" role="alert">
                <strong>Срок выполнения должен быть не раньше сегодняшнего дня.</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea
            name="description"
            class="form-control @error('description') is-invalid @enderror"
            id="description"
            rows="8">{{ $task->description }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="priority">Приоритет *</label>
        <select
            name="priority"
            class="form-control @error('priority') is-invalid @enderror"
            id="priority"
            required>

            <option value="">Выберите</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>

        </select>

        @error('priority')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Сохранить</button>
    <a href="{{ url()->previous() }}" class="btn btn-lg btn-danger">Отмена</a>

</form>

@endsection
