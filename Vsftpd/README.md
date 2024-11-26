# Instalación de VSFTPD en Ubuntu


VSFTPD (Very Secure FTP Daemon) es un servidor FTP popular que es conocido por su seguridad y rendimiento. A continuación se detallan los pasos para instalarlo en un sistema Ubuntu, enjaulando algunos usuarios y habilitando el acceso anónimo.


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
2. Instalar VSFTPD

Para instalar VSFTPD, ejecuta el siguiente comando:

```bash

sudo apt install vsftpd -y
```
3. Configurar VSFTPD

El archivo de configuración principal de VSFTPD se encuentra en /etc/vsftpd.conf. Puedes editarlo con tu editor de texto preferido:

```bash

sudo nano /etc/vsftpd.conf
```
Configuraciones Clave

    Habilitar usuarios locales: Descomenta la siguiente línea para permitir que los usuarios locales inicien sesión:

```bash

local_enable=YES
```
    Habilitar el acceso anónimo: Para permitir el acceso anónimo, descomenta y ajusta las siguientes líneas:

```bash

anonymous_enable=YES

anon_root=/var/ftp
```
    Enjaular usuarios locales: Para enjaular a los usuarios locales, descomenta la siguiente línea:

```bash

chroot_local_user=YES
```
    Permitir escritura en jaulas (opcional): Si deseas permitir que los usuarios enjaulados puedan escribir en sus directorios, añade la siguiente línea:

```bash

allow_writeable_chroot=YES
```
4. Crear un Usuario Anónimo

Para crear un directorio para usuarios anónimos, ejecuta:

```bash

sudo mkdir /var/ftp

sudo chown ftp:ftp /var/ftp
```
5. Crear Usuarios Locales

Si deseas crear usuarios locales que estén enjaulados, puedes hacerlo con el siguiente comando:

```bash

sudo adduser nombre_de_usuario
```
6. Reiniciar el Servicio VSFTPD

Después de realizar cambios en la configuración, reinicia el servicio VSFTPD para que los cambios surtan efecto:

```bash

sudo systemctl restart vsftpd
```
7. Verificar el Estado del Servicio

Para asegurarte de que VSFTPD se esté ejecutando correctamente, puedes verificar su estado con el siguiente comando:

```bash

sudo systemctl status vsftpd
```
8. Configurar el Firewall (opcional)

Si tienes un firewall habilitado (como UFW), asegúrate de permitir el tráfico en el puerto 21:

```bash

sudo ufw allow 21/tcp

9. Probar la Conexión FTP
```
Usa un cliente FTP (como FileZilla) o la línea de comandos para probar la conexión al servidor FTP:

```bash

ftp dirección_ip_del_servidor
```
Introduce el nombre de usuario y la contraseña cuando se te solicite. Para el acceso anónimo, simplemente usa "anonymous" como nombre de usuario y cualquier dirección de correo electrónico como contraseña.