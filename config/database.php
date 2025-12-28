<?php
// Konfigurasi host database 
$host = "localhost";

// Username database 
$user = "root";

// Password database 
$pass = "";

// Nama database yang digunakan
$db   = "toDoList_db";

// Membuat koneksi ke database MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi database gagal");
}