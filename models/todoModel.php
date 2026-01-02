<?php
// Model Todo untuk mengelola data todo di database
class Todo {

    // Properti koneksi database
    private $conn;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua data todo
    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        return mysqli_query($this->conn, $query);
    }

    // Mengambil satu todo berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    // Menyimpan todo baru
    public function insert($data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = 'pending';

        $query = "INSERT INTO todos (title, description, status)
                  VALUES ('$title', '$description', '$status')";

        return mysqli_query($this->conn, $query);
    }

    // Mengupdate todo (edit)
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

    // Mengubah status via checklist
    public function updateStatus($id, $status) {
        $query = "UPDATE todos SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }

    // Menghapus todo
    public function delete($id) {
        $query = "DELETE FROM todos WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
}