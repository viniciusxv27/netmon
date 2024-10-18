<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Netmon | Log-in</title>
</head>
<body>
    <div class="content">
        <header>
            <h1>Welcome to the NetMon</h1>
        </header>
        <section>
            <div>
                <ul>
                    <li>
                        <a href="{{ route('login') }}">Log-in</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Sign-up</a>
                    </li>
                    <li>
                        <a href="{{ route('forgotpass') }}">Forgot my password</a>
                    </li>
                </ul>
            </div>
            <div class="form-w">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <h2>Log-in</h2>
                    <div>
                        <label for="email">E-mail:</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit">Log-in</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>