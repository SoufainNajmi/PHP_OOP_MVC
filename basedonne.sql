-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_stock;
USE gestion_stock;

-- Table des catégories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
