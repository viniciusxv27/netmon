<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Netmon | Forgot</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo-resize.png') }}" alt="NetMon Logo" style="max-width: 100%; height: auto;">
                </div>
                <form action="{{ route('forgotpass') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input autocomplete="email" class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Send Email</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('forgotpass') }}">Forgot my password</a>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign-up</a></p>
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
