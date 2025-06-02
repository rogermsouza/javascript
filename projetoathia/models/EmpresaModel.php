<?php
// === Arquivo: models/EmpresaModel.php ===
// Model da tabela 'empresa' com métodos para CRUD usando PDO

class EmpresaModel {
    public function getConnection() {
        return $this->conn;
    }


    public function __construct($db) {
        $this->conn = $db;
    }

    // Cria uma nova empresa
    public function create($razao_social, $nome_fantasia, $cnpj, $setores = []) {
        $this->conn->beginTransaction();

        $sql = "INSERT INTO empresa (razao_social, nome_fantasia, cnpj) VALUES (:razao_social, :nome_fantasia, :cnpj)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':razao_social' => $razao_social,
            ':nome_fantasia' => $nome_fantasia,
            ':cnpj' => $cnpj
        ]);
        $empresaId = $this->conn->lastInsertId();

        foreach ($setores as $setorId) {
            $vinc = $this->conn->prepare("INSERT INTO empresa_setor (empresa_id, setor_id) VALUES (?, ?)");
            $vinc->execute([$empresaId, $setorId]);
    }

    return $this->conn->commit();
}



    // Retorna todas as empresas
    public function getAll() {
        $sql = "SELECT * FROM empresa ORDER BY razao_social";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca uma empresa pelo ID
    public function getById($id) {
        $sql = "SELECT * FROM empresa WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualiza os dados de uma empresa
    public function update($id, $razao_social, $nome_fantasia, $cnpj, $setores = []) {
        $this->conn->beginTransaction();

        $sql = "UPDATE empresa SET razao_social = :razao_social, nome_fantasia = :nome_fantasia, cnpj = :cnpj WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':razao_social' => $razao_social,
            ':nome_fantasia' => $nome_fantasia,
            ':cnpj' => $cnpj,
            ':id' => $id
        ]);

        // Limpa os vínculos antigos
        $del = $this->conn->prepare("DELETE FROM empresa_setor WHERE empresa_id = ?");
        $del->execute([$id]);

        // Insere os novos vínculos
        foreach ($setores as $setorId) {
            $insert = $this->conn->prepare("INSERT INTO empresa_setor (empresa_id, setor_id) VALUES (?, ?)");
            $insert->execute([$id, $setorId]);
        }

        return $this->conn->commit();
}


    // Deleta uma empresa pelo ID
    public function delete($id) {
        $sql = "DELETE FROM empresa WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    public function getEmpresasComSetores() {
        $sql = "
            SELECT 
                e.id, 
                e.razao_social, 
                e.nome_fantasia, 
                e.cnpj,
                GROUP_CONCAT(s.descricao SEPARATOR ', ') AS setores
            FROM empresa e
            LEFT JOIN empresa_setor es ON e.id = es.empresa_id
            LEFT JOIN setor s ON es.setor_id = s.id
            GROUP BY e.id
            ORDER BY e.razao_social
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


// models/EmpresaModel.php

    public function getSetoresByEmpresaId($empresaId) {
        $sql = "SELECT setor_id FROM empresa_setor WHERE empresa_id = :empresa_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':empresa_id', $empresaId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function search($term = '', $setor_id = '') {
        $sql = "SELECT e.*, 
                    GROUP_CONCAT(s.descricao SEPARATOR ', ') AS setores
                FROM empresa e
                LEFT JOIN empresa_setor es ON e.id = es.empresa_id
                LEFT JOIN setor s ON s.id = es.setor_id
                WHERE (e.razao_social LIKE :term OR e.cnpj LIKE :term)";

        if (!empty($setor_id)) {
            $sql .= " AND s.id = :setor_id";
    }

    $sql .= " GROUP BY e.id";

    $stmt = $this->conn->prepare($sql);
    $termWildcard = '%' . $term . '%';
    $stmt->bindParam(':term', $termWildcard);
    if (!empty($setor_id)) {
        $stmt->bindParam(':setor_id', $setor_id);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
