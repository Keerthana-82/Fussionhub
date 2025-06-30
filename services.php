<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Services | FussionHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-color: #0d0d0d;
      color: #f0f0f0;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background: #1a1a1a;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar a {
      color: orange;
      text-decoration: none;
      font-weight: bold;
      margin-left: 20px;
    }

    .services-container {
      max-width: 1000px;
      margin: 60px auto;
      padding: 30px;
      background-color: #1e1e1e;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255, 165, 0, 0.3);
    }

    h1 {
      text-align: center;
      color: orange;
      margin-bottom: 30px;
    }

    .service-box {
      background-color: #262626;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(255, 165, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .service-box:hover {
      transform: scale(1.02);
    }

    .service-box h3 {
      color: orange;
      margin-bottom: 10px;
    }

    .service-box p {
      font-size: 16px;
      line-height: 1.6;
    }

    footer {
      margin-top: 60px;
      text-align: center;
      color: #999;
      font-size: 14px;
      padding-bottom: 30px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <a href="home.php">🏠 Home</a>
    <a href="about.php">About</a>
    <a href="services.php">Services</a>
    <a href="contact.php">Contact</a>
  </div>

  <!-- Services Section -->
  <div class="services-container">
    <h1>Our Services</h1>

    <div class="service-box">
      <h3>📝 Blog Publishing</h3>
      <p>Write, edit, and publish blog posts on a wide range of topics like tech, lifestyle, travel, and more using our easy-to-use editor.</p>
    </div>

    <div class="service-box">
      <h3>🎬 Short Video Uploads</h3>
      <p>Share your stories visually! Upload short videos and engage with your audience through our dedicated "Reels" section.</p>
    </div>

    <div class="service-box">
      <h3>👥 Community Engagement</h3>
      <p>Like, comment, and follow other creators. FussionHub fosters a vibrant community where ideas and discussions thrive.</p>
    </div>

    <div class="service-box">
      <h3>📊 Dashboard & Analytics</h3>
      <p>Track your blog performance, viewer insights, and post reach in real-time through a personalized user dashboard.</p>
    </div>

    <div class="service-box">
      <h3>📌 Location-based Posts</h3>
      <p>Add geolocation to your posts to let readers discover stories from specific cities, events, or hidden gems around the world.</p>
    </div>

    <div class="service-box">
      <h3>📚 Categories & Tags</h3>
      <p>Organize your content with categories and hashtags, making it easy for users to search and explore related topics.</p>
    </div>

  </div>

  <footer>
    &copy; <?= date('Y') ?> FussionHub. All rights reserved.
  </footer>

</body>
</html>
