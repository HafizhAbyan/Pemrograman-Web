<?php
session_start();
include 'koneksi/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: admin/index.php");
    } else {
        header("Location: user/index.php");
    }
} else {
    echo "<script>alert('Login gagal'); window.location='index.php';</script>";
}
?>