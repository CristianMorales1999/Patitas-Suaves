CREATE DATABASE IF NOT EXISTS bd_sistema_de_adopcion_de_mascotas;
USE bd_sistema_de_adopcion_de_mascotas;

CREATE TABLE EstadoMascota (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE EstadoImagen (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE EstadoComentario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE EstadoPublicacion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Temperamento (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  temperamento VARCHAR(45) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE IP (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ip VARCHAR(45) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE EstadoUsuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Departamento (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  departamento VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Alergia (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(70) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Vacuna (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(70) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE EstadoAdopcion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  estado VARCHAR(70) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Enfermedad (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(70) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Provincia (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Departamento_id INTEGER UNSIGNED NOT NULL,
  provincia VARCHAR(70) NULL,
  PRIMARY KEY(id),
  INDEX Provincia_FKIndex1(Departamento_id),
  FOREIGN KEY(Departamento_id)
    REFERENCES Departamento(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Distrito (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Provincia_id INTEGER UNSIGNED NOT NULL,
  distrito VARCHAR(70) NULL,
  PRIMARY KEY(id),
  INDEX Distrito_FKIndex1(Provincia_id),
  FOREIGN KEY(Provincia_id)
    REFERENCES Provincia(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Ubigeo (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Departamento_id INTEGER UNSIGNED NOT NULL,
  Provincia_id INTEGER UNSIGNED NOT NULL,
  Distrito_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  INDEX Ubigeo_FKIndex1(Distrito_id),
  INDEX Ubigeo_FKIndex2(Provincia_id),
  INDEX Ubigeo_FKIndex3(Departamento_id),
  FOREIGN KEY(Distrito_id)
    REFERENCES Distrito(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Provincia_id)
    REFERENCES Provincia(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Departamento_id)
    REFERENCES Departamento(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ubigeo_id INTEGER UNSIGNED NULL,
  EstadoUsuario_id INTEGER UNSIGNED NOT NULL,
  dni VARCHAR(8) NULL,
  usuario VARCHAR(45) NULL,
  user_password VARCHAR(150) NULL,
  rol TINYINT UNSIGNED NULL,
  correo VARCHAR(100) NULL,
  nombre VARCHAR(70) NULL,
  apellidos VARCHAR(100) NULL,
  sexo TINYINT UNSIGNED NULL,
  direccion VARCHAR(100) NULL,
  celular INTEGER UNSIGNED NULL,
  trabajoOcupacion VARCHAR(100) NULL,
  mascotasPasadas TINYINT UNSIGNED NULL,
  mascotasActualidad TINYINT UNSIGNED NULL,
  estadoCivil VARCHAR(20) NULL,
  nroDeHijos INTEGER UNSIGNED NULL,
  nroDeIntegrantesFamilia INTEGER UNSIGNED NULL,
  fechaDeRegistro DATE NULL,
  PRIMARY KEY(id),
  INDEX Usuario_FKIndex1(EstadoUsuario_id),
  INDEX Usuario_FKIndex2(Ubigeo_id),
  FOREIGN KEY(EstadoUsuario_id)
    REFERENCES EstadoUsuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Ubigeo_id)
    REFERENCES Ubigeo(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Mascota (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EstadoMascota_id INTEGER UNSIGNED NOT NULL,
  Usuario_id INTEGER UNSIGNED NOT NULL,
  nombre VARCHAR(45) NULL,
  especie VARCHAR(45) NULL,
  raza VARCHAR(45) NULL,
  fechaDeNacimiento DATE NULL,
  sexo VARCHAR(6) NULL,
  tamanio VARCHAR(7) NULL,
  colores VARCHAR(100) NULL,
  cantidadDePelaje VARCHAR(7) NULL,
  estadoDeSalud VARCHAR(70) NULL,
  esterilizacion TINYINT UNSIGNED NULL,
  disponibilidad TINYINT UNSIGNED NULL,
  descripcion TEXT NULL,
  fechaDeRegistro DATE NULL,
  PRIMARY KEY(id),
  INDEX Mascota_FKIndex1(Usuario_id),
  INDEX Mascota_FKIndex2(EstadoMascota_id),
  FOREIGN KEY(Usuario_id)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(EstadoMascota_id)
    REFERENCES EstadoMascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Visita (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Mascota_id INTEGER UNSIGNED NOT NULL,
  IP_id INTEGER UNSIGNED NOT NULL,
  fecha DATE NULL,
  hora TIME NULL,
  PRIMARY KEY(id),
  INDEX Estadisticas_FKIndex1(IP_id),
  INDEX Estadisticas_FKIndex2(Mascota_id),
  FOREIGN KEY(IP_id)
    REFERENCES IP(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Mascota_has_Enfermedad (
  Mascota_id INTEGER UNSIGNED NOT NULL,
  Enfermedad_id INTEGER UNSIGNED NOT NULL,
  fechaDeDiagnostico DATE NULL,
  PRIMARY KEY(Mascota_id, Enfermedad_id),
  INDEX Mascota_has_Enfermedad_FKIndex1(Mascota_id),
  INDEX Mascota_has_Enfermedad_FKIndex2(Enfermedad_id),
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Enfermedad_id)
    REFERENCES Enfermedad(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Mascota_has_Alergia (
  Mascota_id INTEGER UNSIGNED NOT NULL,
  Alergia_id INTEGER UNSIGNED NOT NULL,
  fechaDeDeteccion DATE NULL,
  PRIMARY KEY(Mascota_id, Alergia_id),
  INDEX Mascota_has_Alergia_FKIndex1(Mascota_id),
  INDEX Mascota_has_Alergia_FKIndex2(Alergia_id),
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Alergia_id)
    REFERENCES Alergia(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Adopcion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EstadoAdopcion_id INTEGER UNSIGNED NOT NULL,
  Mascota_id INTEGER UNSIGNED NOT NULL,
  id_usuario_adoptante INTEGER UNSIGNED NOT NULL,
  id_usuario_dador INTEGER UNSIGNED NOT NULL,
  fechaDeRegistro DATE NULL,
  fechaDeConfirmacion DATE NULL,
  motivo VARCHAR(255) NULL,
  PRIMARY KEY(id),
  INDEX Adopcion_FKIndex1(id_usuario_dador),
  INDEX Adopcion_FKIndex2(id_usuario_adoptante),
  INDEX Adopcion_FKIndex3(Mascota_id),
  INDEX Adopcion_FKIndex4(EstadoAdopcion_id),
  FOREIGN KEY(id_usuario_dador)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_usuario_adoptante)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(EstadoAdopcion_id)
    REFERENCES EstadoAdopcion(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Publicacion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EstadoPublicacion_id INTEGER UNSIGNED NOT NULL,
  Usuario_id INTEGER UNSIGNED NOT NULL,
  titulo VARCHAR(70) NULL,
  descripcion TEXT NULL,
  tipo VARCHAR(45) NULL,
  fechaDePublicacion DATE NULL,
  horaDePublicacion TIME NULL,
  nroDeReacciones INTEGER UNSIGNED NULL,
  PRIMARY KEY(id),
  INDEX Publicacion_FKIndex1(Usuario_id),
  INDEX Publicacion_FKIndex2(EstadoPublicacion_id),
  FOREIGN KEY(Usuario_id)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(EstadoPublicacion_id)
    REFERENCES EstadoPublicacion(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Temperamento_has_Mascota (
  Temperamento_id INTEGER UNSIGNED NOT NULL,
  Mascota_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Temperamento_id, Mascota_id),
  INDEX Temperamento_has_Mascota_FKIndex1(Temperamento_id),
  INDEX Temperamento_has_Mascota_FKIndex2(Mascota_id),
  FOREIGN KEY(Temperamento_id)
    REFERENCES Temperamento(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Mascota_has_Vacuna (
  Mascota_id INTEGER UNSIGNED NOT NULL,
  Vacuna_id INTEGER UNSIGNED NOT NULL,
  fechaDeVacunacion DATE NULL,
  PRIMARY KEY(Mascota_id, Vacuna_id),
  INDEX Mascota_has_Vacuna_FKIndex1(Mascota_id),
  INDEX Mascota_has_Vacuna_FKIndex2(Vacuna_id),
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Vacuna_id)
    REFERENCES Vacuna(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Comentario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EstadoComentario_id INTEGER UNSIGNED NOT NULL,
  Usuario_id INTEGER UNSIGNED NOT NULL,
  Publicacion_id INTEGER UNSIGNED NOT NULL,
  texto TEXT NULL,
  fecha DATE NULL,
  hora TIME NULL,
  nroDeReacciones INTEGER UNSIGNED NULL,
  PRIMARY KEY(id),
  INDEX Comentario_FKIndex1(Publicacion_id),
  INDEX Comentario_FKIndex2(Usuario_id),
  INDEX Comentario_FKIndex3(EstadoComentario_id),
  FOREIGN KEY(Publicacion_id)
    REFERENCES Publicacion(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Usuario_id)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(EstadoComentario_id)
    REFERENCES EstadoComentario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

CREATE TABLE Imagen (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EstadoImagen_id INTEGER UNSIGNED NOT NULL,
  Usuario_id INTEGER UNSIGNED NULL,
  Mascota_id INTEGER UNSIGNED NULL,
  Comentario_id INTEGER UNSIGNED NULL,
  Publicacion_id INTEGER UNSIGNED NULL,
  url VARCHAR(255) NULL,
  PRIMARY KEY(id),
  INDEX Imagen_FKIndex1(Publicacion_id),
  INDEX Imagen_FKIndex2(Comentario_id),
  INDEX Imagen_FKIndex3(Mascota_id),
  INDEX Imagen_FKIndex4(EstadoImagen_id),
  INDEX Imagen_FKIndex5(Usuario_id),
  FOREIGN KEY(Publicacion_id)
    REFERENCES Publicacion(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Comentario_id)
    REFERENCES Comentario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Mascota_id)
    REFERENCES Mascota(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(EstadoImagen_id)
    REFERENCES EstadoImagen(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION,
  FOREIGN KEY(Usuario_id)
    REFERENCES Usuario(id)
      ON DELETE  CASCADE
      ON UPDATE NO ACTION
);

