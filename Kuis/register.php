<?php
include('koneksi/db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan'); window.location='register.php';</script>";
        exit;
    }

    // Simpan akun baru dengan role 'user'
    mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')");
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='index.php';</script>";
}
?>

<h2>Form Registrasi</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
    <a href="index.php">Kembali ke Login</a>
</form>
