<?php
session_start();
if ($_SESSION['role'] != 'admin') exit;
include '../koneksi/db.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<h2>Data Akun User</h2>
<a href="tambah.php">Tambah User</a> | <a href="../logout.php">Logout</a><br><br>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Role</th><th>Aksi</th></tr>
<?php while ($u = mysqli_fetch_assoc($result)): ?>
<tr>
<td><?= $u['id'] ?></td><td><?= $u['username'] ?></td><td><?= $u['role'] ?></td>
<td>
    <a href="edit.php?id=<?= $u['id'] ?>">Edit</a> |
    <a href="hapus.php?id=<?= $u['id'] ?>" onclick="return confirm('Hapus user?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>