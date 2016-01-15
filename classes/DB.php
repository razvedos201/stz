<?php

class DB
{
    private $dbh;
    public function __construct()
    {
        try {
            $settings = parse_ini_file(__DIR__.'/../db_settings.ini');
            $dsn =$settings['driver'].':dbname='.$settings['schema'].';host='.$settings['host'];
            $username = $settings['username'];
            $password = $settings['password'];
            $this->dbh = new PDO($dsn,$username,$password);
        }catch (PDOException $e){
            echo 'Подключение не удалось: ' . $e->getMessage();
            die;
        }
    }

    public function query($sql,$arr,$class = 'stdClass')
    {


            $sth = $this->dbh->prepare($sql);

            $sth->execute($arr);

            $arrResult = [];
            while ($res = $sth->fetchObject($class)) {
                $arrResult[] = $res;
            }
            return $arrResult;
    }

}

