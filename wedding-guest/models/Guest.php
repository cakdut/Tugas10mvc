<?php
require_once __DIR__ . '/../config/database.php';

class Guest {
    public static function all() {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM guests ORDER BY created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function create($name, $email) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO guests (name, email) VALUES (?, ?)");
        $stmt->bind_param('ss', $name, $email);
        return $stmt->execute();
    }
}
