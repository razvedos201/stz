<?php

class DB
{
    private $dsn = 'mysql:dbname=test;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function query($sql,$arr,$class = 'stdClass')
    {
        try {
            $dbh = new PDO($this->dsn, $this->user, $this->password);
        }catch (PDOException $e){
            echo 'Подключение не удалось: ' . $e->getMessage();
            die;
        }
            $sth = $dbh->prepare($sql);

            $sth->execute($arr);

            $arrResult = [];
            while ($res = $sth->fetchObject($class)) {
                $arrResult[] = $res;
            }
            return $arrResult;
    }

}

