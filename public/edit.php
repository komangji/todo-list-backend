<?php
// Memanggil model Todo
include "../models/Todo.php";

// Validasi parameter ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

// Ambil data todo berdasarkan ID
$todo = Todo::getById($id);

// Jika data tidak ditemukan
if (!$todo) {
    die("Data todo tidak ditemukan");
}

// Proses update ketika form disubmit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Update data todo
    Todo::update($id, $title, $description, $status);

    // Redirect ke halaman utama
    header("Location: index.php");
    exit;
}
?>
