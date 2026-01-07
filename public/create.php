<?php

// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Membuat object Todo
$todo = new Todo($conn);

// Proses simpan data todo baru
if (isset($_POST['submit'])) {
    $todo->insert($_POST);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah To-Do</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Tambah Data To-Do</h2>
    </div>

    <form method="POST">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required></textarea>
        </div>

        <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">
            Simpan
        </button>

    </form>

    <a href="index.php" class="back-link">Kembali</a>

</div>

</body>
</html>
