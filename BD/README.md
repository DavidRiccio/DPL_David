# CREAR BD CON PHPMYADMIN

- El primer paso es entrar a phpmyadmin y meterse en el apartado de base de datos ingresas el nombre y le das a crear base de datos.
<p align="center"><img src="/BD/1.png"></p>
- Despues crear una tabla en la base de datos e ingresas el nombre y el numero de tablas.
<p align="center"><img src="/BD/2.png"></p>
- Esto te llevara a la creacion de todas las columnas donde seleccionaras las claves y el tipo de cada una.
<p align="center"><img src="/BD/6.png"></p>
- Crearemos un id en el que pondremos que es entero y primary key
<p align="center"><img src="/BD/4.png"></p>
- Marcaremos la casilla de AI para que la id sea AutoIncremental y le pondremos el nombre y tipo de dato al resto de columnas
<p align="center"><img src="/BD/5.png"></p>
- Pondremos que el motor es el siguiente "MyISAM" y le damos a guardars
<p align="center"><img src="/BD/7.png"></p>

- Aqui vemos la BD ya creada 
<p align="center"><img src="/BD/9.png"></p>



## CONECTARSE A LA BASE DE DATOS CON PHP

En primer lugar crearemos los ficheros de index.php y insertar.php, el contenido del index es el siguiente
```php
    <?php
   $conn=  mysqli_connect('localhost','David','1234','tabla1');
    print_r($conn);
    echo(<pre>);
```
los parametros que le pasamos son ip, nombre, contraseña y la tabla.

El contenido de insertar.php es el siguiente
```php
<?php
   $conn=  mysqli_connect('localhost','David','1234','tabla1');
    print_r($conn);
    echo"<pre>";

    $insert =   "INSERT into table1(name,email)
    values('alex','alex@pepep.com')";

   $return = mysqli_query ($conn,$insert);
   mysqli_close($conn)
``` 
Donde se inserta esta informacion en la base de datos como podemos ver en esta imagen.
<p align="center"><img src="/BD/8.png"></p>