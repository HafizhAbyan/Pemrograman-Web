<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit;
}
include '../koneksi/db.php';

$id = $_SESSION['user_id'];

// Ambil nama file lama
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
$foto = $data['foto'];

if (!empty($foto) && file_exists("../uploads/" . $foto)) {
    unlink("../uploads/" . $foto);
}

// Kosongkan nilai di database
mysqli_query($conn, "UPDATE users SET foto=NULL WHERE id=$id");

header("Location: index.php");
?>
