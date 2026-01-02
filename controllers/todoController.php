<?php
// Memanggil file model Todo
require_once '../models/todoModel.php';

// Class TodoController berfungsi sebagai CONTROLLER
// untuk menghubungkan model dengan tampilan (view)
class TodoController {

    // Properti untuk menyimpan object model
    private $model;

    // Constructor menerima koneksi database
    public function __construct($db) {
        $this->model = new Todo($db);
    }

    // Menampilkan seluruh data todo
    public function index() {
        return $this->model->getAll();
    }

    // Menyimpan data todo baru
    public function store($data) {
        return $this->model->insert($data);
    }

    // Mengambil satu data todo berdasarkan ID
    public function show($id) {
        return $this->model->getById($id);
    }

    // Memperbarui data todo
    public function update($id, $data) {
        return $this->model->update($id, $data);
    }

    // Memperbarui status todo (checklist)
    public function updateStatus($id, $status) {
        return $this->model->updateStatus($id, $status);
    }

    // Menghapus data todo
    public function destroy($id) {
        return $this->model->delete($id);
    }
}