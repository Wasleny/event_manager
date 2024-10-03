@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cadastro de Usuário</h4>
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

                <form action="/cadastro" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome Sobrenome">
                        <label for="name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="date_birth" name="date_birth">
                        <label for="date_birth">Data de Nascimento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Rua, número, bairro - Cidade-Estado">
                        <label for="address">Endereço</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmação de senha">
                        <label for="password_confirmation">Confirmação de senha</label>
                    </div>

                    <div class="float-end mt-3">
                        <button type="submit" class="btn btn-info">Cadastrar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
