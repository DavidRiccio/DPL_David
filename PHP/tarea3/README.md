
## Formularios HTML:

- ## 1. Formulario para Insertar Usuarios
Este formulario agrega un nuevo registro en la tabla users, pasando name, email, y password al archivo insert.php mediante POST.

```html
<h2>Insertar Nuevo Usuario</h2>
<form action="insert.php" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Correo:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Insertar">
</form>
```

- ## 2. Formulario para Leer Usuarios
Este enlace redirige a read.php, se muestran los registros de la tabla users. No es necesario enviar datos a través del método POST en este caso.

```html
<h2>Leer Todos los Usuarios</h2>
<a href="read.php">Ver Usuarios</a>
```

- ## 3. Formulario para Modificar Usuarios
Este formulario envía el id del usuario, junto con los nuevos valores de name y email al archivo update.php.

```html
<h2>Modificar Usuario</h2>
<form action="update.php" method="POST">
    <label for="id">ID del Usuario a Modificar:</label>
    <input type="number" name="id" required>
    <br>
    <label for="name">Nuevo Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Nuevo Correo:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Modificar">
</form>
```

- ## 4. Formulario para Eliminar Usuarios
Este formulario permite al usuario introducir el id del registro que se quiere eliminar y envía ese valor a delete.php mediante el método POST.

```html
<h2>Eliminar Usuario</h2>
<form action="delete.php" method="POST">
    <label for="id">ID del Usuario a Eliminar:</label>
    <input type="number" name="id" required>
    <br>
    <input type="submit" value="Eliminar">
</form>
```

