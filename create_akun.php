<?php
include 'db.php';

$username = 'admin';
$password = 'admin123'; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO admins (username, password) VALUES ('$username', '$hashed_password')";

if (mysqli_query($conn, $query)) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
