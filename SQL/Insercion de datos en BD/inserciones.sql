USE bd_sistema_de_adopcion_de_mascotas;


#-----------------------------------------------------------------------------
#-------------------------- Inserciones en tabla Alergia ---------------------
#-----------------------------------------------------------------------------

INSERT INTO `alergia` (`id`, `nombre`) VALUES ('1', 'Al pollo');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('2', 'Al pescado');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('3', 'Al trigo');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('4', 'A los lácteos');

INSERT INTO `alergia` (`id`, `nombre`) VALUES ('5', 'Al polvo');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('6', 'Al polen');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('7', 'A hongos');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('8', 'A productos químicos');

INSERT INTO `alergia` (`id`, `nombre`) VALUES ('9', 'A las pulgas');

INSERT INTO `alergia` (`id`, `nombre`) VALUES ('10', 'A las abejas');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('11', 'A las avispas');
INSERT INTO `alergia` (`id`, `nombre`) VALUES ('12', 'A los mosquitos');


#-----------------------------------------------------------------------------
#--------------------- Inserciones en tabla Enfermedad -----------------------
#-----------------------------------------------------------------------------

INSERT INTO `enfermedad` (`id`, `nombre`) VALUES ('1', 'Parvovirus');
INSERT INTO `enfermedad` (`id`, `nombre`) VALUES ('2', 'Rabia');
INSERT INTO `enfermedad` (`id`, `nombre`) VALUES ('3', 'Moquillo');
INSERT INTO `enfermedad` (`id`, `nombre`) VALUES ('4', 'Lyme');
INSERT INTO `enfermedad` (`id`, `nombre`) VALUES ('5', 'Leptospirosis');

#-----------------------------------------------------------------------------
#------------------------- Inserciones en tabla Vacuna -----------------------
#-----------------------------------------------------------------------------

INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('1', 'Parvovirus/Moquillo');
INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('2', 'Pilivalente canina I');
INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('3', 'Pilivalente canina II');
INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('4', 'Traqueobronquitis');
INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('5', 'Antirrábica');
INSERT INTO `vacuna` (`id`, `nombre`) VALUES ('6', 'Revacunación Anual');

#-----------------------------------------------------------------------------
#------------------- Inserciones en tabla Temperamento -----------------------
#-----------------------------------------------------------------------------

INSERT INTO `temperamento` (`id`, `temperamento`) VALUES ('1', 'juguetón');
INSERT INTO `temperamento` (`id`, `temperamento`) VALUES ('2', 'tímido');
INSERT INTO `temperamento` (`id`, `temperamento`) VALUES ('3', 'amigable');
INSERT INTO `temperamento` (`id`, `temperamento`) VALUES ('4', 'agresivo');
INSERT INTO `temperamento` (`id`, `temperamento`) VALUES ('5', 'tranquilo');

#-----------------------------------------------------------------------------
#------------------- Inserciones en tabla EstadoImagen -----------------------
#-----------------------------------------------------------------------------

INSERT INTO `estadoimagen` (`id`, `estado`) VALUES ('1', 'Activa');
INSERT INTO `estadoimagen` (`id`, `estado`) VALUES ('2', 'Inactiva');
INSERT INTO `estadoimagen` (`id`, `estado`) VALUES ('3', 'Eliminada');

#-----------------------------------------------------------------------------
#-------------------- Inserciones en tabla EstadoUsuario ---------------------
#-----------------------------------------------------------------------------

INSERT INTO `estadousuario` (`id`, `estado`) VALUES ('1', 'Activo');
INSERT INTO `estadousuario` (`id`, `estado`) VALUES ('2', 'Inactivo');
INSERT INTO `estadousuario` (`id`, `estado`) VALUES ('3', 'Bloqueado');

#-----------------------------------------------------------------------------
#-------------------- Inserciones en tabla EstadoMascota ---------------------
#-----------------------------------------------------------------------------

