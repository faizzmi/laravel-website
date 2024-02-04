<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faiz Azmi</title>
</head>
<body>
    <h2>Register</h2>

    <form method="POST" action="{{ route('register-user') }}">
        @if(Session::has('success'))
            <div>{{ Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
            <div>{{ Session::get('error')}}</div>
        @endif
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required autofocus>
            <span>@error('name') {{ $message }} @enderror</span>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <span>@error('email') {{ $message }} @enderror</span>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <span>@error('password') {{ $message }} @enderror</span>
        </div>

        <button type="submit">Register</button>
    </form>
    <a href="/login">Login</a>
</body>
</html>