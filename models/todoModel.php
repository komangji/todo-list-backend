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

    // Method untuk menyimpan data todo baru
    public function insert($data) {
        $title = $data['title'];
        $description = $data['description'];

        // Status default saat todo dibuat
        $status = 'pending';

        $query = "INSERT INTO todos (title, description, status)
                  VALUES ('$title', '$description', '$status')";

        return mysqli_query($this->conn, $query);
    }

    // Method untuk memperbarui data todo (judul, deskripsi, status)
    public function update($id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'];

        $query = "UPDATE todos
                  SET title='$title',
                      description='$description',
                      status='$status'
                  WHERE id=$id";

        return mysqli_query($this->conn, $query);
    }

    // Method khusus untuk memperbarui status todo (digunakan oleh checklist)
    public function updateStatus($id, $status) {
        $query = "UPDATE todos SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }

    // Method untuk menghapus data todo
    public function delete($id) {
        $query = "DELETE FROM todos WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
}