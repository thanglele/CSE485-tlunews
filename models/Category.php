<?php
class Category{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
}

public function getAllCategories(){
    $query = "SELECT * FROM categories";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOS);
}

public function getAllCategoryById($id){
    $query = "SELECT * FROM categories WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>