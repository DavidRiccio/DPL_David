## Método de Paso de Variables de formularios. GET y Post

Se deben crear dos ficheros el index.php y el get-post.php en el fichero index se pondra el html correspondiente

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="get_post.php">
        Nombre: <input type="text" name="usuario" id="">
        <br>
        Fichero: <input type="file" name="Fichero" id="">
        <br>
        <input type="submit" name="enviar "value="enviar">
    </form>
</body>
</html>
```
En el formulario hay que poner en el atributo action el nombre el fichero php (get_post.php) y poner el metodo post o get dependiendo del que vayas usar y en el segundo formulario pedimos un archivo.

En el segundo archivo, el get_post.php pondremos lo siguiente 
```php
    <?php
 // GET es un array con los datos
   echo "<pre>";
   print_r($_POST);
   echo "<br>";
   print_r($_POST["usuario"]);

   print_r($_FILE);
   echo "<br>";
   print_r($_FILES["Fichero"]["name"]);
```

Para mostrar estos ficheros por pantalla tienes que iniciar el servidor de XAAMP como vimos en la practica anterior. Despues tienes que entrar a la carpeta /opt/laamp/htdocs
y creas una carpeta con mkdir y copias los ficheros de php en esa carpeta y buscamos en el navegador localhost/nombredelacarpeta

<p align="center"><img src="/PHP/tarea1/img/captura1.png" widht="500" height="450"></p>
<p align="center"><img src="/PHP/tarea1/img/captura2.png" widht="500" height="450"></p>
