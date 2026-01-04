<?php
// Memanggil file koneksi database
require_once '../config/database.php';

// Memanggil file model Todo
require_once '../models/todoModel.php';

// Membuat objek Todo dan mengirimkan koneksi database
$todo = new Todo($conn);

// Memanggil method getAll() untuk mengambil seluruh data todo
$result = $todo->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
            <!-- Judul halaman -->
    <div class="header">
        <h1>Daftar To-Do</h1>

        <!-- Tombol untuk menuju halaman tambah todo -->
        <a href="create.php" class="btn btn-primary">+ Tambah Todo</a>
    </div>

    <table>
        <thead>

                <!-- Header tabel -->
            <tr>
                <th>Selesai</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
    <!--Melakukan perulangan untuk menampilkan setiap data todo-->
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>

                <!-- Kolom checklist untuk mengubah status todo -->
                <td align="center">
                    <input type="checkbox"
                        onchange="window.location='updateStatus.php?id=<?= $row['id']; ?>&status=<?= $row['status'] == 'done' ? 'pending' : 'done'; ?>'"
                        <?= $row['status'] == 'done' ? 'checked' : ''; ?>>
                </td>

                <!-- Menampilkan judul todo -->
                <td><?= $row['title']; ?></td>
                <!-- Menampilkan deskripsi todo -->
                <td><?= $row['description']; ?></td>
                 <!-- Menampilkan status todo -->
                <td class="status <?= $row['status']; ?>">
                    <?= $row['status']; ?>
                </td>


                <!-- Tombol aksi edit dan hapus -->
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn-success">Edit</a> |
                    <a href="delete.php?id=<?= $row['id']; ?>" 
                       class="btn-danger"
                       onclick="return confirm('Yakin hapus?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>

</body>
</html>
