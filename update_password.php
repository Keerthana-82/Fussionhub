<?php
include 'includes/db_connection.php';
 // ✅ Correct relative path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Validate token
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token=? AND token_expiry > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Update password
        $stmt = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, token_expiry=NULL WHERE id=?");
        $stmt->execute([$new_password, $user['id']]);
        echo "Password updated. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Invalid or expired token.";
    }
}
?>
