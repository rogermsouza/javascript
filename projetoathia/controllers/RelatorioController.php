<?php
class RelatorioController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $sql = "
            SELECT 
                e.id AS empresa_id,
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

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $relatorio = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/relatorio/index.php';
    }
}
