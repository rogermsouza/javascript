<?php

require_once 'config/Database.php';

// Criar instância da conexão
$db = (new Database())->getConnection();

// Passar conexão para o model
$empresaModel = new EmpresaModel($db);



// === Arquivo: controllers/EmpresaController.php ===
// Controlador responsável pelas ações da entidade 'empresa'

require_once 'models/EmpresaModel.php';

class EmpresaController {
    private $model;

    public function __construct($db) {
        $this->model = new EmpresaModel($db);
    }

    // Lista todas as empresas
    public function index() {
        $empresas = $this->model->getEmpresasComSetores();
        require 'views/empresa/index.php';
    }



    // Exibe o formulário de criação
    public function create() {
        require_once 'models/SetorModel.php';
        
        // Acesso à conexão do banco via EmpresaModel
        $setorModel = new SetorModel($this->model->getConnection()); // ← esta é a linha

        // Busca todos os setores para mostrar no formulário
        $setores = $setorModel->getAll();

        // Exibe o formulário de criação
        require 'views/empresa/create.php';
    }


    // Salva uma nova empresa no banco
    public function store() {
        $this->model->create(
            $_POST['razao_social'],
            $_POST['nome_fantasia'],
            $_POST['cnpj'],
            $_POST['setores'] ?? []
    );
    header("Location: " . BASE_URL . "/empresa");
    exit;

    }

    // Exibe o formulário de edição
    public function edit($id) {
        $empresa = $this->model->getById($id);
        $empresaSetores = $this->model->getSetoresByEmpresaId($id); // ids dos setores vinculados

        $setorModel = new SetorModel($this->model->conn);
        $setores = $setorModel->getAll();

        require 'views/empresa/edit.php';
    }



    // Atualiza os dados da empresa
    public function update($id) {
        $this->model->update(
            $id,
            $_POST['razao_social'],
            $_POST['nome_fantasia'],
            $_POST['cnpj'],
            $_POST['setores'] ?? []
        );
        header("Location: " . BASE_URL . "/empresa");
        exit;
    }


    // Remove uma empresa
    public function delete($id) {
        $this->model->delete($id);
        header("Location: " . BASE_URL . "/empresa");
        exit;
    }

    public function search(){
        $term = $_GET['term'] ?? '';
        $setor_id = $_GET['setor_id'] ?? '';

        $empresas = $this->model->search($term, $setor_id);
        $setorModel = new SetorModel($this->model->getConnection());
        $setores = $setorModel->getAll();

        // Garante que sempre teremos um array
        if (!is_array($empresas)) {
            $empresas = [];
    }

    require_once __DIR__ . '/../views/empresa/search.php';
}

}
