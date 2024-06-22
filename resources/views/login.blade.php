<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MicroBlog</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('static/style.css') }}">
    <x-auth-styles />
</head>
<body>
    <div class="login-container">
        <h1>Login to MicroBlog</h1>
        <x-alerts />
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required @error('email') aria-invalid="true" aria-describedby="email-helper" @enderror>
            @error('email')
            <small id="email-helper">{{ $message }}</small>
            @enderror
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required required @error('password') aria-invalid="true" aria-describedby="password-helper" @enderror>
            @error('password')
            <small id="password-helper">{{ $message }}</small>
            @enderror
            
            <button type="submit" class="contrast">Login</button>
        </form>
        <footer>
            <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
            <a href="{{ route('reset') }}">Recover Password</a>
        </footer>
    </div>
</body>
</html>
