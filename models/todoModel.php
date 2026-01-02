<?php
class todoModel {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        return mysqli_query($this->conn, $query);
    }

    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }

    public function insert($data){
        $title = $data['title'];
        $description = $data['description'];

        $query = "INSERT INTO todos (title, description) VALUES ('$title', '$description')";

        return mysqli_query($this->conn, $query);
    }

    public function update($id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'];

        $query = "UPDATE todos SET title = '$title', desription = '$description', status = '$status' WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }
    
    public function delete($id) {
        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}   