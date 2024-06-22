<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MicroBlog</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('static/style.css') }}">
    <x-auth-styles />
</head>
<body>
    <div class="login-container">
        <h1>MicroBlog Enrollment</h1>
        <x-alerts />
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required @error('name') aria-invalid="true" aria-describedby="name-helper" @enderror>
            @error('name')
            <small id="name-helper">{{ $message }}</small>
            @enderror
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required @error('email') aria-invalid="true" aria-describedby="email-helper" @enderror>
            @error('email')
            <small id="email-helper">{{ $message }}</small>
            @enderror
            <label for="domain">Pick A Domain Name:</label>
            <div class="grid" style="align-items:center;">
                <span>
                    <input type="text" id="domain" name="domain" placeholder="my-website" required @error('domain') aria-invalid="true" aria-describedby="domain-helper" @enderror>
                </span>
                <span>.{{ config('tenancy.central_domains')[1] }}</span>
            </div>
            @error('domain')
                <small id="domain-helper">{{ $message }}</small>
            @enderror
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required required @error('password') aria-invalid="true" aria-describedby="password-helper" @enderror>
            @error('password')
            <small id="password-helper">{{ $message }}</small>
            @enderror
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required @error('password_confirmation') aria-invalid="true" aria-describedby="password_confirmation-helper" @enderror>
            @error('password_confirmation')
            <small id="password_confirmation-helper">{{ $message }}</small>
            @enderror
            <button type="submit" class="contrast">Create Account</button>
        </form>
        <footer>
            <p>Already a member? <a href="{{ route('login') }}">Sign In</a></p>
        </footer>
    </div>
</body>
</html>
