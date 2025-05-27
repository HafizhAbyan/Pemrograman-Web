<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit;
}
include '../koneksi/db.php';

$id = $_SESSION['user_id'];

// Ambil data user
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['ganti'])) {
    $nama_file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "../uploads/";

    if (!empty($nama_file)) {
        // Hapus foto lama jika ada
        if (!empty($data['foto']) && file_exists($folder . $data['foto'])) {
            unlink($folder . $data['foto']);
        }

        // Upload foto baru
        move_uploaded_file($tmp, $folder . $nama_file);

        // Simpan ke database
        mysqli_query($conn, "UPDATE users SET foto='$nama_file' WHERE id=$id");
        header("Location: index.php");
    }
}
?>

<h2>Edit Foto Profil</h2>
<form method="POST" enctype="multipart/form-data">
    Foto saat ini: <br>
    <?php if (!empty($data['foto'])): ?>
        <img src="../uploads/<?= $data['foto'] ?>" width="150"><br>
    <?php else: ?>
        <i>Tidak ada foto</i><br>
    <?php endif; ?>
    <br>
    Pilih Foto Baru: <input type="file" name="foto" required><br><br>
    <button type="submit" name="ganti">Ganti Foto</button>
    <a href="index.php">Batal</a>
</form>
