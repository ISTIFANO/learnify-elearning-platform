CREATE DATABASE elearning_platform;
USE elearning_platform;

CREATE TABLE Roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL,
    role_description TEXT
) ENGINE=INNODB;

CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    role_id INT NOT NULL,
    photo VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL, 
    
    FOREIGN KEY (role_id) REFERENCES Roles(id)
) ENGINE=INNODB;

CREATE TABLE Tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT
) ENGINE=INNODB;

CREATE TABLE Categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT
) ENGINE=INNODB;

CREATE TABLE Cours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    user_id INT NOT NULL,
    categorie_id INT NOT NULL,
    photo VARCHAR(255) NOT NULL,
    
    FOREIGN KEY (user_id) REFERENCES Utilisateurs(id), 
    FOREIGN KEY (categorie_id) REFERENCES Categories(id)
) ENGINE=INNODB;

$CREATE TABLE Cours_Tags (
    cours_id INT,
    tag_id INT,
    PRIMARY KEY (cours_id, tag_id),
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tags(id)
) ENGINE=INNODB;

CREATE TABLE Inscription (
    etudiant_id INT,
    cours_id INT,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (etudiant_id, cours_id),
    FOREIGN KEY (etudiant_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (cours_id) REFERENCES Cours(id)
) ENGINE=INNODB;

INSERT INTO Roles (role_name, role_description) VALUES
('ADMIN', 'Administrateur de la plateforme'),
('TEACHER', 'Enseignant'),
('STUDENT', 'Étudiant');
