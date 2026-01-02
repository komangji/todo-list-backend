<?php
require_once '../models/todoModel.php';

class TodoController {
    private $model;

    //membuat object model
    public function __construct($db){
        $this->model = new TodoModel($db);
    }

    //menampilkan semua data todo
    public function index(){
        return $this->model->getAll();
    }

    //menyimpan data todo baru
    public function store($data){
        return $this->model->insert($data);
    }

    //mengambil satu data todo berdasarkan ID
    public function show($id){
        return $this->model->getById($id);
    }

    //memperbarui data todo
    public function update($id, $data){
        return $this->model->update($id, $data);
    }
    
    //menghapus data todo
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}