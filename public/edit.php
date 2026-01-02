<?php
require_once '../config/database.php';
<<<<<<< HEAD
require_once '../models/todoModel.php';

=======
// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi parameter ID
>>>>>>> 105c1e842d8443a03a891c287fff5fb527b38f32
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];
$todoModel = new Todo($conn);

// ambil data berdasarkan id
$result = $todoModel->getById($id);
$data = mysqli_fetch_assoc($result);

// proses update data
if (isset($_POST['submit'])) {
    $todoModel->update($id, $_POST);
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
        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>
            Pending
        </option>
        <option value="Done" <?= $data['status'] == 'Done' ? 'selected' : '' ?>>
            Selesai
        </option>
    </select><br><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
</form>

</body>
</html>