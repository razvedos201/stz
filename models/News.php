<?php
require_once __DIR__ . '/../classes/DB.php';

class News
{
    public static function getAll($arr = []){
        $db = new DB();
        $result = $db->query('SELECT * FROM news',$arr,'News');
        return $result;
    }
    public static function getOne($id)
{
    $arr[] = $id;
    $db = new DB();
    $result = $db->query('SELECT * FROM news WHERE id = ?',$arr,'News');

    return $result;
}
}

