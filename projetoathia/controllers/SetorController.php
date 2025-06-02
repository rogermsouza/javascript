<?php
// controllers/SetorController.php

require_once 'models/SetorModel.php';

class SetorController {
    private $model;

    public function __construct($db) {
        $this->model = new SetorModel($db);
    }

    public function index() {
        $setores = $this->model->getAll();
        require 'views/setor/index.php';
    }

    public function create() {
        require 'views/setor/create.php';
    }

    public function store() {
        $descricao = $_POST['descricao'];
        $pai = $_POST['setor_pai_id'] ?? null;
        $this->model->create($descricao, $pai);
        header("Location: " . BASE_URL . "/setor");
    }

    public function edit($id) {
        $setor = $this->model->getById($id);
        require 'views/setor/edit.php';
    }

    public function update($id) {
        $descricao = $_POST['descricao'];
        $pai = $_POST['setor_pai_id'] ?? null;
        $this->model->update($id, $descricao, $pai);
        header("Location: " . BASE_URL . "/setor");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: " . BASE_URL . "/setor");
    }
}
