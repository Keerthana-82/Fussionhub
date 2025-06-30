<?php
session_start();
include 'includes/db.php'; // Make sure this file connects $conn

$error = $_SESSION['error']??'';
unset($_SESSION['error']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    // If no errors, proceed to register
    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $username, $email, $hashed);
            if ($stmt->execute()) {
                $success = true;
                header("Location: login.php?registered=1");
                exit();
            } else {
                $errors[] = "Error inserting user: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "DB prepare failed: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - FussionHub</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background: #111;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: #1a1a1a;
      padding: 30px;
      border-radius: 12px;
      width: 400px;
      box-shadow: 0 0 20px rgba(255, 165, 0, 0.2);
    }
    .register-box h2 {
      color: orange;
      text-align: center;
      margin-bottom: 20px;
    }
    .register-box input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background: #333;
      color: white;
    }
    .register-box button {
      width: 100%;
      padding: 12px;
      background: orange;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
    }
    .register-box button:hover {
      background: #ff9900;
    }
    .msg {
      background: #222;
      padding: 10px;
      margin-bottom: 10px;
      border-left: 5px solid orange;
    }
    .error {
      color: #ff6666;
    }
    .success {
      color: #66ff66;
    }
    .link {
      margin-top: 15px;
      display: block;
      text-align: center;
      color: #ccc;
    }
    .link a {
      color: orange;
      text-decoration: none;
    }
  </style>
</head>
<body>
<div class="register-box">
  <h2>Create Account</h2>

  <!-- Error messages -->
  <?php if (!empty($error)): ?>
  <div class="msg error">
    ⚠️ <?= htmlspecialchars($error) ?>
  </div>
<?php endif; ?>
    
  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($username ?? '') ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? '') ?>" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
  </form>
  <!-- Success message (if ever used locally) -->
  <?php if (isset($success) && $success): ?>
    <div class="alert alert-success">Registration successful!</div>
<?php endif; ?>
  <div class="link">
    Already have an account? <a href="login.php">Login here</a>
  </div>
</div>

</body>
</html>
