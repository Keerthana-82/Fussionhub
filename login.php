<?php
session_start();
$justRegistered = isset($_GET['registered']) && $_GET['registered'] == 1;
?>
<?php
// Ensure no whitespace above this line
// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: register.php");
        exit();
    }

    // Check if username or email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $_SESSION['error'] = "Username or email already exists.";
        header("Location: register.php");
        exit();
    }

    // Hash password and insert new user
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($insertStmt->execute()) {
        $_SESSION['register_success'] = true;
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: register.php");
        exit();
    }
}
// Handle error message from session
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - FussionHub</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #0d0d0d;
      font-family: Arial, sans-serif;
      color: white;
    }

    .container {
      width: 400px;
      margin: 100px auto;
      padding: 40px;
      background: #1a1a1a;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(255, 165, 0, 0.3);
    }

    h2 {
      text-align: center;
      color: orange;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      background: #333;
      border: none;
      border-radius: 8px;
      color: white;
    }

    button {
      width: 100%;
      padding: 12px;
      background: orange;
      color: black;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      background: #ffa500;
    }

    .links {
      text-align: center;
      margin-top: 15px;
    }

    .links a {
      color: orange;
      text-decoration: none;
      margin: 0 5px;
    }

    .error {
      background: #ff4d4d;
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      text-align: center;
    }

    .popup {
      position: fixed;
      top: 20px;
      right: 20px;
      background: limegreen;
      color: black;
      padding: 15px 25px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(50, 205, 50, 0.7);
      font-weight: bold;
      animation: fadeIn 0.5s ease-in-out;
      z-index: 9999;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
<?php if ($justRegistered): ?>
<script>
  alert("successful! You can now log in.");
</script>
<?php endif; ?>
<div class="container">
  <h2>FussionHub Login</h2>
  <div class="navbar">
    <a href="fp.php">go back</a>

  <?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form action="login_process.php" method="POST">
    <input type="text" name="username" placeholder="Username or Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
  </form>

  <div class="links">
    <a href="register.php">Create Account</a> | 
    <a href="forgot_password.php">Forgot Password?</a>
  </div>
</div>

<?php if (isset($success) && $success): ?>
    <div class="alert alert-success">Registration successful!</div>
<?php endif; ?>

<?php if (isset($_SESSION['register_success'])): ?>
  <div class="popup" id="registerpopup">✅ Registered Successfully! You can now login.</div>
  <script>
    setTimeout(() => {
      const popup = document.getElementById("registerpopup");
      popup.style.opacity = "0";
      setTimeout(() => popup.remove(), 500);
    }, 3000);
  </script>
  <?php unset($_SESSION['register_success']); ?>
<?php endif; ?>

</body>
</html>
