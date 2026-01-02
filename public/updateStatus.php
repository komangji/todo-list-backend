<?php
// Memanggil koneksi database
require_once '../config/database.php';

// Memanggil model Todo
require_once '../models/todoModel.php';

// Validasi parameter id dan status
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die("Parameter tidak lengkap");
}
$todo = new Todo($conn);
$todo->updateStatus($_GET['id'], $_GET['status']);

header("Location: index.php");
exit;