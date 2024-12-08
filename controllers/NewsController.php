<?php
require_once APP_ROOT.'/models/News.php';

class NewsController {
    public function index() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require_once "views/home/index.php";
    }

    public function detail($id) {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        require_once "views/news/detail.php";
    }
}
?>
