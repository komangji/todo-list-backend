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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Edit To-Do</h2>

    <form method="POST" class="form-card">

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="<?= $data['title']; ?>" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required><?= $data['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label>Tanggal Jatuh Tempo</label><br>
            <input type="date" name="due_date" value="<?= $data['due_date']; ?>"><br><br>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : ''; ?>>
                    Pending
                </option>
                <option value="Done" <?= $data['status'] == 'Done' ? 'selected' : ''; ?>>
                    Done
                </option>
            </select>
        </div>

        <div class="form-action">
            <button type="submit" name="submit" class="btn-primary">
                Simpan Perubahan
            </button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </div>

    </form>

</div>

</body>
</html>
