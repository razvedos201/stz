<?php

require_once __DIR__. '/../models/News.php';
class NewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        require_once __DIR__.'/../views/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $items = News::getOne($id);
        require_once __DIR__.'/../views/one.php';
    }
}