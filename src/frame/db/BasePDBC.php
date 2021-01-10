<?php

namespace frame\db;

use PDO;
use PDOException;

/**
 * Class BasePDBC
 * Use singleton.
 * @package frame\db
 */
class BasePDBC
{
    private static $pdo = null;

    public static function pdo()
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", DB_HOST, DB_NAME);
            // PDO::ATTR_DEFAULT_FETCH_MODE: use the default fetch mode
            // PDO::FETCH_ASSOC: returns an array indexed by column name
            $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

            return self::$pdo = new PDO($dsn, DB_USER, DB_PWD, $option);
        } catch (PDOException $exp) {
            exit($exp->getMessage());
        }
    }
}



