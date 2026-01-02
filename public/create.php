<?php
require_once '../config/database.php';
require_once '../controllers/todoController.php';

$controller = new TodoController($conn);

// Proses simpan data
if (isset($_POST['submit'])) {
    $controller->store($_POST);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Todo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Tambah Data Todo</h2>

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