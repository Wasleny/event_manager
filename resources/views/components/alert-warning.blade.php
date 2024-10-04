@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
