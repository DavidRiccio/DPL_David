<?php
// Iniciar la sesión
session_start();

// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generar token CSRF si no existe
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Conexión a la base de datos
$servername = "sql200.infinityfree.com";
$username = "if0_37574106";
$password = "doQHqu7Ilj";
$dbname = "if0_37574106_tarea1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['token'] !== $_SESSION['token']) {
        die("Token CSRF inválido.");
    }

    $user = $_POST['email'];
    $pass = $_POST['password'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($pass, $hashed_password)) {
            // Contraseña correcta, verificar si es el admin
            if ($user === 'admin@gmail.com') {
                // Iniciar sesión
                $_SESSION['email'] = $user;

                // Redirigir a otra página (bienvenido.html)
                header("Location: php/index.html");
                exit();
            } else {
                echo "No tienes permiso para acceder a esta área.";
            }
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "No se encontró el usuario.";
    }
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>