<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // User not found — destroy session and redirect to login
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - FussionHub</title>
    <style>
        /* General body styling */
body {
    background-color: #0d0d0d;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container for the welcome box */
.dashboard-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
}

/* Welcome box styling */
.welcome-box {
    background-color: #1a1a1a;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 0 20px 5px rgba(255, 165, 0, 0.3); /* orange glow */
    text-align: center;
    max-width: 400px;
}

/* Welcome message */
.welcome-box h1 {
    color: orange;
    font-size: 28px;
    margin-bottom: 20px;
}

/* Email and member details */
.welcome-box p {
    font-size: 16px;
    margin: 10px 0;
}

/* Bold email and member since labels */
.welcome-box p strong {
    font-weight: bold;
}

/* Logout button */
.logout-button {
    background-color: orange;
    color: black;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.logout-button:hover {
    background-color: darkorange;
}

/* Site title */
h2 {
    padding-left: 20px;
    margin-top: 20px;
}

/* Navigation links */
.nav-links {
    padding-left: 20px;
}

.nav-links a {
    color: purple;
    margin-right: 10px;
    text-decoration: none;
    font-weight: bold;
}

.nav-links a:hover {
    text-decoration: underline;
}

        body {
            background: #0d0d0d;
            font-family: Arial, sans-serif;
            color: white;
            padding: 20px;
        }

        .dashboard {
            max-width: 600px;
            margin: 50px auto;
            background: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 165, 0, 0.2);
        }

        h1 {
            color: orange;
            margin-bottom: 20px;
        }

        .info p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .logout {
            margin-top: 20px;
        }

        a.logout-btn {
            padding: 10px 20px;
            background: orange;
            color: black;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        a.logout-btn:auth-buttons {
            background: #ffa500;
        }
     {
    margin: 0;
    padding: 0;
    background-color: #000; /* black background */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.navauth-buttons {
    text-align: center;
    background-color: #1a1a1a; /* dark grey for contrast */
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(255, 165, 0, 0.5);
}

.navauth-buttons h2 {
    color: #ffa500; /* orange */
    margin-bottom: 30px;
    font-size: 2em;
}

.navauth-buttons a {
    display: inline-block;
    margin: 10px;
    padding: 12px 24px;
    background-color: #ffa500; /* orange */
    color: black;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
}

.navauth-buttons a:hover {
    background-color: #ff8c00; /* darker orange on hover */
    transform: scale(1.05);
}

    </style>
</head>
<body>

<div class="dashboard">
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?>!</h1>

    <div class="info">
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Member Since:</strong> <?= date("F j, Y", strtotime($user['created_at'])) ?></p>
    </div>

    <div class="logout">
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>


    <div class="navauth-buttons">
        <h2>FussionHub</h2> 
        <a href="create_post/create-post.php" class="create-btn">📝 Create a Post</a>
        <a href="logout.php">Logout</a>
        <a href="register.php">Register</a>
         <a href="home.php">HOME</a>
    </div>

</body>
</html>
