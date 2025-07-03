<?php

require_once __DIR__ . '/../models/user.php';
session_start();

class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    /**
     * Procesa el registro de un nuevo usuario
     */
    public function register($name, $email, $password)
    {
        // Validaciones básicas
        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = 'Todos los campos son obligatorios';
            return false;
        }

        // Verificar si ya existe el usuario
        if ($this->userModel->findByEmail($email)) {
            $_SESSION['error'] = 'El correo ya está registrado';
            return false;
        }

        // Registrar usuario
        $success = $this->userModel->register($name, $email, $password);
        if ($success) {
            $_SESSION['success'] = 'Usuario registrado correctamente';
            return true;
        } else {
            $_SESSION['error'] = 'Error al registrar usuario';
            return false;
        }
    }

    /**
     * Procesa el inicio de sesión
     */
    public function login($email, $password)
    {
        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['name'];
            return true;
        } else {
            $_SESSION['error'] = 'Credenciales incorrectas';
            return false;
        }
    }

    /**
     * Cierra la sesión actual
     */
    public function logout()
    {
        session_unset();
        session_destroy();
    }
}