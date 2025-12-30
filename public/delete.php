<?php
// Memanggil model Todo
include "../models/Todo.php";

// Validasi parameter ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

// Hapus data todo
Todo::delete($id);

// Kembali ke halaman utama
header("Location: index.php");
exit;
