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

    /**
     * Obtiene una tarea por su ID.
     *
     * @param int $taskId
     *
     * @return array|false
     */
    public function getById($taskId)
    {
        $sql = 'SELECT * FROM tasks WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$taskId]);

        return $stmt->fetch();
    }

    // Actualizar tarea
    public function update($taskId, $title, $description, $status)
    {
        $sql = 'UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$title, $description, $status, $taskId]);
    }

    // Eliminar tarea
    public function delete($taskId)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$taskId]);
    }
}
