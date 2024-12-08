<?php
class Database {
    private $host = '10.0.10.1';
    private $dbname = 'tintuc';
    private $username = 'application';
    private $password = '@pplication12345@@';
    private $conn;

    public function connect($query)
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            return null;
        }
    }

    public function disconnect() {
        $this->conn = null;
    }
}
?>