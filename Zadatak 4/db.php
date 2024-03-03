<?php

class Database {
    private $host = 'localhost';
    private $username = 'korisnik';
    private $password = 'lozinka';
    private $dbname = 'naziv_baze';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Povezivanje s bazom podataka nije uspjelo: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
