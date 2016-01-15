<?php

class DB
{

    public function query($sql,$arr,$class = 'stdClass')
    {

        try {
            $settings = parse_ini_file(__DIR__.'/../db_settings.ini');
            $dsn = $settings[database][driver].':dbname='.$settings[database][schema].
                    ';host='.$settings[database][host];
            $username = $settings[database][username];
            $password = $settings[database][password];
            $dbh = new PDO($dsn,$username,$password);
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

