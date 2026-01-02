<?php
// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi parameter ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];
$todo = new Todo($conn);

// Mengambil data todo berdasarkan ID
$result = $todo->getById($id);
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$data) {
    die("Data todo tidak ditemukan");
}

// Proses update
if (isset($_POST['submit'])) {
    $todo->update($id, $_POST);
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

<h2>Edit To-do Lists</h2>

<form method="POST">
    <label>Judul</label><br>
    <input type="text" name="title" value="<?= $data['title']; ?>" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="description" required><?= $data['description']; ?></textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : ''; ?>>
            Pending
        </option>
        <option value="Done" <?= $data['status'] == 'Done' ? 'selected' : ''; ?>>
            Done
        </option>
    </select><br><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
</form>
    <a href="index.php">Kembali</a>
</body>
</html>