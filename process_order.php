<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $details = htmlspecialchars($_POST['details']);

    $query = "INSERT INTO orders (name, email, service, details) VALUES ('$name', '$email', '$service', '$details')";
    
    if (mysqli_query($conn, $query)) {
        echo "Pesanan berhasil diajukan!";
    } else {
        echo "Gagal mengajukan pesanan: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
