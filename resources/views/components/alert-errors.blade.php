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
