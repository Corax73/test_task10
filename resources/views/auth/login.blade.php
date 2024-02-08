@extends('main')

@section('pageTitle', 'Вход')

@section('content')
<div class="container">
    <div class="form-wrap d-flex align-items-center justify-content-center">
        <form class="form p-5 shadow-lg rounded" method="POST" action="{{ route('login') }}">
            @csrf
            <a class="text-decoration-none fs-4 d-block text-center mb-3 text-dark" href="{{ route('main') }}">НА
                ГЛАВНУЮ</a>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Логин</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                @error('email')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @error('password')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>
@endsection