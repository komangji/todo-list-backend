<?php
// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi parameter id dan status
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die("Parameter tidak lengkap");
}

// Ambil data dari URL
$id = $_GET['id'];
$status = $_GET['status'];

// Membuat object Todo
$todo = new Todo($conn);

// Memanggil method updateStatus untuk mengubah status todo
$todo->updateStatus($id, $status);

// Kembali ke halaman utama
header("Location: index.php");
exit;