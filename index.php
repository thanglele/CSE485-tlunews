<?php
session_start();
define("APP_ROOT", __DIR__);
$controller = $_GET['controller'] ?? 'news';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'news':
        require_once "controllers/NewsController.php";
        $newsController = new NewsController();
        if ($action == 'index') {
            $newsController->index();
        } elseif ($action == 'detail') {
            $id = $_GET['id'];
            $newsController->detail($id);
        }
        break;

    case 'admin':
        require_once "controllers/AdminController.php";
        $adminController = new AdminController();
        if ($action == 'login') {
            $adminController->login();
        } elseif ($action == 'logout') {
            session_destroy();
            header("Location: index.php");
        }
        break;
}
?>
