<?php
require_once '../config/database.php';
require_once '../controllers/todoController.php';

$controller = new TodoController($conn);
$todos = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>

<h2>Daftar Todo</h2>

<a href="create.php">+ Tambah Todo</a>

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while ($row = mysqli_fetch_assoc($todos)) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" 
               onclick="return confirm('Yakin hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>