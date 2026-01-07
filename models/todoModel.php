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
        $due_date = $data['due_date']; // tanggal jatuh tempo
        $status = 'pending';

        $query = "INSERT INTO todos (title, description, due_date, status)
                    VALUES ('$title', '$description', " .
                    ($due_date ? "'$due_date'" : "NULL") . ",
                    'pending')";

        return mysqli_query($this->conn, $query);
    }

    // Mengedit todo (judul, deskripsi, status)
    public function update($id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $due_date = $data['due_date'];
        $status = $data['status'];

        $query = "UPDATE todos
                  SET title='$title',
                      description='$description',
                      due_date='$due_date',
                      status='$status'
                  WHERE id=$id";

        return mysqli_query($this->conn, $query);
    }

    // Method Checklist
     public function updateStatus($id, $status) {
        $query = "UPDATE todos SET status='$status' WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
    // Method Delete
     public function delete($id) {
        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}