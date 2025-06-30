<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | FussionHub</title>
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

    .about-container {
      max-width: 900px;
      margin: 60px auto;
      padding: 20px;
      background-color: #1e1e1e;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255, 165, 0, 0.3);
    }

    h1 {
      text-align: center;
      color: orange;
      margin-bottom: 20px;
    }

    p {
      line-height: 1.8;
      font-size: 18px;
    }

    .highlight {
      color: orange;
      font-weight: bold;
    }

    .team-section {
      margin-top: 40px;
    }

    .team-member {
      margin-bottom: 20px;
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
    <a href="contact.php">Contact</a>
  </div>

  <!-- About Section -->
  <div class="about-container">
    <h1>About FussionHub</h1>
    <p>
      Welcome to <span class="highlight">FussionHub</span> — your go-to platform for sharing stories, thoughts, and creativity. 
      Whether you’re passionate about <span class="highlight">technology, travel, food, lifestyle</span>, or simply want to express yourself, FussionHub offers you a place to be heard and inspired.
    </p>

    <p>
      We believe in the power of <span class="highlight">community and storytelling</span>. Our goal is to empower creators and readers alike by providing a sleek, user-friendly experience, real-time publishing tools, and a rich discovery engine for content you care about.
    </p>

    <p>
      From short videos to long-form blogs, FussionHub helps you reach the world — one post at a time.
    </p>

    <div class="team-section">
      <h2 style="color: orange;">Meet the Team</h2>
      <div class="team-member">
        <strong>👨‍💻 Founder:</strong>Harini – Web developer & content enthusiast.
      </div>
      <div class="team-member">
        <strong>🎨 UI/UX Lead:</strong> keerthana – Passionate about intuitive, clean design.
      </div>
      <div class="team-member">
        <strong>📢 Community Manager:</strong> Aditya Rao – Making sure every voice gets heard.
      </div>
    </div>
  </div>

  <footer>
    &copy; <?= date('Y') ?> FussionHub. All rights reserved.
  </footer>

</body>
</html>
