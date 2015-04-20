<?php

class DB
{
    private static $db_conn;
    private static $db_user;
    private static $db_pass;
    private static $_instance = NULL;           // База данных
    private static $params;                     // Массив параметров
    private static $sql;                        // Текст запроса

    private function __construct()
    {
    }

    private static function getInstance()
    {
        if (!self::$_instance) {
            self::$db_conn = DB_CONN;
            self::$db_user = DB_USER;
            self::$db_pass = DB_PASS;
            try {
                self::$_instance = new PDO(self::$db_conn, self::$db_user, self::$db_pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_instance->exec("SET NAMES UTF8");
                //echo "Соеденено!"; // Проверка соединения
            } catch (PDOException $e) {
                echo $e->getMessage();
                //echo 'хертам!';
            }
        }
        return self::$_instance;
    }

    private function __clone()
    {
    }
    //закрываем дыры

    // Подготовка нового запроса к выполнению
    public static function sql($sql)
    {

        self::$sql = $sql;
        self::$params = array();
    }

    // Добавление параметра в запрос
    public static function addParameter($parameter)
    {
        self::$params[] = self::getInstance()->quote($parameter);
    }

    public static function addLimit($start, $limit)
    {
        if ($start != '' and $limit != '') {
            self::$sql = self::$sql . " LIMIT :from, :count";

            $sth->bindValue(":from", $start, PDO::PARAM_INT);
            $sth->bindValue(":count", $limit, PDO::PARAM_INT);
            $sth->execute();
        }
    }

    public static function addParameters($arrayOrVar)
    {
        if (is_array($arrayOrVar)) {
            foreach ($arrayOrVar as $parameter) {
                if (!is_int($parameter)) {
                    $parameter = self::getInstance()->quote($parameter);
                }
                self::$params[] = $parameter;
            }
        } else {
            if (!is_int($arrayOrVar)) {
                self::addParameter($arrayOrVar);
            }
            self::$params[] = $arrayOrVar;
        }
        //var_dump(self::$params);
    }

    // Выполняет запрос
    public static function execute()
    {
        try {
            self::getInstance()->beginTransaction();
            for ($i = 0; $i < count(self::$params); $i++) {
                $patten = '_' . ($i + 1);
                self::$sql = preg_replace('/\b' . $patten . '\b/', self::$params[$i], self::$sql);
                //self::$sql = str_ireplace($patten, self::$params[$i], self::$sql);
            }
            $result = self::getInstance()->exec(self::$sql);
            $id = self::getInstance()->lastInsertId();
            self::$sql = '';
            self::getInstance()->commit();
            return $id;
            self::$_instance = NULL;

        } catch (PDOException $e) {
            self::getInstance()->rollBack();
            return $e->getMessage();
        }
    }

    public static function query($start = '', $limit = '')
    {

        //self::addtolog('query='.self::$sql);
        try {
            self::getInstance()->beginTransaction();
            for ($i = 0; $i < count(self::$params); $i++) {
                $patten = '_' . ($i + 1);
                self::$sql = preg_replace('/\b' . $patten . '\b/', self::$params[$i], self::$sql);
                //self::$sql = str_replace($patten, self::$params[$i], self::$sql);
            }

            if ($start >= 0 and $limit > 0) {
                self::$sql = self::$sql . " LIMIT :from, :count";
                $result = self::getInstance()->prepare(self::$sql);
                $result->bindValue(":from", $start, PDO::PARAM_INT);
                $result->bindValue(":count", $limit, PDO::PARAM_INT);
                $result->execute();
            } else
                $result = self::getInstance()->query(self::$sql);

            $myRows = array();
            $i = 0;
            while ($myrow = $result->fetch(PDO::FETCH_ASSOC)) {
                $myRows[] = $myrow;
                $i++;
            }
            $result->closeCursor();
            self::$sql = '';
            self::getInstance()->commit();
            self::$_instance = NULL;
            switch ($i) {
                case 0:
                    return false;
                default:
                    return $myRows;
            }
        } catch (PDOException $e) {
            self::getInstance()->rollBack();
            return $e->getMessage();
        }
    }//END OF public static function query()
}