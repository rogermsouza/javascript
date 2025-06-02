<?php
// models/SetorModel.php

class SetorModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar setor
    public function create($descricao, $setor_pai_id = null) {
        $sql = "INSERT INTO setor (descricao, setor_pai_id) VALUES (:descricao, :setor_pai_id)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':setor_pai_id', empty($setor_pai_id) ? null : $setor_pai_id, empty($setor_pai_id) ? PDO::PARAM_NULL : PDO::PARAM_INT);

        return $stmt->execute();
    }


    // Listar todos
    public function getAll() {
        $sql = "SELECT * FROM setor ORDER BY descricao";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function getById($id) {
        $sql = "SELECT * FROM setor WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar
    public function update($id, $descricao, $setor_pai_id = null) {
        $sql = "UPDATE setor SET descricao = :descricao, setor_pai_id = :setor_pai_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindValue(':setor_pai_id', $setor_pai_id !== '' ? $setor_pai_id : null, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    // Deletar
    public function delete($id) {
        $sql = "DELETE FROM setor WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
