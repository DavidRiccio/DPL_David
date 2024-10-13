# Interfaces de contacto con los ficheros php

## Hacer que el HTML funcione con el método POST.
Para hacer esto, creamos un formulario por operación que realizaremos en la base de datos
Vamos a ver como sería esto.
```html
<form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="email" required>
        <button type="submit" name="insert">Crear usuario</button>
    </form>

    <form action="index.php" method="post">
        <button type="submit" name="select" id="selectButton">Mostrar usuarios</button>
    </form>

    <form action="index.php" method="post">
        <input type="number" name="userId" placeholder="User ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="email" required>
        <button type="submit" name="update">Actualizar</button>
    </form>

    <form action="index.php" method="post">
        <input type="number" name="userId" placeholder="User ID" required>
        <button type="submit" name="delete">Borrar </button>
    </form>
```
Wn estos 4 formularios se hace la conexión al index.php  post y submit botón.
 cada uno de los botones tienen un `name` diferente. Esto es lo que usaremos para que el index.php
pueda reconocer la solicitud.<br>
 ahora nuestro objetivo es recoger esto en el index.php mediante `if`, y una vez el código entre
por una de estas sentencias  realizaremos la recogida de los valores
```php
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (nombre, email) VALUES ('$name', '$email')"; 
    if (mysqli_query($conn, $sql) === TRUE) { 
        echo "Nuevo usuario creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
```
