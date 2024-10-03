@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Redefinir Senha</h4>
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

                <form action="/redefinir-senha" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="nome@exemplo.com">
                        <label for="email">E-mail</label>
                    </div>

                    <div class="float-end mt-3">
                        <button type="submit" class="btn btn-info">Enviar e-mail</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
