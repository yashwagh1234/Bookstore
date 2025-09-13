<?php
$host = "localhost";
$user = "root"; // default XAMPP user
$pass = ""; // default XAMPP password is empty
$dbname = "bookstore"; // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
