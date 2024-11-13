<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Netmon | Sign-up</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo-resize.png') }}" alt="NetMon Logo" style="max-width: 100%; height: auto;">
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input autocomplete="username" class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input autocomplete="email" class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input autocomplete="current-password" class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password:</label>
                        <input autocomplete="current-password" class="form-control" type="password" name="confirm-password" id="confirm-password" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Sign-up</button>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <p>Already registered? <a href="{{ route('login') }}">Log-in</a></p>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</body>
</html>
