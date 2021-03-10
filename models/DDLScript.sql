
CREATE TABLE Climatizacion (
	climatizacionId int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (climatizacionId)
);

INSERT INTO `climatizacion` (`climatizacionId`, `nombre`) 
VALUES 	(NULL, 'calefaccion'), 
		(NULL, 'aire acondicionado');

CREATE TABLE Arr_telefono (
	arrendadorId int(11) NOT NULL,
	telefono int(11) NOT NULL,
	PRIMARY KEY (arrendadorId, telefono)
);

CREATE TABLE Arrendador (
	arrendadorId int(11) NOT NULL AUTO_INCREMENT,
	nombres varchar(50) NOT NULL,
	apellidos varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	clave varchar(50) NOT NULL,
	PRIMARY KEY (arrendadorId)
);



CREATE TABLE Region (
	regionId int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (regionId)
);

INSERT INTO Region
VALUES  (1, 'Andina'),
        (2, 'Amazonia'),
        (3, 'Caribe'),
        (4, 'Orinoquia'),
		(5, 'Pacifico');

CREATE TABLE Ciudad (
	ciudadId int(11) NOT NULL AUTO_INCREMENT,
	regionId int NOT NULL,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (ciudadId),
	FOREIGN KEY(regionId) REFERENCES Region (regionId)
);

INSERT INTO Ciudad
VALUES  (1, 1,'Medellín'),
        (2, 1, 'Tunja'),
        (3, 1, 'Manizales'),
        (4, 1, 'Bogotá'),
        (5, 1, 'Tolima'),
		(6, 1, 'Cúcuta'),
		(7, 2,'Leticia'),
        (8, 2, 'Florencia'),
        (9, 2, 'Puerto Inírida'),
        (10, 2, 'San José'),
        (11, 2, 'Mocoa'),
		(12, 2, 'Mitú'),
		(13, 3, 'Barranquilla'),
        (14, 3, 'Cartagena'),
        (15, 3, 'valledupar'),
        (16, 3, 'Monteria'),
        (17, 3, 'Riohacha'),
		(18, 3, 'San Andrés'),
		(19, 4, 'Villavicencio'),
        (20, 4, 'Puerto Carreño'),
        (21, 4, 'Yopal'),
        (22, 4, 'Arauca'),
        (23, 5, 'Quibdó'),
		(24, 5, 'Cali'),
		(25, 5, 'Popayán'),
		(26, 5, 'Pasto');		

CREATE TABLE Zona (
	zonaId int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (zonaId)
);

INSERT INTO Zona
VALUES  (1,'Rural'),
        (2, 'Semi Rural'),
        (3, 'Urbanizada');

CREATE TABLE Barrio (
	barrioId int(11) NOT NULL AUTO_INCREMENT,
	ciudadId int NOT NULL,
	zonaId int NOT NULL,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (barrioId),
	FOREIGN KEY(ciudadId) REFERENCES Ciudad (ciudadId),
	FOREIGN KEY(zonaId) REFERENCES Zona (zonaId)
);

INSERT INTO Barrio
VALUES  (1, 1, 1,'Santa Cruz'),
        (2, 1, 1, 'Manrique'),
        (3, 2, 2, 'Altos de San Diego'),
        (4, 2, 3, 'Aquimin'),
        (5, 3, 1, 'Ecoturistico Cerro de Oro'),
		(6, 3, 2, 'La Fuente'),
		(7, 4, 2,'La Cabrera'),
        (8, 4, 3, 'Chico Norte'),
        (9, 5, 3, 'Centenario'),
        (10, 5, 1, 'Clarita Botero'),
        (11, 6, 1, 'Acuarela'),
		(12, 6, 2, 'La Rinconada'),
		(13, 7, 2,'Castañal'),
        (14, 7, 2, 'Ciudad Jardín'),
        (15, 8, 3, 'Santa Maria Novella'),
        (16, 8, 1, 'Siena'),
        (17, 9, 1, 'Pajuil'),
		(18, 9, 1, 'La Cabaña Guainiana'),
		(19, 10, 2,'Araza'),
        (20, 10, 2, 'La Paz'),
        (21, 11, 1, 'San miguel'),
        (22, 11, 3, 'Laureles'),
        (23, 12, 2, 'Pueblo nuevo'),
		(24, 12, 1, 'Macaquiño'),
		(25, 13, 1,'Metropolitana.'),
        (26, 13, 1, 'Las Colinas'),
        (27, 14, 2, 'La Campiña'),
        (28, 14, 3, 'Nuevo Bosque'),
        (29, 15, 1, 'Alamos II'),
		(30, 15, 2, 'Belgica'),
		(31, 16, 2,'Granja Nal'),
        (32, 16, 3, 'Pringamosa'),
        (33, 17, 3, 'Jorge Perez'),
        (34, 17, 1, 'Prudencio Padilla'),
        (35, 18, 1, 'Atto Harmony hall'),
		(36, 18, 2, 'Orange Hill'),
		(37, 19, 2,'San Benito'),
        (38, 19, 2, 'La Alborada'),
        (39, 20, 3, 'Tierra Azul'),
        (40, 20, 1, 'La Rioca'),
        (41, 21, 1, 'El Resurgimiento'),
		(42, 21, 1, 'San Jose De Yopal'),
		(43, 22, 2,'Villa Maria'),
        (44, 22, 2, 'Flor De Mi LLano '),
        (45, 23, 1, 'Porvenir'),
        (46, 23, 3, 'Mosquera Garces'),
        (47, 24, 2, 'Lleras Camargo'),
		(48, 24, 1, 'Belalcazar'),
		(49, 25, 1, 'Carlos Primero'),
        (50, 25, 3, 'Villa Mercedes'),
        (51, 26, 2, 'Barrio Capusigra'),
		(52, 26, 1, 'Pucalpa');



