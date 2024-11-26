Claro, aquí tienes un documento en formato Markdown que detalla los pasos para instalar ProFTPD en Ubuntu.

markdown

# Instalación de ProFTPD en Ubuntu


ProFTPD es un servidor FTP de código abierto que es fácil de configurar y usar. A continuación se detallan los pasos para instalarlo en un sistema Ubuntu.


## Requisitos Previos


- Un sistema Ubuntu actualizado.

- Acceso a la terminal con privilegios de superusuario (root) o un usuario con permisos `sudo`.


## Pasos para la Instalación


### 1. Actualizar el Sistema


Primero, asegúrate de que tu sistema esté actualizado. Abre una terminal y ejecuta:


```bash

sudo apt update
sudo apt upgrade -y
```

2. Instalar ProFTPD

Para instalar ProFTPD, ejecuta el siguiente comando:

```bash
sudo apt install proftpd -y
```
Durante la instalación, se te pedirá que elijas el modo de operación. Puedes seleccionar standalone o inetd. Para la mayoría de las configuraciones, standalone es la opción recomendada.
3. Configurar ProFTPD

El archivo de configuración principal de ProFTPD se encuentra en /etc/proftpd/proftpd.conf. Puedes editarlo con tu editor de texto preferido:

```bash
sudo nano /etc/proftpd/proftpd.conf
```
Algunas configuraciones comunes que puedes considerar modificar son:

    Cambiar el puerto: Por defecto, ProFTPD escucha en el puerto 21. Puedes cambiarlo si es necesario.
    Habilitar la autenticación de usuarios: Asegúrate de que las líneas relacionadas con la autenticación de usuarios estén correctamente configuradas.

4. Crear un Usuario FTP

Si deseas crear un usuario FTP, puedes hacerlo con el siguiente comando:

```bash

sudo adduser nombre_de_usuario
```
Sigue las instrucciones para establecer una contraseña y completar la información del usuario.
5. Reiniciar el Servicio ProFTPD

Después de realizar cambios en la configuración o agregar usuarios, reinicia el servicio ProFTPD para que los cambios surtan efecto:

```bash

sudo systemctl restart proftpd
``` 
6. Verificar el Estado del Servicio

Para asegurarte de que ProFTPD se esté ejecutando correctamente, puedes verificar su estado con el siguiente comando:

```bash
sudo systemctl status proftpd
```
7. Configurar el Firewall (opcional)

Si tienes un firewall habilitado (como UFW), asegúrate de permitir el tráfico en el puerto 21:

```bash
sudo ufw allow 21/tcp
```
8. Probar la Conexión FTP

Usa un cliente FTP (como FileZilla) o la línea de comandos para probar la conexión al servidor FTP:

```bash
ftp dirección_ip_del_servidor
```
Introduce el nombre de usuario y la contraseña cuando se te solicite.