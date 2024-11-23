<?php
class Database {
    private static $connection;

    public static function connect() {
        if (!self::$connection) {
            self::$connection = new mysqli('localhost', 'root', '', 'wedding_guest');
            if (self::$connection->connect_error) {
                die('Koneksi gagal: ' . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}