INSERT INTO `estadomascota` (`id`, `estado`) VALUES ('1', 'Disponible');
INSERT INTO `estadomascota` (`id`, `estado`) VALUES ('2', 'En adopción');
INSERT INTO `estadomascota` (`id`, `estado`) VALUES ('3', 'Adoptada');
INSERT INTO `estadomascota` (`id`, `estado`) VALUES ('4', 'Reservada');

#-----------------------------------------------------------------------------
#-------------------- Inserciones en tabla EstadoAdopcion --------------------
#-----------------------------------------------------------------------------

INSERT INTO `estadoadopcion` (`id`, `estado`) VALUES ('1', 'Pendiente');
INSERT INTO `estadoadopcion` (`id`, `estado`) VALUES ('2', 'Aprobada');
INSERT INTO `estadoadopcion` (`id`, `estado`) VALUES ('3', 'Rechazada');
INSERT INTO `estadoadopcion` (`id`, `estado`) VALUES ('4', 'Cancelada');

#-----------------------------------------------------------------------------
#--------------------- Inserciones en tabla EstadoPublicacion ----------------
#-----------------------------------------------------------------------------

INSERT INTO `estadopublicacion` (`id`, `estado`) VALUES ('1', 'Activa');
INSERT INTO `estadopublicacion` (`id`, `estado`) VALUES ('2', 'Inactiva');
INSERT INTO `estadopublicacion` (`id`, `estado`) VALUES ('3', 'Eliminada');

#-----------------------------------------------------------------------------
#---------------------- Inserciones en tabla EstadoComentario ----------------
#-----------------------------------------------------------------------------

INSERT INTO `estadocomentario` (`id`, `estado`) VALUES ('1', 'Activo');
INSERT INTO `estadocomentario` (`id`, `estado`) VALUES ('2', 'Inactivo');
INSERT INTO `estadocomentario` (`id`, `estado`) VALUES ('3', 'Eliminado');

#-----------------------------------------------------------------------------
#---------------------- Inserciones en tabla Departamento --------------------
#-----------------------------------------------------------------------------

INSERT INTO `departamento` (`id`, `departamento`) VALUES ('1', 'Amazonas');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('2', 'Áncash');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('3', 'Apurímac');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('4', 'Arequipa');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('5', 'Ayacucho');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('6', 'Cajamarca');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('7', 'Cusco');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('8', 'Huancavelica');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('9', 'Huánuco');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('10', 'Ica');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('11', 'Junín');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('12', 'La Libertad');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('13', 'Lambayeque');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('14', 'Lima');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('15', 'Loreto');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('16', 'Madre de Dios');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('17', 'Moquegua');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('18', 'Pasco');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('19', 'Piura');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('20', 'Puno');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('21', 'San Martín');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('22', 'Tacna');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('23', 'Tumbes');
INSERT INTO `departamento` (`id`, `departamento`) VALUES ('24', 'Ucayali');

#--------------------------------------------------------------------------------------------------------
#-------------------------------------- Inserciones en tabla Provincia ----------------------------------
#--------------------------------------------------------------------------------------------------------

INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('1', '12', 'Trujillo');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('2', '12', 'Ascope');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('3', '12', 'Bolívar');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('4', '12', 'Chepén');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('5', '12', 'Julcán');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('6', '12', 'Otuzco');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('7', '12', 'Pacasmayo');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('8', '12', 'Pataz');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('9', '12', 'Sánchez Carrión');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('10', '12', 'Santiago de Chuco');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('11', '12', 'Gran Chimú');
INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES ('12', '12', 'Virú');

#--------------------------------------------------------------------------------------------------------
#-------------------------------------- Inserciones en tabla Provincia ----------------------------------
#--------------------------------------------------------------------------------------------------------

INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('1', '1', 'Trujillo');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('2', '1', 'El Porvenir');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('3', '1', 'La Esperanza');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('4', '1', 'Florencia de Mora');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('5', '1', 'Laredo');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('6', '1', 'Moche');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('7', '1', 'Salaverry');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('8', '1', 'Simbal');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('9', '1', 'Huanchaco');
INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES ('10', '1', 'Víctor Larco Herrera');


#-----------------------------------------------------------------------------------------------------------
#-------------------------------------------- Inserciones en tabla Ubigeo ----------------------------------
#-----------------------------------------------------------------------------------------------------------

INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('1', '12', '1', '1');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('2', '12', '1', '2');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('3', '12', '1', '3');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('4', '12', '1', '4');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('5', '12', '1', '5');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('6', '12', '1', '6');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('7', '12', '1', '7');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('8', '12', '1', '8');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('9', '12', '1', '9');
INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES ('10', '12', '1', '10');


#--------------------------------------------------------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------- Inserciones en tabla Usuario ---------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------------------------------------------------------------------

#-----------------------------------------------------
#----------- Correo: cm9225064@gmail.com -------------
#----------- Contraseña: ************ ----------------
#-----------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(1, 3, 1, '73179853', 'cristian1999', 'adf04fd0cead3176d07b88756d1f5f55a44f634e5fde15792d50a04ca50d83bb09fe29cfbd68c66edac0596122223d6280ec48395ee6cbd1fabf727170e32b87', 1, 'cm9225064@gmail.com', 'Christian Anthony', 'Morales Esquivel', 1, 'Av. Cahuide #435', 949177350, 'Estudiante', 1, 1, 'Soltero', 0, 4, '2021-10-03');


#-----------------------------------------------------
#----------- Correo: t452700120@unitru.edu.pe --------
#----------- Contraseña: admi1unt2023 ----------------
#-----------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(2, 2, 1, '75708984', 't452700120', 'ea009c2a0206e6b49ff1b46ffe3ec77acad56e0739d28c2b6b3311dc5b21c0fce3278881f09ad0cacd18672b765ed46eab06b402230d1bd832fd5967165486ab', 1, 't452700120@unitru.edu.pe', 'Deyvi Rolan', 'Villegas Olano', 1, 'Av. Jaime Blanco #1234', 987933121, 'Estudiante', 1, 0, 'Soltero', 0, 7, '2022-07-13');

#-----------------------------------------------------
#----------- Correo: dnique@unitru.edu.pe ------------
#----------- Contraseña: admi2unt2023 ----------------
#-----------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(3, 1, 1, '75627488', 'dnique', '4e57351743c17c3a61d57b4ae305add12716987c1015d2ce2c091d79975bf8174d7e770f1c5cb31461e19c437312746d5952385922df150fe0cda88df943d713', 1, 'dnique@unitru.edu.pe', 'Diego Gianpierre', 'Ñique Baldeon', 1, 'Av. Mansiche #845', 910688712, 'Estudiante', 0, 1, 'Soltero', 0, 3, '2023-07-14');

#-----------------------------------------------------
#----------- Correo: famayo@unitru.edu.pe ------------
#----------- Contraseña: user1unt2023 ----------------
#-----------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(4, 1, 1, '71253646', 'famayo', '9af7b3d9d8a8ebef5168e5f55a6220a8b5a6b9918e6d42c4f617d0572c7aa21c5355de68b4c677bd521b032443f4c99b24e04552c60780c65f76c735c36fae6d', 0, 'famayo@unitru.edu.pe', 'Flavio Cesar', 'Amayo Gamboa', 1, 'Av. Mansiche #213', 998475163, 'Estudiante', 1, 1, 'Soltero', 0, 5, '2022-02-18');

