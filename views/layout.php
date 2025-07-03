<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Todo App</h1>
        <?php if (!empty($_SESSION['userName'])): ?>
            <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['userName']); ?> | 
            <a href="?action=logout">Cerrar sesión</a></p>
        <?php endif; ?>
    </header>

    <main>
