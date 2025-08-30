CREATE DATABASE IF NOT EXISTS abarrotes;
USE abarrotes;

-- Lácteos
CREATE TABLE IF NOT EXISTS lacteos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    estado VARCHAR(30) NOT NULL
);

INSERT INTO lacteos (nombre, cantidad, estado) VALUES
('Leche', 100, 'Suficiente'),
('Queso', 50, 'Suficiente'),
('Crema', 30, 'Suficiente'),
('Yogur', 70, 'Suficiente');

-- Dulces
CREATE TABLE IF NOT EXISTS dulces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    estado VARCHAR(30) NOT NULL
);

INSERT INTO dulces (nombre, cantidad, estado) VALUES
('Paleta', 200, 'Suficiente'),
('Chocolate', 120, 'Suficiente'),
('Chicle', 300, 'Suficiente');

-- Galletas
CREATE TABLE IF NOT EXISTS galletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    estado VARCHAR(30) NOT NULL
);

INSERT INTO galletas (nombre, cantidad, estado) VALUES
('Marías', 80, 'Suficiente'),
('Oreo', 60, 'Suficiente'),
('Chokis', 90, 'Suficiente');

-- Papitas
CREATE TABLE IF NOT EXISTS papitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    estado VARCHAR(30) NOT NULL
);

INSERT INTO papitas (nombre, cantidad, estado) VALUES
('Sabritas', 100, 'Suficiente'),
('Doritos', 70, 'Suficiente'),
('Ruffles', 50, 'Suficiente');

-- Variados
CREATE TABLE IF NOT EXISTS variados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    estado VARCHAR(30) NOT NULL
);

INSERT INTO variados (nombre, cantidad, estado) VALUES
('Refresco', 150, 'Suficiente'),
('Agua', 200, 'Suficiente'),
('Jugo', 90, 'Suficiente');
