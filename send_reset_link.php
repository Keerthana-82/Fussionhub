<?php
include 'includes/db_connection.php'; // Your MySQLi connection in $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result(); // ✅ Get result from statement
    $user = $result->fetch_assoc(); // ✅ Correct way to fetch as associative array

    if ($user) {
        // Generate reset token
        $token = bin2hex(random_bytes(50));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Store token in DB
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        // Display reset link (instead of sending email)
        $reset_link = "http://localhost/fussionhub/reset_password.php?token=" . $token;
        echo "<p>Reset link (for local testing):</p>";
        echo "<a href='$reset_link'>$reset_link</a>";
    } else {
        echo "Email not found.";
    }
}
?>
