@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Redefinir Senha</h4>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <form action="{{ route('password.update', $token) }}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="nome@exemplo.com">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirmação de senha">
                        <label for="password_confirmation">Confirmação de senha</label>
                    </div>

                    <div class="float-end mt-3">
                        <button type="submit" class="btn btn-info">Redefinir senha</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
