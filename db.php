<?php
$host = 'localhost';
$db = 'fussionhub';
$user = 'root';
$pass = ''; // Change if your MySQL has a password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>