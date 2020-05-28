@extends('layouts.app')

@section('content')

@if(count($users) > 0)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">E-mail</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Роль</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->role === 'admin' ? 'Администратор' : (
                                $user->role === 'manager' ? 'Менеджер' : 'Сотрудник')
                        }}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary mr-1">Изменить</a>
                            <form action="{{ url('users/' . $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-sm btn-danger">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Проектов пока еще нет.</p>
@endif

@endsection
