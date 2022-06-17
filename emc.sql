CREATE DATABASE emc;
USE emc;

CREATE TABLE usuario(
id_usuario INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(100),
email VARCHAR(100),
telefono VARCHAR(50),
boleta VARCHAR(50),
password VARCHAR(100),
CONSTRAINT PK_IUSU PRIMARY KEY(id_usuario))
ENGINE INNODB;

CREATE TABLE diario(
id_diario INT NOT NULL AUTO_INCREMENT,
fecha DATE,
entrada VARCHAR(1000000),
id_usuario1 int,
CONSTRAINT PK_IDIA PRIMARY KEY(id_diario),
CONSTRAINT FK_IUSU1 FOREIGN KEY(id_usuario1) REFERENCES usuario(id_usuario) ON DELETE SET NULL)
ENGINE INNODB;

CREATE TABLE amor(
id_amor INT NOT NULL AUTO_INCREMENT,
emamor VARCHAR(1000),
CONSTRAINT PK_IAMO PRIMARY KEY(id_amor))
ENGINE INNODB;
INSERT INTO amor (id_amor,emamor) VALUES (1,'Aceptado'),(2,'Gentil'),(3,'Afectuoso'),(4,'Apasionado'),(5,'Confiado'),(6,'Enamorado');

CREATE TABLE miedo(
id_miedo INT NOT NULL AUTO_INCREMENT,
emmiedo VARCHAR(1000),
CONSTRAINT PK_IMIE PRIMARY KEY(id_miedo))
ENGINE INNODB;
INSERT INTO miedo (id_miedo,emmiedo) VALUES (1,'Avergonzado'),(2,'Vulnerable'),(3,'Rechazado'),(4,'Inseguro'),(5,'Preocupado'),(6,'Asustado');

CREATE TABLE enojo(
id_enojo INT NOT NULL AUTO_INCREMENT,
emenojo VARCHAR(1000),
CONSTRAINT PK_IENO PRIMARY KEY(id_enojo))
ENGINE INNODB;
INSERT INTO enojo (id_enojo,emenojo) VALUES (1,'Amenazado'),(2,'Furioso'),(3,'Ofendido'),(4,'Frustrado'),(5,'Irritado'),(6,'Agresivo');

CREATE TABLE tristeza(
id_tristeza INT NOT NULL AUTO_INCREMENT,
emtristeza VARCHAR(1000),
CONSTRAINT PK_ITRI PRIMARY KEY(id_tristeza))
ENGINE INNODB;
INSERT INTO tristeza (id_tristeza,emtristeza) VALUES (1,'Lastimado'),(2,'Culpable'),(3,'Solitario'),(4,'Indiferente'),(5,'Aburrido'),(6,'Ansioso');

CREATE TABLE felicidad(
id_felicidad INT NOT NULL AUTO_INCREMENT,
emfelicidad VARCHAR(1000),
CONSTRAINT PK_IFEL PRIMARY KEY(id_felicidad))
ENGINE INNODB;
INSERT INTO felicidad (id_felicidad,emfelicidad) VALUES (1,'Seguro'),(2,'Agradecido'),(3,'Optimista'),(4,'Relajado'),(5,'Entusiasmado'),(6,'Orgulloso');

CREATE TABLE sorpresa(
id_sorpresa INT NOT NULL AUTO_INCREMENT,
emsorpresa VARCHAR(1000),
CONSTRAINT PK_ISOR PRIMARY KEY(id_sorpresa))
ENGINE INNODB;
INSERT INTO sorpresa (id_sorpresa,emsorpresa) VALUES (1,'Eufórico'),(2,'Abrumado'),(3,'Confundido'),(4,'Asombrado'),(5,'Impactado'),(6,'Inquieto');

CREATE TABLE repugnancia(
id_repugnancia INT NOT NULL AUTO_INCREMENT,
emrepugnancia VARCHAR(1000),
CONSTRAINT PK_IREP PRIMARY KEY(id_repugnancia))
ENGINE INNODB;
INSERT INTO repugnancia (id_repugnancia,emrepugnancia) VALUES (1,'Decepcionado'),(2,'Resentido'),(3,'Amargado'),(4,'Crítico'),(5,'Evasivo'),(6,'Culpable');

CREATE TABLE emociones(
id_usuario2 INT,
id_amor1 INT,
id_miedo1 INT,
id_enojo1 INT,
id_tristeza1 INT,
id_felicidad1 INT,
id_sorpresa1 INT,
id_repugnancia1 INT,
CONSTRAINT FK_IUSU2 FOREIGN KEY(id_usuario2) REFERENCES usuario(id_usuario) ON DELETE SET NULL,
CONSTRAINT FK_IAMO1 FOREIGN KEY(id_amor1) REFERENCES amor(id_amor) ON DELETE SET NULL,
CONSTRAINT FK_IMIE1 FOREIGN KEY(id_miedo1) REFERENCES miedo(id_miedo) ON DELETE SET NULL,
CONSTRAINT FK_IENO1 FOREIGN KEY(id_enojo1) REFERENCES enojo(id_enojo) ON DELETE SET NULL,
CONSTRAINT FK_ITRI1 FOREIGN KEY(id_tristeza1) REFERENCES tristeza(id_tristeza) ON DELETE SET NULL,
CONSTRAINT FK_ISOR1 FOREIGN KEY(id_sorpresa1) REFERENCES sorpresa(id_sorpresa) ON DELETE SET NULL,
CONSTRAINT FK_IREP1 FOREIGN KEY(id_repugnancia1) REFERENCES repugnancia(id_repugnancia) ON DELETE SET NULL)
ENGINE INNODB;

