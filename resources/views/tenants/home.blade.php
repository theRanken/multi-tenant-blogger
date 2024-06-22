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
            <div class="tweet-card">
                <div class="d-flex align-items-start p-3">
                    <img src="https://via.placeholder.com/48" alt="John Doe">
                    <div class="ml-3">
                        <h5 class="m-0">John Doe</h5>
                        <small class="text-muted">@johndoe · 1m</small>
                    </div>
                </div>
                <div class="tweet-content">
                    <p>Just finished a great book. The War on Normal People by Andrew Yang. I highly recommend it to anyone interested in the future of work and society.</p>
                    <img src="https://via.placeholder.com/600x300" class="img-fluid rounded" alt="Book Image">
                </div>
                <div class="tweet-footer text-muted">
                    <span class="footer-icon">💬 2</span>
                    <span class="footer-icon">🔁 3</span>
                    <span class="footer-icon">❤️ 4</span>
                    <span class="footer-icon">📤</span>
                </div>
            </div>
            <div class="tweet-card">
                <div class="d-flex align-items-start p-3">
                    <img src="https://via.placeholder.com/48" alt="Jane Smith">
                    <div class="ml-3">
                        <h5 class="m-0">Jane Smith</h5>
                        <small class="text-muted">@janesmith · 5m</small>
                    </div>
                </div>
                <div class="tweet-content">
                    <p>I'm not a cat person but this is hilarious. My friend's cat got into a fight with a squirrel, and the squirrel won.</p>
                    <img src="https://via.placeholder.com/600x300" class="img-fluid rounded" alt="Squirrel Image">
                </div>
                <div class="tweet-footer text-muted">
                    <span class="footer-icon">💬 12</span>
                    <span class="footer-icon">🔁 3</span>
                    <span class="footer-icon">❤️ 3</span>
                    <span class="footer-icon">📤 15</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
