<?php

// Memanggil koneksi database
require_once '../config/database.php';
// Memanggil model Todo
include "../models/todoModel.php";

// Validasi parameter ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

// Ambil data todo berdasarkan ID
$todo = new Todo($conn);

// Panggil method via object
$result = $todo->getById($id);
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$todo) {
    die("Data todo tidak ditemukan");
}

// Proses update ketika form disubmit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Update data todo
    Todo::update($id, $title, $description, $status);

    // Redirect ke halaman utama
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Todo</title>
</head>
<body>

<h2>Edit Todo</h2>

<form method="POST">
    <label>Judul</label><br>
    <input type="text" name="title" value="<?= $todo['title']; ?>" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="description" required><?= $todo['description']; ?></textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="done" <?= $todo['status'] == 'done' ? 'selected' : '' ?>>Selesai</option>
    </select><br><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
</form>

</body>
</html>