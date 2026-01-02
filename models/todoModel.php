<?php
// Class Todo berfungsi sebagai MODEL untuk mengelola data todo di database
class Todo {

    // Properti untuk menyimpan koneksi database
    private $conn;

    // Constructor untuk menerima koneksi database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method untuk mengambil seluruh data todo
    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        return mysqli_query($this->conn, $query);
    }

    // Method untuk mengambil satu data todo berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    // Method untuk mengubah data todo (judul, deskripsi, dan status)
    public function update($id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'];

        $query = "UPDATE todos 
                  SET title='$title', description='$description', status='$status' 
                  WHERE id=$id";

        return mysqli_query($this->conn, $query);
    }

    // Method khusus untuk mengubah status todo (digunakan oleh checklist)
    public function updateStatus($id, $status) {
        $query = "UPDATE todos SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }

    // Method untuk menghapus data todo berdasarkan ID
    public function delete($id) {
        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    // Method untuk menyimpan data todo baru ke database
    public function insert($data) {

    // Mengambil data dari form
    $title = $data['title'];
    $description = $data['description'];

    // Status default todo adalah 'pending'
    $status = 'pending';

    // Query untuk menyimpan data todo baru
    $query = "INSERT INTO todos (title, description, status)
              VALUES ('$title', '$description', '$status')";

    // Eksekusi query
    return mysqli_query($this->conn, $query);
}
}