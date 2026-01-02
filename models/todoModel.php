<?php
// Class Todo berfungsi sebagai MODEL untuk mengelola data todo di database
class Todo {

    // Menyimpan koneksi database
    private $conn;

    // Constructor menerima koneksi database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua data todo
    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        return mysqli_query($this->conn, $query);
    }

    // Mengambil satu data todo berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    // Menyimpan todo baru (default status = pending)
    public function insert($data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = 'pending';

        $query = "INSERT INTO todos (title, description, status)
                  VALUES ('$title', '$description', '$status')";
        return mysqli_query($this->conn, $query);
    }

    // Mengedit todo (judul, deskripsi, status)
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

    // Method checklist
    public function updateStatus($id, $status) {
        $query = "UPDATE todos SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
    // method delete
     public function delete($id) {
        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}