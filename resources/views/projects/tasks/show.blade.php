@extends('layouts.app')

@section('content')

@include('components.task.show')

<a href="{{ route('tasks.index') }}" class="btn btn-lg btn-danger">Назад</a>

@endsection
