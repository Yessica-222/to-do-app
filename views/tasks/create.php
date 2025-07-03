<?php include __DIR__ . '/../layout.php'; ?>

<h2>Agregar nueva tarea</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="?action=add-task">
    <label for="title">Título:</label><br>
    <input type="text" name="title" id="title" required><br><br>

    <label for="description">Descripción:</label><br>
    <textarea name="description" id="description"></textarea><br><br>

    <button type="submit">Guardar tarea</button>
</form>

<p><a href="?action=dashboard">← Volver al dashboard</a></p>
