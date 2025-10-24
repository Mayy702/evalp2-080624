<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Evaluación Práctica</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <div class="math-img">📐 🧮 🔢</div>
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Ingresar</button>
        </form>
        
        <?php
        session_start();
        
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Credenciales definidas
            $valid_user = "mayy";
            $valid_pass = "1234";
            
            if ($username === $valid_user && $password === $valid_pass) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("Location: panel.php");
                exit;
            } else {
                echo '<div class="error">Usuario o contraseña incorrectos</div>';
            }
        }
        ?>
    </div>
</body>
</html>