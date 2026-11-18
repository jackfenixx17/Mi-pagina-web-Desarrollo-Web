<?php
// Iniciar sesión
session_start();
require_once 'conexion.php';

// Recuperar datos almacenados en la sesión
$usuario_sesion = $_SESSION["usuario"] ?? "";
$carrito = $_SESSION["carrito"] ?? [];

// Consultar los productos en la base de datos
$resultado_productos = $conexion->query("SELECT id, nombre, descripcion, precio, imagen FROM productos ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Jesús Catzim</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <!-- Encabezado del sitio -->
    <header>
        <h1>Mi página web</h1>
        <p>Desarrollo de Aplicaciones Web - ADA 5</p>
    </header>

    <!-- Menú de navegación -->
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="evolucion.html">Evolución de la Web</a></li>
            <li><a href="galeria.html">Galería de Imágenes</a></li>
            <li><a href="tablas.html">Proyectos y Tablas</a></li>
            <li><a href="carrito.php">Tienda</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main>
        <article>
            <h2>Tienda de Componentes de PC</h2>

            <?php if ($usuario_sesion === ""): ?>
                <!-- Formulario de acceso inicial para abrir la tienda -->
                <section>
                    <h3>Identificación de Usuario</h3>
                    <p>Ingresa tu nombre para iniciar sesión y acceder al catálogo de componentes y a tu carrito de compras:</p>
                    <form action="procesar_carrito.php" method="post">
                        <fieldset>
                            <legend>Iniciar Sesión en la Tienda</legend>
                            <div class="campo-formulario">
                                <label for="usuario">Nombre del usuario:</label>
                                <input type="text" id="usuario" name="usuario" minlength="3" required>
                            </div>
                            <input type="hidden" name="accion" value="guardar_usuario">
                            <p>
                                <input type="submit" value="Entrar a la tienda">
                            </p>
                        </fieldset>
                    </form>
                </section>
            <?php else: ?>
                <!-- Datos de la sesión activa -->
                <section>
                    <h3>Sesión Activa</h3>
                    <div class="alerta-exito">
                        <p>Cliente conectado: <strong><?php echo htmlspecialchars($usuario_sesion, ENT_QUOTES, "UTF-8"); ?></strong></p>
                        <form action="procesar_carrito.php" method="post">
                            <input type="hidden" name="accion" value="cerrar_sesion">
                            <input type="submit" value="Cerrar sesión y vaciar carrito">
                        </form>
                    </div>
                </section>

                <hr>

                <!-- Listado de productos almacenados en el carrito (Colocado arriba para ver cambios al instante) -->
                <section>
                    <h3>Productos en tu Carrito</h3>
                    <p>Carrito asociado a la sesión de: <strong><?php echo htmlspecialchars($usuario_sesion, ENT_QUOTES, "UTF-8"); ?></strong></p>

                    <div class="tabla-contenedor">
                        <table>
                            <caption>Productos guardados durante la navegación</caption>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Modificar Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($carrito)): ?>
                                    <?php
                                    $total = 0;
                                    foreach ($carrito as $item):
                                        $subtotal = $item["precio"] * $item["cantidad"];
                                        $total += $subtotal;
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($item["imagen"], ENT_QUOTES, "UTF-8"); ?>" alt="<?php echo htmlspecialchars($item["nombre"], ENT_QUOTES, "UTF-8"); ?>" class="img-carrito">
                                            </td>
                                            <td><?php echo htmlspecialchars($item["nombre"], ENT_QUOTES, "UTF-8"); ?></td>
                                            <td>$<?php echo number_format($item["precio"], 2); ?></td>
                                            <td>
                                                <form action="procesar_carrito.php" method="post">
                                                    <input type="hidden" name="accion" value="modificar">
                                                    <input type="hidden" name="id_producto" value="<?php echo $item["id"]; ?>">
                                                    <input type="number" name="cantidad" value="<?php echo $item["cantidad"]; ?>" min="1" max="20" required>
                                                    <input type="submit" value="Modificar">
                                                </form>
                                            </td>
                                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                                            <td>
                                                <form action="procesar_carrito.php" method="post">
                                                    <input type="hidden" name="accion" value="eliminar">
                                                    <input type="hidden" name="id_producto" value="<?php echo $item["id"]; ?>">
                                                    <input type="submit" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">Tu carrito está vacío. Selecciona productos del catálogo inferior para agregarlos.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <?php if (!empty($carrito)): ?>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><strong>Total a pagar:</strong></td>
                                        <td colspan="2"><strong>$<?php echo number_format($total, 2); ?> MXN</strong></td>
                                    </tr>
                                </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                </section>

                <hr>

                <!-- Catálogo de componentes desde la base de datos -->
                <section>
                    <h3>Catálogo de Componentes y Accesorios</h3>
                    <p>Selecciona los productos que deseas añadir a tu carrito:</p>

                    <div class="tabla-contenedor">
                        <table>
                            <caption>Artículos disponibles en la base de datos</caption>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($resultado_productos && $resultado_productos->num_rows > 0): ?>
                                    <?php while ($fila = $resultado_productos->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($fila["imagen"], ENT_QUOTES, "UTF-8"); ?>" alt="<?php echo htmlspecialchars($fila["nombre"], ENT_QUOTES, "UTF-8"); ?>" class="img-catalogo">
                                            </td>
                                            <td><strong><?php echo htmlspecialchars($fila["nombre"], ENT_QUOTES, "UTF-8"); ?></strong></td>
                                            <td><?php echo htmlspecialchars($fila["descripcion"], ENT_QUOTES, "UTF-8"); ?></td>
                                            <td>$<?php echo number_format($fila["precio"], 2); ?></td>
                                            <td>
                                                <form action="procesar_carrito.php" method="post">
                                                    <input type="hidden" name="accion" value="agregar">
                                                    <input type="hidden" name="id_producto" value="<?php echo $fila["id"]; ?>">
                                                    <input type="number" name="cantidad" value="1" min="1" max="10" required>
                                                    <input type="submit" value="Añadir">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">No hay productos registrados en la base de datos.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            <?php endif; ?>
        </article>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2026 - Jesús Israel Catzim Tzuc.</p>
    </footer>

</body>
</html>
<?php $conexion->close(); ?>