<?php
session_start();
if ($_SESSION['role'] != 'admin') exit;
include '../koneksi/db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location: index.php");
?>
