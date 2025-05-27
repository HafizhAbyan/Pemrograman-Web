<?php
session_start();
if ($_SESSION['role'] != 'user') exit;
include '../koneksi/db.php';
$id = $_SESSION['user_id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
?>
<h2>Profil Saya</h2>
<img src="<?= $data['foto'] ? '../uploads/' . $data['foto'] : 'default.png' ?>" width="100"><br>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Pilih Foto Baru: <input type="file" name="foto"><br>
    <button type="submit" name="upload">Upload</button>
</form>
<a href="../logout.php">Logout</a>