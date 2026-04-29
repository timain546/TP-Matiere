CREATE DATABASE TP_Matiere;
USE TP_Matiere;

CREATE TABLE Matiere (
    code_matiere VARCHAR(6) NOT NULL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE Etudiant (
    id VARCHAR(9) NOT NULL PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE Notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant VARCHAR(9) REFERENCES Etudiant(id),
    code_matiere VARCHAR(6) REFERENCES Matiere(code_matiere),
    note FLOAT
);

CREATE TABLE Parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    responsable VARCHAR(50)
);

CREATE TABLE ParcoursMatiere (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_matiere VARCHAR(6) REFERENCES Matiere(code_matiere),
    id_parcours INT REFERENCES Parcours(id),
    choix ENUM("obligatoire", "choix_info", "choix_math") DEFAULT "obligatoire",
    credit INT
);