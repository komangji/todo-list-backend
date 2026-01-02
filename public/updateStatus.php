<?php
// Memanggil file koneksi database
require_once '../config/database.php';

// Memanggil controller Todo
require_once '../controllers/todoController.php';

// Validasi parameter id dan status
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die("Parameter tidak lengkap");
}

// Menyimpan parameter ke variabel
$id = $_GET['id'];
$status = $_GET['status'];

// Membuat object controller
$controller = new TodoController($conn);

// Memanggil method updateStatus untuk mengubah status todo
$controller->updateStatus($id, $status);

// Redirect kembali ke halaman utama
header("Location: index.php");
exit;