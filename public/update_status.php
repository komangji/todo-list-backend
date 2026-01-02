<?php
// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi parameter dari URL
if (!isset($_GET['id'], $_GET['status'])) {
    die("Parameter tidak lengkap");
}

// Menyimpan data dari URL
$id = $_GET['id'];
$status = $_GET['status'];

// Membuat objek Todo
$todo = new Todo($conn);

// Mengubah status todo berdasarkan checklist
$todo->updateStatus($id, $status);

// Redirect kembali ke halaman utama
header("Location: index.php");
exit;