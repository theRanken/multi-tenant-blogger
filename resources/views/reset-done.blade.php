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
        <h1>Check Your Inbox</h1>
        <div class="text-white">
            <p>We've Sent The Password Reset Instructions to {{ $email }}</p>
            <a href="{{ route('central.home') }}">Go Back Home</a>
        </div>
    </div>
</body>
</html>