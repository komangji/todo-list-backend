<?php
// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Membuat object Todo
$todo = new Todo($conn);

// Proses simpan data todo baru
if (isset($_POST['submit'])) {
    $todo->insert($_POST);   // ← FIX DI SINI
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah To-Do</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Tambah Data To-Do</h2>

<form method="POST">
    <label>Judul</label>
    <input type="text" name="title" required>

    <label>Deskripsi</label>
    <textarea name="description" required></textarea>

    <button type="submit" name="submit">Simpan</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>