@extends('layouts.app')

@section('content')

@include('components.task.show')

<a href="{{ route('projects.tasks.index', $project) }}" class="btn btn-lg btn-danger">Назад</a>

@endsection
