-- Crear la base de datos de mi página web
CREATE DATABASE IF NOT EXISTS portafolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portafolio_db;

-- Tabla para almacenar los mensajes del formulario de contacto
CREATE TABLE IF NOT EXISTS mensajes_contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    perfil VARCHAR(50) NOT NULL,
    motivo VARCHAR(50) NOT NULL,
    intereses VARCHAR(150) NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para el catálogo de proyectos académicos
CREATE TABLE IF NOT EXISTS proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    lenguaje VARCHAR(80) NOT NULL,
    descripcion TEXT NOT NULL,
    semestre VARCHAR(30) NOT NULL
);

-- Registros iniciales de proyectos
INSERT INTO proyectos (titulo, lenguaje, descripcion, semestre) VALUES
('Mi página web (ADA 4)', 'PHP, HTML5, CSS3, JS, MariaDB', 'Integración de mi página web personal con scripts del lado del servidor en Apache y base de datos.', 'Actual'),
('PosCafé', 'Java, MySQL', 'Sistema de punto de venta para cafeterías conectado a base de datos relacional.', 'Actual'),
('Let''s Go Vet', 'React, Vite, CSS Grid', 'Aplicación web para clínicas veterinarias con validación de formularios y calculadora de costos.', 'Actual');

-- Tabla de productos para la tienda de componentes (ADA 5)
DROP TABLE IF EXISTS productos;
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(100) NOT NULL
);

-- Registros de los 8 componentes y accesorios de computación
INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES
('Tarjeta de Video GIGABYTE Radeon RX 7600', '8GB GDDR6, 128-bit, PCIe 4.0, Windforce.', 6499.00, 'imagenes/tarjetadevideo.png'),
('Tarjeta Madre Asus ROG STRIX B550-F', 'Socket AM4, ATX, DDR4 y Wi-Fi II integrado.', 2599.00, 'imagenes/tarjetamadre.jpg'),
('Control Sony PlayStation 5 DualSense', 'Inalámbrico Bluetooth, USB-C, color blanco.', 1499.00, 'imagenes/controlgamer.png'),
('Laptop MSI Crosshair 16 HX', 'Intel Core i9, RTX 5070 8GB, 16GB DDR5, 512GB SSD.', 38999.00, 'imagenes/laptopmsi.png'),
('Enfriamiento Líquido TCOMAS NEOX 360', 'AIO 360mm con pantalla LCD curva y 3 ventiladores RGB.', 3999.00, 'imagenes/enfriamientoliquido.png'),
('Monitor Gamer MSI MAG 27"', 'Panel QD-OLED WQHD, 240Hz, 0.03ms.', 7499.00, 'imagenes/monitorgamer.png'),
('Computadora PRIDE GAMING ECLIPSE V2', 'Ryzen 5 5600XT, RTX 5060 Ti 16GB, 16GB RAM, 1TB SSD.', 29999.00, 'imagenes/computadorapride.jpg'),
('Silla Gamer TX3 FLEX Pro Mesh', 'Malla transpirable, soporte lumbar y reposabrazos 5D.', 5499.00, 'imagenes/sillagamer.png');
