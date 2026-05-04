<<<<<<< HEAD
<?php
class Database {
    private $host = "localhost";
    private $db = "bootcamp_db";
    private $user = "root";
    private $pass = "";                         
    protected $conn;

    public function __construct() {
        try {
         $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
=======
<?php
class Database {
    private $host = "localhost";
    private $db = "bootcamp_db";
    private $user = "root";
    private $pass = "";
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed");
        }
    }
}
>>>>>>> e37008734dd15272e8342eb97a1229bea04f7ea4
