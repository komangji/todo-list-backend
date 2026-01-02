<?php
class Todo {
    private $conn;

    // Konstruktor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil semua data todo
    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        return mysqli_query($this->conn, $query);
    }

    // Ambil data berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    // Tambah data
    public function insert($data) {
        $title = $data['title'];
        $description = $data['description'];

        $query = "INSERT INTO todos (title, description) VALUES ('$title', '$description')";
        return mysqli_query($this->conn, $query);
    }

    // Update data
    public function update($id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'];

        $query = "UPDATE todos SET title = '$title', description = '$description', status = '$status' WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }

    // Hapus data
    public function delete($id) {
        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}