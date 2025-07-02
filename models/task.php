<?php

require_once __DIR__.'/../config/database.php';

class Task
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Obtener todas las tareas del usuario
    public function getAllByUser($userId)
    {
        $sql = 'SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetchAll();
    }

    // Crear tarea
    public function create($userId, $title, $description)
    {
        $sql = 'INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$userId, $title, $description]);
    }

    // Obtener una tarea por ID
    public function getById($id)
    {
        $sql = 'SELECT * FROM tasks WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    // Actualizar tarea
    public function update($id, $title, $description, $status)
    {
        $sql = 'UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$title, $description, $status, $id]);
    }

    // Eliminar tarea
    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
}
