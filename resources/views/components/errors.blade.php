@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul class="nav justify-content-center flex-column">
            @foreach ($errors->all() as $error)
                <li class="">
                    <strong>{{ $error }}</strong>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
    </script>
@endif
