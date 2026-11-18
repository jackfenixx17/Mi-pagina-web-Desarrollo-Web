<?php
// Iniciar o recuperar la sesión
session_start();
require_once 'conexion.php';

// Inicializar el carrito en la sesión si no existe
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

// Procesar las solicitudes enviadas por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accion = $_POST["accion"] ?? "";

    // Guardar el nombre del usuario en la sesión
    if ($accion === "guardar_usuario") {
        $usuario = trim($_POST["usuario"] ?? "");
        if ($usuario !== "") {
            $_SESSION["usuario"] = $usuario;
        }
    }

    // Cerrar la sesión eliminando datos y cookie de sesión
    elseif ($accion === "cerrar_sesion") {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $parametros = session_get_cookie_params();
            setcookie(
                session_name(),
                "",
                time() - 42000,
                $parametros["path"],
                $parametros["domain"],
                $parametros["secure"],
                $parametros["httponly"]
            );
        }

        session_destroy();
    }

    // Añadir producto al carrito consultando la base de datos
    elseif ($accion === "agregar") {
        $id_producto = (int) ($_POST["id_producto"] ?? 0);
        $cantidad = (int) ($_POST["cantidad"] ?? 1);

        if ($id_producto > 0 && $cantidad > 0) {
            if (isset($_SESSION["carrito"][$id_producto])) {
                $_SESSION["carrito"][$id_producto]["cantidad"] += $cantidad;
            } else {
                $stmt = $conexion->prepare("SELECT id, nombre, precio, imagen FROM productos WHERE id = ?");
                $stmt->bind_param("i", $id_producto);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($producto = $resultado->fetch_assoc()) {
                    $_SESSION["carrito"][$id_producto] = [
                        "id" => $producto["id"],
                        "nombre" => $producto["nombre"],
                        "precio" => (float) $producto["precio"],
                        "imagen" => $producto["imagen"],
                        "cantidad" => $cantidad
                    ];
                }
                $stmt->close();
            }
        }
    }

    // Modificar la cantidad de un producto en el carrito
    elseif ($accion === "modificar") {
        $id_producto = (int) ($_POST["id_producto"] ?? 0);
        $cantidad = (int) ($_POST["cantidad"] ?? 1);

        if (isset($_SESSION["carrito"][$id_producto])) {
            if ($cantidad > 0) {
                $_SESSION["carrito"][$id_producto]["cantidad"] = $cantidad;
            } else {
                unset($_SESSION["carrito"][$id_producto]);
            }
        }
    }

    // Eliminar un producto del carrito
    elseif ($accion === "eliminar") {
        $id_producto = (int) ($_POST["id_producto"] ?? 0);
        if (isset($_SESSION["carrito"][$id_producto])) {
            unset($_SESSION["carrito"][$id_producto]);
        }
    }
}

$conexion->close();

// Redirigir de vuelta al carrito
header("Location: carrito.php");
exit;
?>