@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Acesso de Usuário</h4>
                @if ($errors->any())
                    <div>
                        <h6>Algo deu errado!</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/acesso" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="nome@exemplo.com">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Lembre-se de mim
                        </label>
                    </div>

                    <div>
                        <p><a href="{{ route('redefinir-senha') }}" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Esqueci minha senha</a></p>
                    </div>

                    <div class="float-end mt-3">
                        <button type="submit" class="btn btn-info">Entrar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
