@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name" class="col-form-label">Имя</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="surname" class="col-form-label">Фамилия</label>
        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="additional-name">

        @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="role" class="col-form-label">Роль</label>

        <select
            name="role"
            class="form-control @error('role') is-invalid @enderror"
            id="role"
            required>

            <option value="">Выберите {{ old('role') }}</option>
            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Администратор</option>
            <option value="manager" {{ old('role') === 'manager' ? 'selected' : '' }}>Менеджер</option>
            <option value="employee" {{ old('role') === 'employee' ? 'selected' : '' }}>Сотрудник</option>

        </select>

        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>Выберите корректную роль пользователя</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="col-form-label">E-mail</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm">Подтверждение пароля</label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Зарегистрировать</button>
</form>

@endsection
