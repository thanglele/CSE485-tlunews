<?php
require_once 'controllers/CategoryController.php';
require_once 'db.php'; //Kết nối

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($controller) {
    case 'category':
        $categoryController = new CategoryController($db);
        if ($action === 'index') {
            $categoryController->index();
        } elseif ($action === 'add') {
            $categoryController->add();
        } elseif ($action === 'edit') {
            $categoryController->edit($id);
        } elseif ($action === 'delete') {
            $categoryController->delete($id);
        }
        break;
}
?>
