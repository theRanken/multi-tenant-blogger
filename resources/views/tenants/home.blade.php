<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_tenant_sitename() }} -  Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #e1e8ed;
        }
        .tweet-card {
            background-color: #fff;
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .tweet-card img {
            border-radius: 50%;
            width: 48px;
            height: 48px;
        }
        .tweet-content {
            padding: 1rem;
        }
        .tweet-footer {
            display: flex;
            justify-content: space-between;
            padding: 0 1rem 1rem 1rem;
        }
        .footer-icon {
            font-size: 1.2rem;
        }
        .fixed-width {
            max-width: 600px;
            margin: auto;
        }
        .navbar-profile-img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">{{ get_tenant_sitename() ?? 'Home' }}</a>
            <div class="ml-auto d-flex align-items-center">
                <img src="https://via.placeholder.com/36" alt="Current User" class="navbar-profile-img">
                <button class="btn btn-primary ml-3">Tweet</button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="fixed-width">
            @forelse($posts as $post)
            <div class="tweet-card">
                <div class="d-flex align-items-start p-3">
                    <img src="{{ route('tenant.post.show', ['post' => $post->slug]) }}" alt="John Doe">
                    <div class="ml-3">
                        <h5 class="m-0">{{ $post->user->name }}</h5>
                        <small class="text-muted">{{ $post->user->email }} · {{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <div class="tweet-content">
                    <p>{{ $post->body }}</p>
                </div>
                <div class="tweet-footer text-muted">
                    <span class="footer-icon">
                        <a href="{{ route('tenant.posts.like') }}" class="n">💬 {{ $post->comments()->get()->count() }}</a>
                    </span>
                    <span class="footer-icon">
                        <a href="{{ route('tenant.posts.comments') }}" class="n">❤️ {{ $post->likes()->get()->count() }}</a>
                    </span>
                </div>
            </div>
            @empty
            <div class="tweet-card">
                <div class="container text-center py-5 px-2">
                    <h3>Posts Cannot Be Retrieved At The Moment</h3>
                    <small>Please Try Again Later</small>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
