# SISTEMA DE FACTURACIÓN (PRUEBA TÉCNICA)

Este sistema básico de facturación fue desarrollado como parte de una prueba técnica. Su propósito es gestionar facturas mediante un CRUD completo, visualizar detalles (incluyendo sumatoria de precios por ítem y el total de la factura), y permitir la anulación de facturas.

## Tecnologías Utilizadas
- **Backend:** PHP
- **Frontend:** HTML, JavaScript, CSS
- **Base de Datos:** MySQL
- **Framework CSS:** Bootstrap 5
- **Servidor Local:** XAMPP
- **Otras Librerías:** JQuery, SweetAlert2

## Proceso de Instalación y Configuración del Proyecto

### Prerrequisitos
Antes de instalar y configurar el proyecto, asegúrate de tener instalado **XAMPP**. Puedes descargarlo desde el siguiente enlace:
[Descargar XAMPP](https://www.apachefriends.org/es/download.html)

### Pasos para Configuración e Instalación

#### 1. Descargar el Proyecto
Clona este repositorio o descárgalo directamente desde GitHub:

https://github.com/Dani-Arango/prueba_tecnica_history_clinical.git

#### 2. Configurar el Servidor Local (XAMPP)
Copia la carpeta del proyecto descargado en la carpeta htdocs de XAMPP:
##### C:\xampp\htdocs
Abre XAMPP y activa los servicios de Apache y MySQL desde el Panel de Control.

#### 3. Importar la Base de Datos
Abre phpMyAdmin desde tu navegador:
##### http://localhost/phpmyadmin

Crea una nueva base de datos llamada ‘facturacion‘ (puedes usar otro nombre, pero deberás actualizarlo en el archivo connection.php).  

Importa el archivo SQL del proyecto:  

Selecciona la base de datos creada.  

Ve a la pestaña Importar.  

Selecciona el archivo SQL ubicado en la carpeta del proyecto:

##### C:\xampp\htdocs/prueba_tecnica_history_clinical/database/facturacion.sql	

Haz clic en Importar para cargar la base de datos.
#### 4. Configurar el Archivo de Conexión
Edita el archivo connection.php ubicado en la raíz del proyecto y ajusta las credenciales:
##### C:\xampp\htdocs/prueba_tecnica_history_clinical/database/connection.php
  ```php
$host = "localhost";          // Servidor local
$user = "root";               // Usuario predeterminado de XAMPP
$password = "";               // Sin contraseña por defecto
$database = "facturacion";    // Nombre de la base de datos
  ```
Si cambiaste el nombre de la base de datos o usas credenciales diferentes, actualizalas en este archivo.

#### 5. Acceder al Proyecto
Abre tu navegador y accede a la URL del proyecto (Asegurate de tener el servidor Apache y MySql activado):
##### http://localhost/prueba_tecnica_history_clinical/
O tambien desde: 
##### http://localhost/prueba_tecnica_history_clinical/views/facturas/listar_factura.php
---
Y con todo esto deberías poder ejecutar y utilizar el proyecto.

