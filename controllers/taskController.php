<?php

// archivo: controllers/TaskController.php

require_once __DIR__.'/../models/Task.php';
session_start();

class TaskController
{
    /**
     * @var Task
     */
    private $taskModel;

    public function __construct($pdo)
    {
        $this->taskModel = new Task($pdo);
    }

    /**
     * Muestra todas las tareas del usuario.
     *
     * @return array
     */
    public function index($userId)
    {
        return $this->taskModel->getAllByUser($userId);
    }

    /**
     * Crea una nueva tarea.
     */
    public function store($userId, $title, $description, &$errors = null)
    {
        if (empty($title)) {
            $errors = 'El título es obligatorio';

            return false;
        }

        return $this->taskModel->create($userId, $title, $description);
    }

    /**
     * Retorna los datos de una tarea específica.
     */
    public function edit($taskId)
    {
        return $this->taskModel->getById($taskId);
    }

    /**
     * Actualiza una tarea existente.
     */
    public function update($taskId, $title, $description, $status)
    {
        return $this->taskModel->update($taskId, $title, $description, $status);
    }

    /**
     * Elimina una tarea.
     */
    public function delete($taskId)
    {
        return $this->taskModel->delete($taskId);
    }
}
