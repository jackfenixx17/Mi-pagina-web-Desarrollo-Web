<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi página web | Jesús Catzim</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <!-- Encabezado del sitio -->
    <header>
        <h1>Mi página web</h1>
        <p>Desarrollo de Aplicaciones Web - ADA 4</p>
    </header>

    <!-- Menú de navegación -->
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="evolucion.html">Evolución de la Web</a></li>
            <li><a href="galeria.html">Galería de Imágenes</a></li>
            <li><a href="tablas.html">Proyectos y Tablas</a></li>
            <li><a href="contacto.html">Contacto</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main>
        <article>
            <!-- Presentación personal -->
            <h2>Sobre mí</h2>
            
            <p>
                ¡Hola! Soy Jesús Israel Catzim Tzuc, estudiante de la
                <strong>Licenciatura en Ingeniería de Software</strong>
                en modalidad virtual, en la Facultad de Matemáticas
                de la Universidad Autónoma de Yucatán (UADY).
            </p>

            <p>
                Este sitio forma parte de mis actividades de desarrollo
                web, en las que aplico conocimientos de HTML5, CSS3 y JavaScript
                en el FrontEnd junto con la ejecución de scripts en PHP
                desde un servidor local y el uso de bases de datos.
            </p>

            <p>
                Durante mi formación he trabajado con lenguajes como
                <em>Java, C, C++, Python y PHP</em>, además de conceptos
                de diseño de software y bases de datos con MySQL.
            </p>

            <hr>

            <!-- Recursos de audio y video -->
            <section>
                <h2>Presentación Multimedia</h2>
                <p>A continuación, se integran recursos multimedia locales utilizando etiquetas nativas de HTML5.</p>
                
                <!-- Audio reproducido desde las carpetas del proyecto -->
                <h3>Audio: Conceptos de la Web</h3>
                <audio controls>
                    <source src="audios/webs.mp3" type="audio/mpeg">
                    Tu navegador no soporta el elemento de audio.
                </audio>
                
                <!-- Video reproducido desde las carpetas del proyecto -->
                <h3>Video: La Historia de la Web</h3>
                <video width="400" controls>
                    <source src="videos/historia_web.mp4" type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                </video>
            </section>
            
            <hr>

            <!-- Capturas de la validación del HTML -->
            <section>
                <h2>Accesibilidad y Estándares Web</h2>
                <p>Evidencia de validación del código HTML5 de este sitio web mediante la herramienta oficial del W3C.</p>
                
                <div>
                    <h3>1. Validación de Inicio (index.html)</h3>
                    <img src="imagenes/validacionindex.png" alt="Captura de validación W3C sin errores para index.html" width="500">
                </div>
                <div>
                    <h3>2. Validación de Evolución (evolucion.html)</h3>
                    <img src="imagenes/validacionevolucion.png" alt="Captura de validación W3C sin errores para evolucion.html" width="500">
                </div>
                <div>
                    <h3>3. Validación de Galería (galeria.html)</h3>
                    <img src="imagenes/validaciongaleria.png" alt="Captura de validación W3C sin errores para galeria.html" width="500">
                </div>
                <div>
                    <h3>4. Validación de Tablas (tablas.html)</h3>
                    <img src="imagenes/validaciontablas.png" alt="Captura de validación W3C sin errores para tablas.html" width="500">
                </div>
                <div>
                    <h3>5. Validación de Contacto (contacto.html)</h3>
                    <img src="imagenes/validacioncontacto.png" alt="Captura de validación W3C sin errores para contacto.html" width="500">
                </div>
            </section>
            
            <hr>

            <!-- Información de la asignatura -->
            <aside>
                <h3>Datos de la asignatura</h3>
                <img src="imagenes/UADY.png" alt="Logotipo de la Universidad Autónoma de Yucatán" width="200">
                <ul>
                    <li><strong>Institución:</strong> Universidad Autónoma de Yucatán (UADY)</li>
                    <li><strong>Facultad:</strong> Facultad de Matemáticas (FMAT)</li>
                    <li><strong>Modalidad:</strong> Unidad Académica de Educación Virtual (UAEV)</li>
                    <li><strong>Profesor:</strong> Dr. Michel García García</li>
                    <li><strong>Actividad:</strong> ADA 4. Servidor Web local y desarrollo del lado del servidor</li>
                </ul>
            </aside>
        </article>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2026 - Jesús Israel Catzim Tzuc.</p>
    </footer>

</body>
</html>
