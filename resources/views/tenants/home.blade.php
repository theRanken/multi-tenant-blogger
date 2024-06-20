<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive News Feed</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/panel/style.css" >
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
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="#" onclick="toggleSidebar()">Toggle Sidebar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar d-none d-lg-block">
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
  <div class="content ms-lg-250">
    <!-- Tweet Box -->
    <div class="tweet-box">
      <div class="d-flex">
        <img src="https://via.placeholder.com/50" alt="Profile" class="profile-pic">
        <div class="tweet-content w-100">
          <textarea class="form-control" rows="3" placeholder="What's happening?"></textarea>
          <button class="btn btn-primary mt-2 float-end">Tweet</button>
        </div>
      </div>
    </div>
    <!-- Tweet Feed -->
    <div class="tweet-feed">
      <!-- Single Tweet -->
      <div class="tweet d-flex">
        <img src="https://via.placeholder.com/50" alt="Profile" class="profile-pic">
        <div class="tweet-content w-100">
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
    function toggleSidebar() {
      document.querySelector('.sidebar').classList.toggle('d-none');
    }
  </script>
</body>
</html>
