<?php
require_once 'models/Category.php'

class CategoryController{
    private $categoryModel;

    public function __construct($db){
        $this->categoryModel = new Category($db);
    }
}

//Hiển thị
public function index(){
    $categories = $this->categoryModel->getAllCategories();
    require 'views/admin/news/index.php';
}

//Thêm
public function add(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $this->categoryModel->addCategory($name);
        header("Location: index.php?controller=category&action=index");
    } else {
        require 'views/admin/news/add.php';
    }
}

//Sửa
public function edit($id){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $this->categoryModel->updateCategory($id, $name);
        header("Location: index.php?controller=category&action=index");
    } else {
        $category = $this->categoryModel->getCategoryById($id);
        require 'views/admin/news/edit.php';
    }
}

//Xóa
public function delete($id){
    $this->categoryModel->deleteCategory($id);
    header("Location: index.php?controller=category&action=index");
}
?>