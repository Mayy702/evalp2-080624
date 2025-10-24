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
    <title>Cálculos Geométricos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Cálculo de Área y Volumen</h1>
            <a href="../panel.php" class="logout">← Volver al Panel</a>
        </header>

        <div class="exercise-container">
            <!-- CILINDRO -->
            <div class="calculation-form">
                <h3>Cálculo de Cilindro</h3>
                <form method="POST">
                    <div class="input-group">
                        <label>Radio (r):</label>
                        <input type="number" name="radio_cilindro" step="0.01" required>
                    </div>
                    <div class="input-group">
                        <label>Altura (h):</label>
                        <input type="number" name="altura_cilindro" step="0.01" required>
                    </div>
                    <button type="submit" name="calcular_cilindro">Calcular</button>
                </form>

                <?php
                if (isset($_POST['calcular_cilindro'])) {
                    $radio = floatval($_POST['radio_cilindro']);
                    $altura = floatval($_POST['altura_cilindro']);
                    
                    if ($radio > 0 && $altura > 0) {
                        $area_base = M_PI * pow($radio, 2);
                        $area_lateral = 2 * M_PI * $radio * $altura;
                        $area_total = 2 * $area_base + $area_lateral;
                        $volumen = $area_base * $altura;
                        
                        echo "<div class='result'>";
                        echo "<h4>Resultados del Cilindro:</h4>";
                        echo "<p>Área de la base: " . number_format($area_base, 2) . " unidades²</p>";
                        echo "<p>Área lateral: " . number_format($area_lateral, 2) . " unidades²</p>";
                        echo "<p>Área total: " . number_format($area_total, 2) . " unidades²</p>";
                        echo "<p>Volumen: " . number_format($volumen, 2) . " unidades³</p>";
                        echo "</div>";
                    } else {
                        echo "<div class='error'>Error: Los valores deben ser positivos</div>";
                    }
                }
                ?>
            </div>

            <!-- RECTÁNGULO -->
            <div class="calculation-form">
                <h3>Cálculo de Rectángulo</h3>
                <form method="POST">
                    <div class="input-group">
                        <label>Base (b):</label>
                        <input type="number" name="base_rectangulo" step="0.01" required>
                    </div>
                    <div class="input-group">
                        <label>Altura (h):</label>
                        <input type="number" name="altura_rectangulo" step="0.01" required>
                    </div>
                    <button type="submit" name="calcular_rectangulo">Calcular</button>
                </form>

                <?php
                if (isset($_POST['calcular_rectangulo'])) {
                    $base = floatval($_POST['base_rectangulo']);
                    $altura = floatval($_POST['altura_rectangulo']);
                    
                    if ($base > 0 && $altura > 0) {
                        $area = $base * $altura;
                        $perimetro = 2 * ($base + $altura);
                        
                        echo "<div class='result'>";
                        echo "<h4>Resultados del Rectángulo:</h4>";
                        echo "<p>Área: " . number_format($area, 2) . " unidades²</p>";
                        echo "<p>Perímetro: " . number_format($perimetro, 2) . " unidades</p>";
                        echo "</div>";
                    } else {
                        echo "<div class='error'>Error: Los valores deben ser positivos</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>