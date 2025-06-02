<?php
// config/Database.php

/**
 * Classe responsável por estabelecer a conexão com o banco de dados usando PDO.
 */
class Database {
    private $host = 'localhost';
    private $db_name = 'athia';
    private $username = 'root';
    private $password = '';
    public $conn;

    /**
     * Retorna a conexão com o banco de dados.
     * @return PDO|null
     */
    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Configurações de segurança e erro
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Em produção, use log seguro no lugar de exibir erro
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
