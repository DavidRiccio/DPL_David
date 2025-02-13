# Instalación de Certificado Let's Encrypt con Certbot en Nginx con Hosts Virtuales


Este documento describe el proceso paso a paso para instalar un certificado SSL de Let's Encrypt utilizando Certbot en un servidor Nginx que utiliza hosts virtuales.


## Requisitos Previos


Antes de comenzar, asegúrate de tener lo siguiente:


1. **Servidor con Nginx instalado**: Asegúrate de que Nginx esté instalado y funcionando en tu servidor.

2. **Dominio registrado**: Debes tener un dominio registrado que apunte a la dirección IP de tu servidor.

3. **Acceso a la terminal**: Necesitarás acceso a la terminal de tu servidor con privilegios de sudo.

4. **Certbot instalado**: Si no tienes Certbot instalado, puedes instalarlo siguiendo las instrucciones en la sección de instalación.


## Instalación de Certbot


1. **Actualizar el sistema**:

   ```bash

   sudo apt update

   sudo apt upgrade

    Instalar Certbot: Para sistemas basados en Debian/Ubuntu:

    bash

sudo apt install certbot python3-certbot-nginx

Para sistemas basados en Red Hat/CentOS:

bash

    sudo yum install certbot python2-certbot-nginx

Configuración de Nginx

    Configurar los hosts virtuales: Asegúrate de que tus archivos de configuración de Nginx para los hosts virtuales estén correctamente configurados. Un ejemplo básico de configuración de un host virtual podría ser:

    nginx

server {

    listen 80;

    server_name ejemplo.com www.ejemplo.com;


    location / {

        root /var/www/ejemplo;

        index index.html index.htm;

    }

}

Probar la configuración de Nginx:

bash

sudo nginx -t

Si no hay errores, reinicia Nginx:

bash

    sudo systemctl restart nginx

Obtener el Certificado SSL

    Ejecutar Certbot: Utiliza el siguiente comando para obtener un certificado SSL para tu dominio:

    bash

    sudo certbot --nginx -d ejemplo.com -d www.ejemplo.com

    Reemplaza ejemplo.com y www.ejemplo.com con tu dominio real.

    Seguir las instrucciones: Certbot te guiará a través del proceso. Acepta los términos de servicio y elige si deseas redirigir todo el tráfico a HTTPS.

Verificación de la Instalación

    Verificar el certificado: Puedes verificar que el certificado se haya instalado correctamente accediendo a tu dominio a través de HTTPS:

https://ejemplo.com

Comprobar la renovación automática: Certbot configura automáticamente una tarea cron para renovar el certificado. Puedes verificar la renovación ejecutando:

bash

sudo certbot renew --dry-run