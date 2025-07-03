<?php include __DIR__ . '/../layout.php'; ?>

<h2>Mis tareas</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<!-- Formulario para crear nueva tarea -->
<form method="POST" action="?action=add-task">
    <label>Título:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Agregar tarea</button>
</form>

<hr>

<!-- Lista de tareas -->
<?php if (!empty($tasks)): ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?php echo htmlspecialchars($task['title']); ?></strong><br>
                <em><?php echo htmlspecialchars($task['description']); ?></em><br>
                Estado: <?php echo $task['status']; ?><br>
                <a href="?action=delete-task&id=<?php echo $task['id']; ?>" onclick="return confirm('¿Eliminar tarea?');">Eliminar</a>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tienes tareas registradas.</p>
<?php endif; ?>
