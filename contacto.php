<?php
// Incluir archivo de conexión a la base de datos
require_once 'conexion.php';

$mensaje_estado = "";

// Procesar los datos cuando el formulario se envía por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $perfil = trim($_POST["perfil"] ?? "");
    $motivo = trim($_POST["motivo"] ?? "");
    $intereses_array = $_POST["intereses"] ?? [];
    $intereses = implode(", ", $intereses_array);

    if (!empty($nombre) && !empty($perfil) && !empty($motivo) && !empty($intereses)) {
        $stmt = $conexion->prepare("INSERT INTO mensajes_contacto (nombre, perfil, motivo, intereses) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $perfil, $motivo, $intereses);

        if ($stmt->execute()) {
            http_response_code(201);
            $mensaje_estado = "¡Mensaje procesado por el servidor y guardado en la base de datos!";
        } else {
            http_response_code(500);
            $mensaje_estado = "Error al guardar el mensaje en la base de datos.";
        }
        $stmt->close();
    } else {
        http_response_code(400);
        $mensaje_estado = "Por favor completa todos los campos del formulario.";
    }
}

// Consultar los mensajes almacenados en la base de datos
$resultado_mensajes = $conexion->query("SELECT id, nombre, perfil, motivo, intereses, fecha_envio FROM mensajes_contacto ORDER BY fecha_envio DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Jesús Catzim</title>
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
            <li><a href="index.php">Inicio</a></li>
            <li><a href="evolucion.html">Evolución de la Web</a></li>
            <li><a href="galeria.html">Galería de Imágenes</a></li>
            <li><a href="tablas.html">Proyectos y Tablas</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main>
        <article>
            <h2>Contacto</h2>
            <section>
                <h3>Ponte en contacto</h3>
                <p>Completa el siguiente formulario para enviarme un mensaje relacionado con mis proyectos académicos.</p>

                <!-- Mensaje de confirmación del servidor -->
                <?php if ($mensaje_estado !== ""): ?>
                    <p class="alerta-exito">
                        <?php echo htmlspecialchars($mensaje_estado); ?>
                    </p>
                <?php endif; ?>

                <!-- Formulario para recibir mensajes -->
                <form action="contacto.php" method="post" id="formularioContacto">
                    <fieldset>
                        <legend>Datos de Contacto y Perfil</legend>

                        <!-- Nombre del remitente -->
                        <div class="campo-formulario">
                            <label for="nombre">Nombre completo:</label>
                            <input type="text" id="nombre" name="nombre" minlength="3" required>
                        </div>

                        <!-- Selección del perfil -->
                        <div class="campo-formulario">
                            <label for="perfil">Perfil del remitente:</label>
                            <select id="perfil" name="perfil" required>
                                <option value="">Seleccione un perfil</option>
                                <option value="Estudiante">Estudiante (UADY u otra institución)</option>
                                <option value="Profesor">Profesor / Académico</option>
                                <option value="Reclutador">Reclutador / Externo</option>
                            </select>
                        </div>

                        <!-- Selección del motivo del mensaje -->
                        <p>Motivo principal del mensaje:</p>
                        <div class="opcion-control">
                            <input type="radio" id="duda" name="motivo" value="Duda sobre proyecto" required>
                            <label for="duda">Duda sobre un proyecto (Java, C, PHP, etc.)</label>
                        </div>

                        <div class="opcion-control">
                            <input type="radio" id="colaboracion" name="motivo" value="Propuesta de colaboración">
                            <label for="colaboracion">Propuesta de colaboración</label>
                        </div>

                        <div class="opcion-control">
                            <input type="radio" id="saludo" name="motivo" value="Saludo">
                            <label for="saludo">Solo saludar</label>
                        </div>

                        <!-- Selección de tecnologías de interés -->
                        <p>¿Qué tecnologías te interesan más? (Puedes seleccionar varias):</p>
                        <div class="opcion-control">
                            <input type="checkbox" id="int_frontend" name="intereses[]" value="Frontend">
                            <label for="int_frontend">Frontend (HTML, CSS, JavaScript)</label>
                        </div>

                        <div class="opcion-control">
                            <input type="checkbox" id="int_backend" name="intereses[]" value="Backend">
                            <label for="int_backend">Backend (PHP, Java, C)</label>
                        </div>

                        <div class="opcion-control">
                            <input type="checkbox" id="int_bd" name="intereses[]" value="Bases de Datos">
                            <label for="int_bd">Bases de Datos (MySQL)</label>
                        </div>

                        <hr>

                        <!-- Botón para enviar el formulario -->
                        <p>
                            <input type="submit" value="Enviar mensaje">
                        </p>

                    </fieldset>
                </form>
            </section>

            <hr>

            <!-- Tabla de mensajes guardados en la base de datos -->
            <section>
                <h3>Mensajes Registrados</h3>
                <div class="tabla-contenedor">
                    <table>
                        <caption>Historial de solicitudes enviadas desde el formulario</caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Perfil</th>
                                <th>Motivo</th>
                                <th>Intereses</th>
                                <th>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado_mensajes && $resultado_mensajes->num_rows > 0): ?>
                                <?php while ($fila = $resultado_mensajes->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $fila["id"]; ?></td>
                                        <td><?php echo htmlspecialchars($fila["nombre"]); ?></td>
                                        <td><?php echo htmlspecialchars($fila["perfil"]); ?></td>
                                        <td><?php echo htmlspecialchars($fila["motivo"]); ?></td>
                                        <td><?php echo htmlspecialchars($fila["intereses"]); ?></td>
                                        <td><?php echo $fila["fecha_envio"]; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">Aún no hay mensajes registrados en la base de datos.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </article>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2026 - Jesús Israel Catzim Tzuc.</p>
    </footer>

    <!-- Archivo JavaScript para validar el formulario -->
    <script src="JS/validacion.js"></script>
</body>
</html>
<?php $conexion->close(); ?>