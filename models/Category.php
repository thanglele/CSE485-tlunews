<?php
class Category{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
}

//Lấy danh sách
public function getAllCategories(){
    $query = "SELECT * FROM categories";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOS);
}

//Lấy thông tin
public function getAllCategoryById($id){
    $query = "SELECT * FROM categories WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Thêm
public function addCategory($name){
    $query = "INSERT INTO categories (name) VALUES (:name)";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':name', $name);
    return $stmt->execute();
}

//Sửa
public function updateCategory($id, $name){
    $query = "UPDATE categories SET name = :name WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id'. $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    return $stmt->execute();
}

//Xóa
public function deleteCategory($id){
    $query = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>