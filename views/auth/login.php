<?php include __DIR__ . '/../layout.php'; ?>

<h2>Iniciar sesión</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="?action=login">
    <label>Correo electrónico:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>
</form>

<p>¿No tienes cuenta? <a href="?action=register">Regístrate aquí</a></p>
