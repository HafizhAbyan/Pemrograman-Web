<?php
session_start();
include '../koneksi/db.php';
if ($_SESSION['role'] != 'user') exit;
$id = $_SESSION['user_id'];
if (isset($_FILES['foto'])) {
    $filename = time() . '_' . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/$filename");
    mysqli_query($conn, "UPDATE users SET foto='$filename' WHERE id=$id");
    header("Location: index.php");
}
?>