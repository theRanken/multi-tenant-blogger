
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Feed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: #1DA1F2;
    }
    .navbar-brand, .navbar-nav .nav-link {
      color: white;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 100;
      background-color: #f5f8fa;
      padding-top: 1rem;
    }
    .sidebar a {
      color: black;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
    }
    .sidebar a:hover {
      background-color: #e1e8ed;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }
    .tweet-box {
      background-color: #ffffff;
      border: 1px solid #e1e8ed;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
    }
    .tweet {
      background-color: #ffffff;
      border: 1px solid #e1e8ed;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 10px;
    }
    .tweet .profile-pic {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .tweet .tweet-content {
      flex: 1;
    }
    .dark-mode {
      background-color: #15202B;
      color: #e1e8ed;
    }
    .dark-mode .sidebar, .dark-mode .tweet-box, .dark-mode .tweet {
      background-color: #192734;
      border-color: #1c2938;
    }
    .dark-mode .navbar {
      background-color: #22303C;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Twitter Clone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="toggleDarkMode()">Dark Mode</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar d-none d-md-block">
    <a href="#">Home</a>
    <a href="#">Explore</a>
    <a href="#">Notifications</a>
    <a href="#">Messages</a>
    <a href="#">Bookmarks</a>
    <a href="#">Lists</a>
    <a href="#">Profile</a>
    <a href="#">More</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Tweet Box -->
    <div class="tweet-box">
      <div class="d-flex">
        <img src="https://via.placeholder.com/50" alt="Profile" class="profile-pic">
        <div class="tweet-content">
          <textarea class="form-control" rows="3" placeholder="What's happening?"></textarea>
          <button class="btn btn-primary mt-2">Tweet</button>
        </div>
      </div>
    </div>
    <!-- Tweet Feed -->
    <div class="tweet-feed">
      <!-- Single Tweet -->
      <div class="tweet d-flex">
        <img src="https://via.placeholder.com/50" alt="Profile" class="profile-pic">
        <div class="tweet-content">
          <h5>@username</h5>
          <p>This is an example tweet.</p>
        </div>
      </div>
      <!-- Add more tweets here -->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }
  </script>
</body>
</html>
