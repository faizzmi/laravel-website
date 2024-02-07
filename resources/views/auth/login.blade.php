<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faiz Azmi</title>
</head>
<body>
    <h2>Login</h2>

    <form method="POST" action="{{ route('login-user') }}">
        @if(Session::has('success'))
            <div>{{ Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div>{{ Session::get('error')}}</div>
        @endif
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Login</button>
    </form>
    <a href="/registration">Register</a>
    <a href="/">Back</a>
</body>
</html>