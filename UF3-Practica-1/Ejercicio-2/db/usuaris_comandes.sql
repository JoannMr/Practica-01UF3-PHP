CREATE DATABASE IF NOT EXISTS exercici2;
USE exercici2;

-- Creación de la tabla usuaris
CREATE TABLE IF NOT EXISTS usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(100)
);

-- Creación de la tabla comandes
CREATE TABLE IF NOT EXISTS comandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuari_id INT,
    producte VARCHAR(100),
    preu DECIMAL(10,2),
    FOREIGN KEY (usuari_id) REFERENCES usuaris(id)
);

-- Insertar datos en la tabla usuaris
INSERT INTO usuaris (nom, email) VALUES
('Anna', 'anna@example.com'),
('Joan', 'joan@example.com'),
('Marta', 'marta@example.com');

-- Insertar datos en la tabla comandes
INSERT INTO comandes (usuari_id, producte, preu) VALUES
(1, 'Portàtil', 1200.50),
(2, 'Auriculars', 50.00),
(1, 'Ratolí', 25.99);
