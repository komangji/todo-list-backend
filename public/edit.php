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

// Membuat object Todo
$todo = new Todo($conn);

// Mengambil data todo berdasarkan ID
$result = $todo->getById($id);
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$data) {
    die("Data todo tidak ditemukan");
}

// Proses update ketika form disubmit
if (isset($_POST['submit'])) {

    $updateData = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'status' => $_POST['status']
    ];

    // Memanggil method update melalui object
    $todo->update($id, $updateData);

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
    <input type="text" name="title" value="<?= $data['title']; ?>" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="description" required><?= $data['description']; ?></textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $data['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="done" <?= $data['status'] == 'done' ? 'selected' : '' ?>>Selesai</option>
    </select><br><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
</form>

</body>
</html>