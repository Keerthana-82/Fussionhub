<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | FussionHub</title>
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

    .contact-container {
      max-width: 800px;
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

    .contact-info {
      font-size: 18px;
      line-height: 1.7;
    }

    .contact-info i {
      color: orange;
      margin-right: 10px;
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

  <!-- Contact Section -->
  <div class="contact-container">
    <h1>Contact Us</h1>
    <div class="contact-info">
      <p><i>📧</i>Email: <a href="mailto:fussionhub716@gmail.com" style="color: orange;">fussionhub716@gmail.com</a></p>
      <p><i>📞</i>Phone: <a href="tel:+91 76769 91532" style="color: orange;">+91 76769 91532</a></p>
      <p><i>📍</i>Address: 101, Innovation Hub, Bengaluru, India</p>
      <p><i>⏰</i>Support Hours: Monday – Friday, 9:00 AM to 6:00 PM </p>
    </div>
  </div>

  <footer>
    &copy; <?= date('Y') ?> FussionHub. All rights reserved.
  </footer>

</body>
</html>
