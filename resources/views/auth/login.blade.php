<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
</head>
<body>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="title-input">Username</label>
        <input type="text" id="title-input" name="username" value="{{ old('username') }}">
        @error('username')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="password-input">Password</label>
        <input type="password" id="password-input" name="password" value="{{ old('password') }}">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="remember-input">Remember me</label>
        <input type="checkbox" id="remember-input" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
    </div>
    <div><input type="submit" value="Login"></div>
</form>

</body>
</html>
