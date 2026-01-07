# Aplikasi To-do List Berbasis Web 

## Deskripsi Singkat
Aplikasi To-do List merupakan aplikasi web sederhana yang digunakan untuk mencatat, mengelola, dan memantau daftar tugas (todo). Aplikasi ini dikembangkan sebagai project kelompok pada mata kuliah Back-End Web Development dengan tujuan melatih kemampuan mahasiswa dalam merancang dan mengimplementasikan aplikasi web khususnya pada sisi back-end menggunakan PHP native dan database MySQL.

Fungsionalitas utama aplikasi ini meliputi pembuatan, penampilan, pengeditan, dan penghapusan data todo. Pengembangan aplikasi dilakukan secara bertahap dengan pembagian tugas yang jelas antar anggota kelompok.
Fitur utama mencakup:
- Menambahkan to-do baru
- Menandai to-do sebagai selesai / pending
- Mengedit dan menghapus to-do
- Menambahkan tanggal jatuh tempo (due date)
- Penanda otomatis untuk tugas yang terlambat
- Tampilan modern dengan CSS soft color

---

## Daftar Anggota Kelompok serta Pembagian Tugas Per Anggota

1. **Komang Ari Nugraha**  
   NIM: 240030321
   GitHub: https://github.com/komangji 
   Peran: Koordinator project, inisiasi repository GitHub, penyusunan struktur project serta mengecek seluruh fungsi crud

2. **Komang Restu Tri Wardana**  
   NIM: 240030349
   GitHub: https://github.com/KomangRestuTriWardana 
   Peran: Perancangan database dan konfigurasi koneksi database, membuat styling css serta implementasi tampilan antarmuka (html dna css)

3. **Gusti Ayu Made Bintang Widya Putri**  
   NIM: 240030333
   GitHub: https://github.com/gstayubintang3722-bit
   Peran: Implementasi model, implementasi fitur update dan delete 

4. **Dewa Ayu Sameta Mahesuari**  
   NIM: 240030336  
   GitHub: https://github.com/sametamahesuari-gif
   Peran: Dokumentasi dan fitur read

---

## Lingkungan Pengembangan
Pengembangan aplikasi ini dilakukan menggunakan lingkungan sebagai berikut (tahap awal pengembangan):

- Sistem Operasi: Windows / macOS (menyesuaikan perangkat masing-masing anggota)
- Web Server: Apache (XAMPP)
- Bahasa Pemrograman: PHP Native
- Database: MySQL 
- Code Editor: Visual Studio Code
- Version Control: Git & GitHub

Lingkungan pengembangan ini digunakan pada tahap awal pengembangan dan akan disesuaikan kembali apabila diperlukan pada tahap implementasi lanjutan.

---

## Teknologi yang Digunakan

- PHP Native (Back-End)
- MySQL (Database)
- HTML, CSS (Front-End)
- Git & GitHub (Version Control)
- Apache Web Server (XAMPP)

---

## Hasil Pengembangan
Pada tahap pengembangan, aplikasi To‑Do List ini berhasil mengimplementasikan fitur CRUD (Create, Read, Update, Delete) yang dikombinasikan dengan validasi data, status tugas, dan tanggal jatuh tempo.
Aplikasi ini dirancang agar mudah digunakan, memiliki tampilan yang modern, serta logika backend yang terstruktur menggunakan konsep MVC sederhana.

Fitur utama yang telah diimplementasikan:
- Manajemen data to-do (tambah, lihat, edit, hapus)
- Status to-do (Pending / Done) dengan checklist
- Tanggal jatuh tempo (Due Date)
- Penanda tugas terlambat (warna merah)
- Tampilan UI 
- Validasi input sederhana

⚙️ Implementasi Fitur Utama
1. Tambah To‑Do (Create)
User dapat menambahkan:
- Judul
- Deskripsi
- Tanggal jatuh tempo (opsional)
- Jika tanggal jatuh tempo kosong, otomatis disimpan sebagai NULL
- Status default adalah pending

File terkait:
- create.php
- todoModel.php → method insert()

2. Menampilkan Daftar To‑Do (Read)
- Semua data to-do ditampilkan dalam bentuk tabel
- Data diurutkan berdasarkan waktu pembuatan
- Tanggal jatuh tempo yang terlambat akan berwarna merah
- Jika tidak ada due date, akan ditampilkan tanda -

File terkait:
- index.php
- todoModel.php → method getAll()

3. Update Status dengan Checklist
Checklist digunakan untuk mengubah status:
Checked → done
Unchecked → pending
Perubahan status langsung tersimpan ke database

File terkait:
- updateStatus.php
- todoModel.php → method updateStatus()

4. Edit To‑Do (Update)
User dapat mengubah:
- Judul
- Deskripsi
- Status
- Tanggal jatuh tempo
- Data yang tampil di form edit selalu sesuai dengan database terbaru

File terkait:
- edit.php
- todoModel.php → method update()

5. Hapus To‑Do (Delete)
- Data to-do dapat dihapus
- Dilengkapi konfirmasi sebelum penghapusan

File terkait:
- delete.php
- todoModel.php → method delete()

## Struktur folder
- 📁 *todo-list-backend/*
  - 📁 config/
    - 📄 database.php
   - 📁 controllers
    - 📄 todoController.php
   - 📁 database/
    - 📄 todo.php
    - 📄 todos.sql
  - 📁 models/
    - 📄 todoModel.php
- 📁 public/
   📁 css/
   - 📄 style.css
  - 📄 index.php
  - 📄 create.php
  - 📄 edit.php
  - 📄 delete.php
  - 📄 updateStatus.php
- 📄 README.md 


## Cara Instalasi & Menjalankan Aplikasi
1. Clone / Download Project
- Pindahkan folder project ke dalam direktori:
htdocs (jika menggunakan XAMPP)
Contoh:
C:\xampp\htdocs\todo-list-backend

2. Buat Database
- Buka phpMyAdmin
- Buat database, contoh:
todo_list
- Import file database.sql

3. Konfigurasi Database
Edit file config/database.php:
$conn = mysqli_connect("localhost", "root", "", "todo_list");
Pastikan:
- Username
- Password
- Nama database sesuai dengan konfigurasi lokal kalian.

4. Jalankan Aplikasi
- Aktifkan Apache & MySQL di XAMPP
- Buka browser dan akses:
http://localhost/todo-list-backend/public/index.php
