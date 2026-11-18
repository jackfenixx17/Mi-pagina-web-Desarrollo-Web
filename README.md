# Mi página web - ADA 5

Alumno: Jesús Israel Catzim Tzuc
Profesor: Dr. Michel García García

## Descripción

En esta actividad se integró un carrito de compras con manejo de sesiones en PHP (`$_SESSION`). El sistema permite conservar el nombre del usuario durante la navegación y gestionar productos (añadir, listar, modificar cantidad y eliminar) obtenidos desde una base de datos MariaDB en un servidor local XAMPP.

## Estructura del proyecto

- `index.html`: Página de inicio con presentación personal y sección multimedia.
- `evolucion.html`: Línea del tiempo, etapas de la web y glosario de términos.
- `galeria.html`: Galería con imágenes locales y externas del proyecto.
- `tablas.html`: Tablas sobre las generaciones de la web y catálogo de proyectos académicos.
- `carrito.php`: Vista del catálogo de productos y tabla del carrito de compras en sesión.
- `procesar_carrito.php`: Script PHP que gestiona la sesión del usuario y las operaciones del carrito (añadir, modificar y eliminar).
- `contacto.php` / `contacto.html`: Formulario de contacto con registro de mensajes en la base de datos mediante método POST.
- `conexion.php`: Script de conexión con la base de datos local.
- `base_datos.sql`: Script SQL con la estructura de las tablas `proyectos`, `mensajes_contacto` y `productos`.
- `CSS/estilos.css`: Hoja de estilos principal con diseño adaptable.
- `JS/validacion.js`: Validación de campos del formulario de contacto.

## Cómo ejecutar el proyecto y la base de datos de forma local

1. Instalar XAMPP y colocar los archivos de este repositorio dentro de la carpeta `C:\xampp\htdocs\portafolio\`.
2. Abrir el panel de control de XAMPP e iniciar los servicios de Apache y MySQL.
3. Entrar desde el navegador a `http://localhost/phpmyadmin/`.
4. Ir a la pestaña SQL o Importar, seleccionar o copiar el contenido del archivo `base_datos.sql` incluido en este repositorio y ejecutarlo. Esto creará la base de datos `portafolio_db` con las tablas `proyectos`, `mensajes_contacto` y `productos`.
5. Abrir el proyecto en el navegador ingresando a `http://localhost/portafolio/carrito.php`.
