DROP DATABASE IF EXISTS portfolio;

CREATE DATABASE portfolio;

USE portfolio;

CREATE TABLE projet (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    projet_nom VARCHAR(200),
    projet_img_carte VARCHAR(250),
    projet_line VARCHAR(250),
    projet_description VARCHAR(250),
    projet_url VARCHAR(250),
    projet_titre1 VARCHAR(50),
    projet_titre2 VARCHAR(50),
    projet_titre3 VARCHAR(50),
    projet_screen1 VARCHAR(250),
    projet_screen2 VARCHAR(250),
    projet_screen3 VARCHAR(250),
    projet_text1 VARCHAR(250),
    projet_text2 VARCHAR(250),
    projet_text3 VARCHAR(250),
    projet_git VARCHAR(250),
    projet_cdc VARCHAR(250)
);

CREATE TABLE comp (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comp_nom VARCHAR(200)
);

CREATE TABLE tech (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tech_nom VARCHAR(250)
);

CREATE TABLE projet_comp (
    projet_id INT UNSIGNED,
    comp_id INT UNSIGNED,
    UNIQUE(projet_id, comp_id),
    FOREIGN KEY (projet_id) REFERENCES projet(id),
    FOREIGN KEY (comp_id) REFERENCES comp(id)
);

CREATE TABLE projet_tech (
    projet_id INT UNSIGNED,
    tech_id INT UNSIGNED,
    UNIQUE(projet_id, tech_id),
    FOREIGN KEY (projet_id) REFERENCES projet(id),
    FOREIGN KEY (tech_id) REFERENCES tech(id)
);

GRANT ALL PRIVILEGES ON course.* TO 'admin'@'localhost';

INSERT INTO tech (tech_nom) VALUES ("Javascript"),("PHP"),("MySQL");

INSERT INTO comp (comp_nom) VALUES 
("Réaliser une interface utilisateur web statique et adaptable"),
("Développer une interface utilisateur web dynamique"),
("Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce"),
("Créer une base de données"),
("Développer les composants d'accès aux données"),
("Développer la partie back-end d'une application web ou web mobile"),
("Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu ou e-commerce");


