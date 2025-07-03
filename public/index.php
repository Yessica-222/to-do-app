<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../controllers/taskController.php';

session_start();

// Instanciar controladores
$authController = new AuthController($pdo);
$taskController = new TaskController($pdo);

// Obtener acción solicitada
$action = $_GET['action'] ?? 'login';

// Procesar acciones
switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register($_POST['name'], $_POST['email'], $_POST['password']);
            header('Location: ?action=login');
            exit;
        }
        include __DIR__ . '/../views/register.php';
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login($_POST['email'], $_POST['password']);
            header('Location: ?action=dashboard');
            exit;
        }
        include __DIR__ . '/../views/login.php';
        break;

    case 'logout':
        $authController->logout();
        header('Location: ?action=login');
        exit;

    case 'dashboard':
        if (!isset($_SESSION['userId'])) {
            header('Location: ?action=login');
            exit;
        }

        $tasks = $taskController->index($_SESSION['userId']);
        include __DIR__ . '/../views/dashboard.php';
        break;

    case 'add-task':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = null;
            $taskController->store($_SESSION['userId'], $_POST['title'], $_POST['description'], $errors);
            header('Location: ?action=dashboard');
            exit;
        }
        break;

    case 'delete-task':
        if (isset($_GET['id'])) {
            $taskController->delete($_GET['id']);
        }
        header('Location: ?action=dashboard');
        exit;

    default:
        include __DIR__ . '/../views/login.php';
        break;
}
