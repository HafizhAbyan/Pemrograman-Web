<?php session_start(); if (isset($_SESSION['username'])) header("Location: dashboard.php"); ?>
<h2>Login</h2>
<form method="POST" action="login.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
    <br>Belum punya akun? <a href="register.php">Daftar di sini</a><br>


</form>