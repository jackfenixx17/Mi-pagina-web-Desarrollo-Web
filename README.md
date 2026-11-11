# ADA 4

Alumno: Jesús Israel Catzim Tzuc
Profesor: Dr. Michel García García

## Descripción

En esta actividad se integró el desarrollo del lado del servidor al sitio web personal. Se instaló y configuró XAMPP para ejecutar scripts en PHP desde un servidor local Apache y guardar la información del formulario de contacto en una base de datos.

## Estructura del proyecto

- `index.php` / `index.html`: Página de inicio con script para mostrar datos del servidor (fecha, hora y versión de PHP) y sección multimedia.
- `evolucion.html`: Línea del tiempo, etapas de la web y glosario de términos.
- `galeria.html`: Galería con imágenes locales y externas del proyecto.
- `tablas.html`: Tablas sobre las generaciones de la web y catálogo de proyectos académicos.
- `contacto.php` / `contacto.html`: Formulario de contacto con validación en JavaScript y registro de mensajes en la base de datos mediante método POST.
- `conexion.php`: Script de conexión con la base de datos local.
- `base_datos.sql`: Script SQL con la estructura de las tablas `proyectos` y `mensajes_contacto`.
- `CSS/estilos.css`: Hoja de estilos principal con diseño adaptable.
- `JS/validacion.js`: Validación de campos del formulario de contacto.

## Cómo ejecutar el proyecto y la base de datos de forma local

1. Instalar XAMPP y colocar los archivos de este repositorio dentro de la carpeta `C:\xampp\htdocs\portafolio\`.
2. Abrir el panel de control de XAMPP e iniciar los servicios de Apache y MySQL.
3. Entrar desde el navegador a `http://localhost/phpmyadmin/`.
4. Ir a la pestaña SQL o Importar, seleccionar o copiar el contenido del archivo `base_datos.sql` incluido en este repositorio y ejecutarlo. Esto creará automáticamente la base de datos `portafolio_db` con las tablas `proyectos` y `mensajes_contacto`.
5. Abrir el proyecto en el navegador ingresando a `http://localhost/portafolio/index.php`.