CREATE TABLE Tipo (
	tipoId int(11)NOT NULL AUTO_INCREMENT,
	nombre VARCHAR (50) NOT NULL,
	PRIMARY KEY (tipoId)
);

INSERT INTO `tipo` (`tipoId`, `nombre`) 
VALUES 	(NULL, 'Casa'), 
		(NULL, 'Cabania');

CREATE TABLE Alojamiento (
	alojamientoId int(11) NOT NULL AUTO_INCREMENT,
	arrendadorId int NOT NULL,
	tipoId int NOT NULL,
	climatizacionId int NOT NULL,
	barrioId int NOT NULL,
	direccion varchar(20) NOT NULL,
	capacidadPersonas int NOT NULL,
	soporteMascotas int NOT NULL,
	noHabitaciones int NOT NULL,
	noBanios int NOT NULL,
	costoDiario int ,
	PRIMARY KEY (alojamientoId),
	FOREIGN KEY(climatizacionId) REFERENCES Climatizacion (climatizacionId),
	FOREIGN KEY (tipoId) REFERENCES Tipo (tipoId),
	FOREIGN KEY(arrendadorId) REFERENCES Arrendador (arrendadorId)
);

CREATE TABLE Foto (
	fotoId int(11) NOT NULL AUTO_INCREMENT,
	alojamientoId int NOT NULL,
	ubicacion varchar(50) NOT NULL,
	PRIMARY KEY (fotoId),
	FOREIGN KEY(alojamientoId) REFERENCES Alojamiento (alojamientoId)
);

CREATE TABLE Nacionalidad (
	nacionalidadId int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	PRIMARY KEY (nacionalidadId)
);

INSERT INTO `nacionalidad` (`nacionalidadId`, `nombre`) VALUES
 (NULL, 'Americana'), 
 (NULL, 'Latinoamericana'), 
 (NULL, 'Europea'), 
 (NULL, 'Asiatica'),
 (NULL, 'Ninguna');

CREATE TABLE Usuario (
	usuarioId int(11) NOT NULL AUTO_INCREMENT,
	nacionalidadId int NOT NULL,
	nombres varchar(50) NOT NULL,
	apellidos varchar(50) NOT NULL,
	residencia varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	clave varchar(50) NOT NULL,
	PRIMARY KEY (usuarioId),
	FOREIGN KEY(nacionalidadId) REFERENCES Nacionalidad (nacionalidadId)
);

CREATE TABLE Usu_telefono (
	usuarioId int(11) NOT NULL,
	telefono int(11) NOT NULL,
	PRIMARY KEY (usuarioId, telefono)
);

CREATE TABLE Encuesta (
	idEncuesta int(11) NOT NULL AUTO_INCREMENT,
	usuarioId int NOT NULL,
	alojamientoId int NOT NULL,
	calificacion int NOT NULL,
	detalles varchar(200) NOT NULL,
	PRIMARY KEY (idEncuesta),
	FOREIGN KEY(usuarioId) REFERENCES Usuario (usuarioId),
	FOREIGN KEY(alojamientoId) REFERENCES Alojamiento (alojamientoId)
);

CREATE TABLE Reserva (
	reservaId int(11) NOT NULL AUTO_INCREMENT,
	usuarioId int NOT NULL,
	alojamientoId int NOT NULL,
	fechaInicio DATE NOT NULL,
	fechaFin DATE NOT NULL,
	noPersonas int NOT NULL,
	noMascotas int NOT NULL,
	pagoTotal int NOT NULL,
	PRIMARY KEY (reservaId),
	FOREIGN KEY(usuarioId) REFERENCES Usuario (usuarioId),
	FOREIGN KEY(alojamientoId) REFERENCES Alojamiento (alojamientoId)
);

CREATE TABLE Estado (
	estadoId int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	detalles varchar(50) NOT NULL,
	PRIMARY KEY (estadoId)
);

INSERT INTO `estado` (`estadoId`, `nombre`, `detalles`) VALUES 
(NULL, 'Procesando pago', 'esperando fondos'), 
(NULL, 'Pago aceptado', 'fondos depositados exitosamente'), 
(NULL, 'Pago rechazado', 'la transaccion fallo');

CREATE TABLE Pago (
	pagoId int(11) NOT NULL AUTO_INCREMENT,
	reservaId int NOT NULL,
	estadoId int NOT NULL DEFAULT '1',
	fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	cantidad int NOT NULL,
	PRIMARY KEY (pagoId),
	FOREIGN KEY(reservaId) REFERENCES Reserva (reservaId),
	FOREIGN KEY(estadoId) REFERENCES Estado (estadoId)
);




