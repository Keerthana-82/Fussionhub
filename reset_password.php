<!-- reset_password.php -->
<?php
$token = $_GET['token'];
?>
<link rel="stylesheet" href="style[1].css"> 
<form action="update_password.php" method="POST">
    <h2>Reset Password</h2>
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    <input type="password" name="new_password" placeholder="New Password" required><br>
    <button type="submit">Update Password</button>
</form>
