# HOST VIRTUALES

## Paso 1: Crear Directorios para los Hosts Virtuales

Primero, crearemos un directorio para cada uno de los hosts virtuales donde se almacenarán los archivos HTML.

```bash

sudo mkdir -p /var/www/empresa1

sudo mkdir -p /var/www/empresa2

sudo mkdir -p /var/www/empresa3
```
Paso 2: Crear Archivos HTML

A continuación, crearemos un archivo HTML simple para cada uno de los hosts virtuales.
Para empresa1

```bash

echo "<html><head><title>Empresa 1</title></head><body><h1>Bienvenido a Empresa 1</h1></body></html>" | sudo tee /var/www/empresa1/index.html
```
Para empresa2

```bash

echo "<html><head><title>Empresa 2</title></head><body><h1>Bienvenido a Empresa 2</h1></body></html>" | sudo tee /var/www/empresa2/index.html
```
Para empresa3

```bash

echo "<html><head><title>Empresa 3</title></head><body><h1>Bienvenido a Empresa 3</h1></body></html>" | sudo tee /var/www/empresa3/index.html
```
Paso 3: Configurar los Hosts Virtuales en Nginx

Ahora, crearemos un archivo de configuración para cada host virtual en el directorio de configuración de Nginx.
Configuración para empresa1

Crea un archivo de configuración para empresa1:

```bash

sudo nano /etc/nginx/sites-available/empresa1
```
Agrega el siguiente contenido:


```
server {

    listen 80;

    server_name empresa1.com www.empresa1.com;


    root /var/www/empresa1;

    index index.html;
}
```
Configuración para empresa2

Crea un archivo de configuración para empresa2:

```bash

sudo nano /etc/nginx/sites-available/empresa2
```
Agrega el siguiente contenido:

nginx
```
server {

    listen 80;

    server_name empresa2.com www.empresa2.com;


    root /var/www/empresa2;

    index index.html;

}
```
Configuración para empresa3

Crea un archivo de configuración para empresa3:

```bash

sudo nano /etc/nginx/sites-available/empresa3
```
Agrega el siguiente contenido:


```
server {

    listen 80;

    server_name empresa3.com www.empresa3.com;


    root /var/www/empresa3;

    index index.html;

}
```
Paso 4: Habilitar los Hosts Virtuales

Para habilitar los hosts virtuales, crearemos enlaces simbólicos en el directorio sites-enabled.


```bash
sudo ln -s /etc/nginx/sites-available/empresa1 /etc/nginx/sites-enabled/

sudo ln -s /etc/nginx/sites-available/empresa2 /etc/nginx/sites-enabled/

sudo ln -s /etc/nginx/sites-available/empresa3 /etc/nginx/sites-enabled/
```
Paso 5: Probar la Configuración de Nginx

Antes de reiniciar Nginx, es recomendable probar la configuración para asegurarse de que no haya errores.

```bash

sudo nginx -t
```
Paso 6: Reiniciar Nginx

Si la prueba de configuración fue exitosa, reinicia Nginx para aplicar los cambios.

```bash

sudo systemctl restart nginx
```
Paso 7: Modificar el Archivo Hosts (Opcional)

Si estás trabajando en un entorno local, es posible que necesites modificar el archivo /etc/hosts para que los nombres de dominio apunten a tu servidor local.

```bash

sudo nano /etc/hosts
```
Agrega las siguientes líneas:
```
127.0.0.1   empresa1.local

127.0.0.1   empresa2.local

127.0.0.1   empresa3.local
```