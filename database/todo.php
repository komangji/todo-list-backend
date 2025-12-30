<?php
// Memanggil koneksi database
include_once __DIR__ . "/../config/database.php";

class Todo {

    // Ambil satu data todo berdasarkan ID
    public static function getById($id) {
        global $conn;

        $query = "SELECT * FROM todos WHERE id = $id";
        $result = mysqli_query($conn, $query);

        return mysqli_fetch_assoc($result);
    }

    // Update data todo
    public static function update($id, $title, $description, $status) {
        global $conn;

        $query = "UPDATE todos 
                  SET title='$title',
                      description='$description',
                      status='$status'
                  WHERE id=$id";

        return mysqli_query($conn, $query);
    }

    // Hapus data todo
    public static function delete($id) {
        global $conn;

        $query = "DELETE FROM todos WHERE id = $id";
        return mysqli_query($conn, $query);
    }
}