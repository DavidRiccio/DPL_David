<?php
$servername = "localhost"; // El servidor somos nosotros es el local
$username = "root"; // El usuario
$password = "180821"; // La contraseña para acceder al administrador. Esto no es seguro hacerlo pero no pasa nada si es solo una prueba
$dbname = "tarea1"; // Nombre de la base de datos

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Conexión no completada: " . $conn->connect_error);
}

// Insertamos el usuario
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')"; // La sentencia SQL de inserción
    if (mysqli_query($conn, $sql) === TRUE) { // Es recomendable que verifiquemos si hay errores
        echo "Nuevo usuario creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mostramos los usuarios
if (isset($_POST['select'])) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Nombre: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        }
        echo '<br><button onclick="window.location.href=\'index.html\'">Volver al administrador de consultas</button>';
    } else {
        echo "0 resultados";
    }
}

// Actualizamos los usuarios
if (isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$userId"; // La sentencia SQL de actualizción
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Usuario actualizado exitosamente";
        echo '<br><button onclick="window.location.href=\'index.html\'"></button>';
    } else {
        echo "Error actualizando usuario: " . $conn->error;
    }
}

// Borramos el usuario
if (isset($_POST['delete'])) {
    $userId = $_POST['userId'];

    $sql = "DELETE FROM users WHERE id=$userId"; // La sentencia SQL de eliminación
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Usuario borrado exitosamente";
        echo '<br><button onclick="window.location.href=\'index.html\'"></button>';
    } else {
        echo "Error borrando usuario: " . $conn->error;
    }
}

mysqli_close();
?>