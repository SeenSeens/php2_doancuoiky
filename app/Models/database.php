<?php

namespace Models;
use PDO;
use PDOException;

class database {
    private static $dsn = 'mysql:host=localhost;dbname=doancuoiky';
    private static $username = 'root';
    private static $password = '12345678';
    private static $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    private static $db;

    private function __construct()
    {
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            } catch (PDOException $e) {
                self::displayError($e->getMessage());
            }
        }
        return self::$db;
    }

    public static function displayError($error_message) {
        global $app_path;
        include 'Errors/db_error.php';
        exit;
    }
}