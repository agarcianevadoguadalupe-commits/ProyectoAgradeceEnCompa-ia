CREATE TABLE alumnos (
    nOrdenador char(2) PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    usuario varchar(50) UNIQUE NOT NULL,
    pwd varchar(255) NOT NULL,
    pagweb varchar(100) NOT NULL,
    nArchivo varchar(100) UNIQUE NOT NULL
)

CREATE TABLE mensajes (
    idMensaje smallint PRIMARY KEY AUTO_INCREMENT,
    mensaje varchar(255) NOT NULL,
    fecha date NULL,
    idEmisor char(2) NOT NULL,
    idReceptor char(2) NOT NULL,

    CONSTRAINT ER_diferente CHECK (idEmisor <> idReceptor),
    CONSTRAINT emisor_receptor UNIQUE (idEmisor, idReceptor)
);