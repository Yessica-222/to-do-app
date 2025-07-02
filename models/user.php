<?php
require_once __DIR__.'/../config/database.php';

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Crear nuevo usuario
    public function register($name, $email, $password)
    {
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_BCRYPT)]);
    }

    // Buscar usuario por email
    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->fetch();
    }
}
