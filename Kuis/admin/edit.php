<?php
session_start();
if ($_SESSION['role'] != 'admin') exit;
include '../koneksi/db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $update_query = "UPDATE users SET username='$username', role='$role' WHERE id=$id";

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET username='$username', password='$password', role='$role' WHERE id=$id";
    }

    mysqli_query($conn, $update_query);
    header("Location: index.php");
}
?>
<h2>Edit User</h2>
<form method="POST">
    Username: <input type="text" name="username" value="<?= $data['username'] ?>"><br>
    Password (kosongkan jika tidak diganti): <input type="password" name="password"><br>
    Role:
    <select name="role">
        <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="user" <?= $data['role'] == 'user' ? 'selected' : '' ?>>User</option>
    </select><br>
    <button type="submit" name="update">Update</button>
</form>
