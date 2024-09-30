# Redirecciones en PHP

El fichero contendrá el html con el enlace al que haremos redirección y al que pasaremos los datos que creamos pertinentes,en el caso del video 
```html
<a href="pagina2.php?name=alex">Redirección</a>
```
El fichero pagina2.php contiene
 ```
header( "location: pagina3.php?name=" .$_GET["name"]);
```
<p align="center"><img src="/PHP/tarea2/img/Redireccion1.png" width="500px" height="200px"/></p>
 para realizar la redirección hacia la pagina3.php con todos los datos que queramos.

 Y esto nos lleva al siguiente enlace 

<p align="center"><img src="/PHP/tarea2/img/Redireccion2.png" width="500px" height="200px" /></p>
