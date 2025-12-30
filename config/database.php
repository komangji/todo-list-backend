<?php
//Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "todolist_db";

//Membuat Koneksi Database
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}