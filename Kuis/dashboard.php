<?php
session_start();
if (!isset($_SESSION['role'])) header("Location: index.php");
if ($_SESSION['role'] == 'admin') header("Location: admin/index.php");
if ($_SESSION['role'] == 'user') header("Location: user/index.php");
?>