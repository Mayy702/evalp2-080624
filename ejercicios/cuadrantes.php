<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identificación de Cuadrantes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Identificación de Cuadrantes</h1>
            <a href="../panel.php" class="logout">← Volver al Panel</a>
        </header>

        <div class="exercise-container">
            <div class="coordinate-form">
                <h3>Ingrese las coordenadas del punto</h3>
                <form method="POST">
                    <div class="input-group">
                        <label>Coordenada X:</label>
                        <input type="number" name="coordenada_x" step="any" required>
                    </div>
                    <div class="input-group">
                        <label>Coordenada Y:</label>
                        <input type="number" name="coordenada_y" step="any" required>
                    </div>
                    <button type="submit" name="identificar">Identificar Cuadrante</button>
                </form>

                <?php
                if (isset($_POST['identificar'])) {
                    $x = floatval($_POST['coordenada_x']);
                    $y = floatval($_POST['coordenada_y']);
                    
                    echo "<div class='result'>";
                    echo "<h4>Resultado:</h4>";
                    
                    // Determinar ubicación
                    if ($x == 0 && $y == 0) {
                        echo "<p class='special-point'>El punto está en el origen (0,0)</p>";
                    } elseif ($x == 0) {
                        echo "<p class='special-point'>El punto está sobre el eje Y</p>";
                    } elseif ($y == 0) {
                        echo "<p class='special-point'>El punto está sobre el eje X</p>";
                    } elseif ($x > 0 && $y > 0) {
                        echo "<p class='quadrant-i'>I Cuadrante (X > 0 y Y > 0)</p>";
                    } elseif ($x < 0 && $y > 0) {
                        echo "<p class='quadrant-ii'>II Cuadrante (X < 0 y Y > 0)</p>";
                    } elseif ($x < 0 && $y < 0) {
                        echo "<p class='quadrant-iii'>III Cuadrante (X < 0 y Y < 0)</p>";
                    } elseif ($x > 0 && $y < 0) {
                        echo "<p class='quadrant-iv'>IV Cuadrante (X > 0 y Y < 0)</p>";
                    }
                    
                    echo "<p>Coordenadas: ($x, $y)</p>";
                    echo "</div>";
                    
                    // Mostrar plano cartesiano
                    echo "<div class='visual-result'>";
                    echo "<h4>Plano Cartesiano:</h4>";
                    echo "<div class='coordinate-plane'>";
                    echo "<div class='axes x-axis'></div>";
                    echo "<div class='axes y-axis'></div>";
                    
                    // Calcular posición del punto en el plano (escala: 1 unidad = 20px)
                    $posX = 150 + ($x * 20);
                    $posY = 150 - ($y * 20);
                    
                    echo "<div class='point' style='left: {$posX}px; top: {$posY}px;'></div>";
                    echo "<div class='point-label' style='left: " . ($posX + 10) . "px; top: " . ($posY - 10) . "px;'>($x, $y)</div>";
                    
                    // Etiquetas de cuadrantes
                    echo "<div class='quadrant-label' style='left: 250px; top: 50px;'>I Cuadrante</div>";
                    echo "<div class='quadrant-label' style='left: 50px; top: 50px;'>II Cuadrante</div>";
                    echo "<div class='quadrant-label' style='left: 50px; top: 250px;'>III Cuadrante</div>";
                    echo "<div class='quadrant-label' style='left: 250px; top: 250px;'>IV Cuadrante</div>";
                    
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>