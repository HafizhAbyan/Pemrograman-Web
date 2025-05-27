<?php
session_start();
if ($_SESSION['role'] != 'admin') exit;
include '../koneksi/db.php';
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    header("Location: index.php");
}
?>
<h2>Tambah User</h2>
<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Role: <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <button type="submit" name="simpan">Simpan</button>
</form>