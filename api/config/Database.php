<?php
    class Database {
        // Database credentials
        private $host = 'localhost';
        private $db_name = 'personal_static_vcard';
        private $username = 'root';
        private $password = '';
        private $conn;

        // Get database connection
        public function getConnection() {
            $this->conn = NULL;

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

                $this->conn->exec('set names utf8');
                echo 'connected';
            }catch(PDOException $exception) {
                echo 'Connection error: ' . $exception->getMessage();
            }

            return $this->conn;
        }
    }

    // $database = new Database();
    // $database->getConnection();
?>