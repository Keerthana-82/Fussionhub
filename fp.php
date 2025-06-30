<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FussionHub - Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* --- your existing styles remain unchanged --- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #0d0d0d;
      color: #fff;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 50px;
      background-color: #1a1a1a;
      box-shadow: 0 2px 10px rgba(255, 165, 0, 0.2);
    }

    .logo img {
      width: 100px; /* Adjust the size as needed */
      height: auto;
      img src="/images/logo.jpg" alt="FussionHub" class="logo" />

    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: orange;
    }

    .auth-buttons {
      margin-left: auto;
      display: flex;
      gap: 15px;
      align-items: center;
      position: relative;
    }

    .auth-buttons a,
    .dropdown-btn {
      padding: 10px 20px;
      background: orange;
      color: black;
      border-radius: 8px;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
      cursor: pointer;
    }

    .auth-buttons a:hover,
    .dropdown-btn:hover {
      background: #ff9900;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      background-color: #1a1a1a;
      box-shadow: 0 0 10px rgba(255, 165, 0, 0.3);
      z-index: 999;
      min-width: 150px;
      border-radius: 10px;
    }

    .dropdown-content a {
      display: block;
      padding: 10px 20px;
      color: orange;
      text-decoration: none;
      transition: 0.3s;
    }

    .dropdown-content a:hover {
      background-color: #333;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .hero {
      padding: 100px 20px;
      text-align: center;
    }

    .hero h1 {
      font-size: 48px;
      color: orange;
      margin-bottom: 20px;
    }

    .hero span {
      color: white;
    }

    .hero p {
      font-size: 20px;
      margin-bottom: 30px;
      color: #ccc;
    }

    .hero button {
      padding: 15px 30px;
      font-size: 16px;
      background: orange;
      border: none;
      border-radius: 10px;
      color: black;
      cursor: pointer;
      transition: 0.3s;
    }

    .hero button:hover {
      background: #ff8c00;
    }

    .car-img {
      max-width: 600px;
      width: 90%;
      margin: 20px auto;
      display: block;
    }

    /* Dashboard popup styles */
    .dashboard-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      z-index: 1000;
      animation: fadeIn 0.5s ease;
    }

    .dashboard-panel {
      background: #1a1a1a;
      color: orange;
      width: 80%;
      height: 80%;
      margin: 50px auto;
      padding: 30px;
      border-radius: 15px;
      overflow-y: auto;
      box-shadow: 0 0 20px orange;
      position: relative;
      animation: slideUp 0.6s ease;
    }

    .dashboard-panel h2 {
      text-align: center;
      margin-bottom: 30px;
      color: orange;
    }

    .close-dashboard {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 30px;
      cursor: pointer;
      color: #fff;
    }

    .stat-grid {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .stat-card {
      background: #262626;
      padding: 20px;
      border-radius: 10px;
      flex: 1;
      min-width: 200px;
      text-align: center;
      box-shadow: 0 0 10px orange;
      transition: transform 0.3s;
    }

    .stat-card:hover {
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes slideUp {
      from {transform: translateY(100px); opacity: 0;}
      to {transform: translateY(0); opacity: 1;}
    }
  </style>
</head>
<body>

  <!-- Navbar -->
<header class="navbar">
  <div class="logo">
    <img src="images/logo.jpg" alt="FussionHub">
  </div>

  <div class="auth-buttons">
    <a href="login.php">Login</a>
    <a href="register.php">Sign Up</a>  
  </div>
    </section>
</section>
</div>
</header>
<!-- Hero Section -->
  <section class="hero">
    
    <h1>Welcome to <span>FussionHub</span></h1>
    <p>Unleash stories across tech, travel, lifestyle, and more.</p>
    <button onclick="window.location.href='home.php'">Explore Now</button>
  </section>

  <!-- Dashboard Popup -->
  <div class="dashboard-overlay" id="dashboardOverlay">
    <div class="dashboard-panel">
      <span class="close-dashboard" id="closeDashboard">&times;</span>
      <h2>Dashboard Panel</h2>
      <div class="stat-grid">
        <div class="stat-card">
          <h3>Users</h3>
          <p>123</p>
        </div>
        <div class="stat-card">
          <h3>Posts</h3>
          <p>456</p>
        </div>
        <div class="stat-card">
          <h3>Comments</h3>
          <p>789</p>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    document.getElementById('openDashboard').addEventListener('click', () => {
      document.getElementById('dashboardOverlay').style.display = 'block';
    });

    document.getElementById('closeDashboard').addEventListener('click', () => {
      document.getElementById('dashboardOverlay').style.display = 'none';
    });
  </script>

</body>
</html>
