<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "bookstore");
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'];

// Validate password match
if ($password !== $confirm_password) {
    echo "<script>alert('❌ Passwords do not match'); window.history.back();</script>";
    exit;
}

// Handle profile picture upload
$profilePicName = $_FILES['profile_pic']['name'];
$profilePicTmp = $_FILES['profile_pic']['tmp_name'];
$targetDir = "uploads/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // create uploads folder if not exists
}

$targetPath = $targetDir . basename($profilePicName);
move_uploaded_file($profilePicTmp, $targetPath);

// Insert into database
$sql = "INSERT INTO users (fullname, email, username, password, gender, profile_pic) 
        VALUES ('$fullname', '$email', '$username', '$password', '$gender', '$targetPath')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('✅ Registration successful! Please login.'); window.location.href='login.html';</script>";
} else {
    echo "<script>alert('❌ Error: " . $conn->error . "'); window.history.back();</script>";
}

$conn->close();
?>
