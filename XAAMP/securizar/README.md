# SECURIZAR SERVIDOR PHPMYADMIN


## Poner contraseña
Entramos a PHPMyAdmin
<p align="center"><img src="/img/2024-09-18_15-12.png"></p>
<p align="center"><img src="/img/captura10.png"></p>

Le damos a cuentas de usuarios
<p align="center"><img src="/img/captura11.png"></p>

Le damos a change passwor y ponemos la contraseña que queramos (va a dar un error)

<p align="center"><img src="/img/captura12.png"></p>

Entramos al archivo config.inc.php en la terminal con el comando
```bash
sudo nano config.inc.php
```
y modificamos el siguiente parametro poniendo la misma contraseña que en el servidor

<p align="center"><img src="/img/captura14.png"></p>

## Agregar Usuario

En la pestaña de usuarios en la parte inferiori le damos a agregar usuario este nos pide que le pongamos nombre y contraseñas ademas de los privilegios que quieres que tenga, en este caso solo de datos y estrucutura

<p align="center"><img src="/img/captura15.png"></p>

Por ultimo vamos al mismo archivo que antes y cambiamos el auth_type para que cuando entres te solicite el usuario y la contraseña

<p align="center"><img src="/img/captura16.png"></p>

Aqui la ventana que sale 
<p align="center"><img src="/img/captura17.png"></p>