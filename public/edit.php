<?php
// Memanggil file koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi apakah parameter id tersedia
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

// Menyimpan id dari URL
$id = $_GET['id'];

// Membuat objek Todo
$todoModel = new Todo($conn);

// Mengambil data todo berdasarkan id
$result = $todoModel->getById($id);
$data = mysqli_fetch_assoc($result);

// Jika tombol submit ditekan, lakukan proses update
if (isset($_POST['submit'])) {
    // Memanggil method update pada model
    $todoModel->update($id, $_POST);

    // Redirect kembali ke halaman utama
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

<!-- Form untuk mengubah data todo -->
<form method="POST">
    
    <!-- Input judul todo -->
    <label>Judul</label><br>
    <input type="text" name="title" value="<?= $data['title']; ?>" required><br><br>

    <!-- Input deskripsi todo -->
    <label>Deskripsi</label><br>
    <textarea name="description" required><?= $data['description']; ?></textarea><br><br>

    <!-- Dropdown untuk mengubah status todo -->
    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $data['status']=='pending'?'selected':''; ?>>Pending</option>
        <option value="done" <?= $data['status']=='done'?'selected':''; ?>>Selesai</option>
    </select><br><br>

    <!-- Tombol simpan perubahan -->
    <button type="submit" name="submit">Simpan Perubahan</button>
</form>

</body>
</html>
