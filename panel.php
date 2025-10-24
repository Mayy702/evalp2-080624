<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Panel de Ejercicios - Evaluación Práctica</h1>
            <div class="user-info">
                Bienvenido, <?php echo $_SESSION['username']; ?> | 
                <a href="index.php?logout=true" class="logout">Cerrar Sesión</a>
            </div>
        </header>
        
        <div class="exercises-grid">
            <div class="exercise-card">
                <h3>Ejercicio 2: Cálculo de Área y Volumen</h3>
                <p>Calcula área y volumen de cilindro, área y perímetro de rectángulo</p>
                <a href="ejercicios/calculos.php" class="btn">Ir al Ejercicio</a>
            </div>
            
            <div class="exercise-card">
                <h3>Ejercicio 3: Identificación de Cuadrantes</h3>
                <p>Identifica cuadrantes en el plano cartesiano</p>
                <a href="ejercicios/cuadrantes.php" class="btn">Ir al Ejercicio</a>
            </div>
        </div>
    </div>
    
    <?php
    // Cerrar sesión
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>