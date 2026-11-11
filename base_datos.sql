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