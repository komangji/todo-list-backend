<?php
// memanggil model Todo
require_once '../models/todoModel.php';
// koneksi database
require_once '../config/database.php';

// Validasi parameter ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

// Membuat object Todo
$todo = new Todo($conn);

// Menghapus data berdasarkan id
$id = $_GET['id'];
$todo->delete($id);

// Redirect kembali ke halaman utama
header("Location: index.php");
exit;
