<?php
require_once __DIR__ . '/../models/Guest.php';

class GuestController {
    public function index() {
        $guests = Guest::all(); // Ambil data dari model Guest
        require_once __DIR__ . '/../views/guests/index.php'; // Muat file tampilan
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            Guest::create($name, $email);
            header('Location: index.php?controller=Guest&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/guests/create.php';
    }
}
