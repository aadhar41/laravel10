<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App - @yield('title')</title>
</head>

<body>
    <div>
        @if (session('status'))
            <div class="alert alert-danger"
                style="background: rgba(0, 150, 0, 0.1); border:1px solid rgba(0, 150, 0, 0.7); color:rgba(0, 150, 0, 0.7); padding: 8px; border-radius: 3px;"
                role="alert">
                <strong>{{ session('status') }}</strong>
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
