@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('projects.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">Наименование *</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Например, интернет-магазин Алиса" required autofocus>

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="8" placeholder="Краткое описание проекта для понимания специфики задач">{{ old('description') }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Создать</button>
    <a href="{{ url()->previous() }}" class="btn btn-lg btn-danger">Отмена</a>
</form>

@endsection
