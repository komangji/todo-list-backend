<?php
// Memanggil file model Todo
require_once '../models/todoModel.php';

// Controller bertugas sebagai penghubung antara View dan Model
class TodoController {

    // Properti untuk menyimpan objek model
    private $model;

    // Constructor untuk membuat objek model dengan koneksi database
    public function __construct($db) {
        $this->model = new Todo($db);
    }

    // Method untuk menampilkan seluruh data todo
    public function index() {
        return $this->model->getAll();
    }

    // Method untuk menyimpan data todo baru
    public function store($data) {
        return $this->model->insert($data);
    }

    // Method untuk mengambil satu data todo berdasarkan ID
    public function show($id) {
        return $this->model->getById($id);
    }

    // Method untuk memperbarui data todo
    public function update($id, $data) {
        return $this->model->update($id, $data);
    }

    // Method untuk menghapus data todo
    public function destroy($id) {
        return $this->model->delete($id);
    }
}