#---------------------------------------------------------
#----------- Correo: jdmendozam@unitru.edu.pe ------------
#----------- Contraseña: user2unt2023 --------------------
#---------------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(5, 3, 1,'75397551', 'jdmendozam', '965da9be3ee0cc71dab2e52303ac83fad77cf238263ebb1550c777a785ab32e4d7adac883ade2a137ac7e78e823c9461c7840a20c4602f1e1c30ff589eb9d5ab', 0, 'jdmendozam@unitru.edu.pe', 'Jefree Diamond Wallace', 'Mendoza Miranda', 1, 'Av Panamericana #677', 944838575, 'Estudiante', 1, 1, 'Casado', 0, 4, '2023-07-14');

#---------------------------------------------------------
#----------- Correo: chmoralese@unitru.edu.pe ------------
#----------- Contraseña: *********** ---------------------
#---------------------------------------------------------
INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES(6, 3, 1, '73179854', 'came123', 'adf04fd0cead3176d07b88756d1f5f55a44f634e5fde15792d50a04ca50d83bb09fe29cfbd68c66edac0596122223d6280ec48395ee6cbd1fabf727170e32b87', 0, 'chmoralese@unitru.edu.pe', 'Cristian', 'Morales', 1, 'José Castelli #740', 947993400, 'Estudiante', 0, 1, 'Soltero', 0, 4, '2023-07-18');

#--------------------------------------------------------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------- Inserciones en tabla Mascota ---------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------------------------------------------------------------------


INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(1, 1, 1, 'Bosnia', 'Perro', 'Samoyedo', '2022-04-18', 'Hembra', 'Grande', 'Blanco', 'Largo', 'Saludable', 1, 1, 'Bosnia es amigable, gentil, afectuosa y juguetona. Suele llevarse bien con otras mascotas y también son amigables con las personas, incluyendo a los niños.', '2023-07-13');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(2, 1, 1, 'Bronco', 'Perro', 'Mestizo', '2021-07-12', 'Macho', 'Pequeño', 'Café con Blanco', 'Mediano', 'Saludable', 0, 1, 'Bronco es un adorable perro cruzado entre Shih Tzu y Yorkshire Terrier. Tiene un pelaje corto y suave en tonos blanco y mostaza. Sus ojos oscuros y vivaces reflejan su inteligencia y energía. A pesar de su tamaño mediano, Bronco es un perro amigable, leal y le encanta acompañar a sus dueños en actividades al aire libre.', '2023-07-13');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(3, 1, 2, 'Kira', 'Perro', 'Mestizo', '2021-01-15', 'Hembra', 'Pequeño', 'Naranja y blanco', 'Mediano', 'Saludable', 1, 1, ' Kira es una imponente hembra de Pastor Alemán de tamaño grande. Tiene un pelaje corto y denso en tonos negro y fuego, que resalta su elegancia y belleza. Sus ojos oscuros y alertas reflejan su inteligencia y lealtad. Kira es una perra valiente, activa y está siempre lista para proteger y cuidar a su familia.', '2023-07-13');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(4, 1, 2, 'Garra', 'Perro', 'Golden Retriver', '2020-08-10', 'Hembra', 'Grande', 'Marrón', 'Mediano', 'Saludable', 1, 1, 'Garra es una perrita amigable, y muy obediente, le gusta jugar con su peluchito en forma de pato, a menudo suele llevarse bien con el resto de animales.', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(5, 1, 2, 'Fiona', 'Perro', 'Poodle', '2022-07-04', 'Hembra', 'Pequeño', 'Negro con Blanco', 'Largo', 'Saludable', 0, 1, 'Fiona es una perrita muy alegre y divertida, siempre le gusta estar saltando de un lugar a otro, le gusta mucho jugar con otro perros, es muy amigable y se lleva super bien con los niños.', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(6, 1, 3, 'Salem', 'Gato', 'Mestizo', '2022-11-29', 'Macho', 'Mediano', 'Plomo, Rayas Negras', 'Corto', 'Saludable', 0, 1, 'Salem es un gato muy amigable, le gusta mucho jugar con su bola de estambre, y suele dormir a gusto a los pies de las personas que le agradan y le suelen brindar afecto.', '2023-05-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(7, 1, 3, 'Jampi', 'Perro', 'Labrador', '2021-01-04', 'Macho', 'Mediano', 'Cafe claro con Blanco', 'Corto', 'Saludable', 0, 1, 'Jampi es un labrador muy dócil y tranquilo, le gusta mucho dormir y correr, lo que más ama correr es sus croquetas, a menudo llora cuando esta solo, pero cuando tiene con quien jugar se pone muy contento y juguetón,', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(8, 1, 3, 'Tyson', 'Gato', 'Mestizo', '2022-02-24', 'Macho', 'Mediano', 'Plomo, Rayas Blancas', 'Corto', 'Saludable', 0, 1, 'Tyson es un compañero fiel y juguetón, que disfruta de las sesiones de juego y de pasar tiempo relajándose en su entorno acogedor. Con su apariencia cautivadora y personalidad encantadora, Tyson es un gato que seguramente llenará de alegría y compañía la vida de aquellos que tienen la suerte de conocerlo.', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(9, 1, 3, 'Bruno', 'Perro', 'Border Collie', '2023-05-09', 'Macho', 'Pequeño', 'Blanco, Rayas Negras Mas Café', 'Mediano', 'Saludable', 0, 1, 'Bruno es un perro inteligente y lleno de energía. Desde temprana edad, muestra su inclinación natural hacia el aprendizaje y la obediencia, lo que hace que sea un perro fácil de entrenar. A pesar de su corta edad, Bruno es curioso y valiente, siempre dispuesto a explorar su entorno y descubrir nuevas aventuras. A medida que crece, se espera que desarrolle una personalidad leal, cariñosa y enérgica, propia de su raza.', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(10, 1, 4, 'Sasha', 'Perro', 'Husky Siberiano', '2019-08-16', 'Hembra', 'Grande', 'Negro Con Blanco', 'Mediano', 'Saludable', 1, 1, 'Sasha, una Husky Siberiano de 6 años, es una perra con una personalidad inigualable. Aventurera y enérgica, siempre está lista para explorar el mundo que la rodea. Su inteligencia y astucia la personalizada en una compañera leal y obediente. A pesar de su apariencia imponente, Sasha es una perra cariñosa y amigable, siempre dispuesta a recibir y dar afecto a aquellos que la rodean. Su espíritu juguetón y su naturaleza sociable hacen que sea una gran compañera para actividades al aire libre y juegos interminables. Con su pelaje negro y blanco, Sasha no solo es una belleza, sino también una amiga fiel que llenará de alegría y vitalidad la vida de quienes la rodean.', '2023-05-29');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(11, 1, 4, 'Peter', 'Perro', 'American Shepherd', '2023-03-23', 'Macho', 'Pequeño', 'Blanco, Rayas Negras Y Plomas Mas Café', 'Largo', 'Saludable', 0, 1, 'Peter es un cachorro macho de casi 2 meses de edad, perteneciente a la raza American Shepherd. Su pelaje combina tonos de blanco, rayas negras y plomas, junto con pinceladas de café. A pesar de su corta edad, Peter muestra una curiosidad innata y un espíritu juguetón. Con su apariencia encantadora y su energía contagiosa, seguro será un compañero animado y lleno de diversión.', '2023-07-14');
INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES(12, 1, 5, 'Ramón', 'Perro', 'Frenchton', '2020-10-22', 'Macho', 'Pequeño', 'Mostaza Claro', 'Corto', 'Saludable', 0, 1, 'Ramón, un Frenchton macho de aproximadamente 3 años de edad, es un perro con una personalidad inigualable. Con su pelaje de color mostaza claro, Ramón irradia calidez y alegría. Es un perro amistoso y sociable que siempre está ansioso por hacer nuevos amigos, tanto humanos como de otras mascotas. Su naturaleza juguetona y enérgica lo convierte en un compañero de juegos divertido e incansable. Además, Ramón es conocido por su carácter cariñoso y afectuoso, siempre listo para brindar amor y lealtad incondicionales. Con Ramón a tu lado, cada día estará lleno de diversión, amor y compañía.', '2023-07-14');


#--------------------------------------------------------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------- Inserciones en tabla Imagen ----------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(1, 1, NULL, 1, NULL, NULL, 'imagenesMascotasRegistradas/64af25786c603_producto1.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(2, 1, NULL, 2, NULL, NULL, 'imagenesMascotasRegistradas/64af2a2b2548d_producto2.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(3, 1, NULL, 3, NULL, NULL, 'imagenesMascotasRegistradas/64af2f40e5add_producto3.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(4, 1, NULL, 4, NULL, NULL, 'imagenesMascotasRegistradas/64b09aca11efd_producto4.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(5, 1, NULL, 5, NULL, NULL, 'imagenesMascotasRegistradas/64b09cb8887ec_producto5.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(6, 1, NULL, 6, NULL, NULL, 'imagenesMascotasRegistradas/64b0c684c8895_producto6.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(7, 1, NULL, 7, NULL, NULL, 'imagenesMascotasRegistradas/64b0c7d6cb3bd_producto7.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(8, 1, NULL, 8, NULL, NULL, 'imagenesMascotasRegistradas/64b0c971eff37_producto8.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(9, 1, NULL, 9, NULL, NULL, 'imagenesMascotasRegistradas/64b0cc0d6922f_producto9.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(10, 1, NULL, 10, NULL, NULL, 'imagenesMascotasRegistradas/64b0cf562a150_producto10.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(11, 1, NULL, 11, NULL, NULL, 'imagenesMascotasRegistradas/64b0d1bd2c50e_producto11.jpg');
INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES(12, 1, NULL, 12, NULL, NULL, 'imagenesMascotasRegistradas/64b0d5b9ede24_producto12.jpg');


INSERT INTO `ip` (`id`, `ip`) VALUES(1, '::1');
INSERT INTO `ip` (`id`, `ip`) VALUES(2, '192.168.0.1');
INSERT INTO `ip` (`id`, `ip`) VALUES(3, '10.0.0.1');
INSERT INTO `ip` (`id`, `ip`) VALUES(4, '172.16.0.1');


INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(1, 1, 1, '2023-07-02', '07:46:18');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(2, 5, 1, '2023-04-21', '11:47:45');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(3, 3, 1, '2023-05-23', '10:14:42');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(4, 10, 2, '2023-04-11', '08:33:28');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(5, 6, 2, '2023-07-19', '03:28:10');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(6, 6, 1, '2023-04-11', '02:21:28');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(7, 10, 3, '2023-04-21', '10:14:42');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(8, 7, 4, '2023-07-18', '02:52:05');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(9, 3, 4, '2023-07-18', '02:52:10');
INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES(10, 10, 4, '2023-07-18', '04:44:45');


INSERT INTO `adopcion` (`id`, `EstadoAdopcion_id`, `Mascota_id`, `id_usuario_adoptante`, `id_usuario_dador`, `fechaDeRegistro`, `fechaDeConfirmacion`, `motivo`) VALUES(1, 1, 10, 6, 4, '2023-07-18', '2023-07-18', 'Me gustan los perros grandes, son bien juguetones y su pelaje es bien suave.');
INSERT INTO `adopcion` (`id`, `EstadoAdopcion_id`, `Mascota_id`, `id_usuario_adoptante`, `id_usuario_dador`, `fechaDeRegistro`, `fechaDeConfirmacion`, `motivo`) VALUES(2, 1, 4, 5, 2, '2023-07-18', NULL, 'Me hace falta un amigo fiel a mi lado con el que pueda vivir mil aventuras');
