<?php
$conn = mysqli_connect("localhost", "root", "", "kuis");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>