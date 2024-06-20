<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microblogging Platform</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="{{ asset('static/style.css') }}">
</head>
<body>
    <header class="container">
        <nav>
            <ul>
                <li><strong>MicroBlogger</strong></li>
            </ul>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="container">
        <article>
            <header class="hero">
                <h1 class="text-white">Welcome to MicroBlog</h1>
                <p>Your freeway to own your very own social media platform.</p>
                <button onclick="window.location.href=`{{ route('central.login') }}`" class="contrast" style="margin-top:5em;">Get Started</button>
            </header>
        </article>
    </section>

    <section id="features" class="container">
        <article>
            <header>
                <h2 class="text-white">Features</h2>
            </header>
            <ul>
                <li>Easy-to-use editor for creating posts</li>
                <li>Upload and manage media files</li>
                <li>Customizable themes and layouts</li>
                <li>SEO tools to boost your visibility</li>
                <li>Analytics to track your audience</li>
            </ul>
        </article>
    </section>

    <section id="about" class="container">
        <article>
            <header>
                <h2 class="text-white">About Us</h2>
            </header>
            <p>MicroBlog is a platform designed for microblogging enthusiasts. Whether you are a writer, a photographer, or just someone who loves to share, MicroBlog provides the tools you need for connecting audiences.</p>
        </article>
    </section>

    <section id="contact" class="container">
        <article>
            <header>
                <h2 class="text-white">Contact Us</h2>
            </header>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit">Send</button>
            </form>
        </article>
    </section>

    <footer class="container">
        <p>&copy; 2024 MicroBlog. All rights reserved.</p>
    </footer>
</body>
</html>
