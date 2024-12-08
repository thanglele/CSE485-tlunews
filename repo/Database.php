<?php
class Database {
    private $host = '10.0.10.1';
    private $dbname = 'tintuc';
    private $username = 'application';
    private $password = '@pplication12345@@';
    public $conn;

    // public function __construct() {
    //     $this -> conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    // }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }

        return $this->conn;
    }   

    // public function exec($query)
    // {
    //     try {
            
    //         return $conn->query($query);
    //     }
    //     catch (PDOException $e) 
    //     {
    //         return null;
    //     }
    // }

    // public function execf($query)
    // {
    //     try {
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute();
    //         return $stmt->fetchall(PDO::FETCH_ASSOC);
    //     }
    //     catch (PDOException $e) 
    //     {
    //         return null;
    //     }
    // }
}
?>
