<?php
$conn = new mysqli("localhost", "root", "", "fussionhub");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$tags = $_POST['tags'];

// Handle thumbnail upload
$thumbnailPath = "";
if ($_FILES['thumbnail']['name']) {
    $thumbnailPath = "uploads/" . basename($_FILES['thumbnail']['name']);
    move_uploads_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
}

$sql = "INSERT INTO posts (title, content, tags, thumbnail) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $content, $tags, $thumbnailPath);

if ($stmt->execute()) {
    header("Location: home.php"); // Redirect to homepage
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>