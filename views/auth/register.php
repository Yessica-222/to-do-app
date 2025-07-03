<?php include __DIR__ . '/../layout.php'; ?>

<h2>Registro</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="?action=register">
    <label>Nombre:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Correo electrónico:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Registrar</button>
</form>

<p>¿Ya tienes cuenta? <a href="?action=login">Inicia sesión aquí</a></p>
