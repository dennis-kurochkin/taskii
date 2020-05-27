@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('projects.update', $project) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Наименование *</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $project->title }}" placeholder="Например, интернет-магазин Алиса" required autofocus>

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="8" placeholder="Краткое описание проекта для понимания специфики задач">{{ $project->description }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Сохранить</button>
    <a href="{{ url()->previous() }}" class="btn btn-lg btn-danger">Назад</a>
</form>

@endsection
