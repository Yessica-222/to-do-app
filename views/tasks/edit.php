<?php include __DIR__ . '/../layout.php'; ?>

<h2>Editar tarea</h2>

<form method="POST" action="?action=update-task&id=<?php echo $task['id']; ?>">
    <label>Título:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="description"><?php echo htmlspecialchars($task['description']); ?></textarea><br><br>

    <label>Estado:</label><br>
    <select name="status">
        <option value="pendiente" <?php echo $task['status'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
        <option value="completado" <?php echo $task['status'] === 'completado' ? 'selected' : ''; ?>>Completado</option>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>
