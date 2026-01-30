-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2023 a las 14:59:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistema_de_adopcion_de_mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `id` int(10) UNSIGNED NOT NULL,
  `EstadoAdopcion_id` int(10) UNSIGNED NOT NULL,
  `Mascota_id` int(10) UNSIGNED NOT NULL,
  `id_usuario_adoptante` int(10) UNSIGNED NOT NULL,
  `id_usuario_dador` int(10) UNSIGNED NOT NULL,
  `fechaDeRegistro` date DEFAULT NULL,
  `fechaDeConfirmacion` date DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`id`, `EstadoAdopcion_id`, `Mascota_id`, `id_usuario_adoptante`, `id_usuario_dador`, `fechaDeRegistro`, `fechaDeConfirmacion`, `motivo`) VALUES
(1, 1, 10, 6, 4, '2023-07-18', '2023-07-18', 'Me gustan los perros grandes, son bien juguetones y su pelaje es bien suave.'),
(2, 1, 4, 5, 2, '2023-07-18', NULL, 'Me hace falta un amigo fiel a mi lado con el que pueda vivir mil aventuras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergia`
--

CREATE TABLE `alergia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alergia`
--

INSERT INTO `alergia` (`id`, `nombre`) VALUES
(1, 'Al pollo'),
(2, 'Al pescado'),
(3, 'Al trigo'),
(4, 'A los lácteos'),
(5, 'Al polvo'),
(6, 'Al polen'),
(7, 'A hongos'),
(8, 'A productos químicos'),
(9, 'A las pulgas'),
(10, 'A las abejas'),
(11, 'A las avispas'),
(12, 'A los mosquitos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(10) UNSIGNED NOT NULL,
  `EstadoComentario_id` int(10) UNSIGNED NOT NULL,
  `Usuario_id` int(10) UNSIGNED NOT NULL,
  `Publicacion_id` int(10) UNSIGNED NOT NULL,
  `texto` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `nroDeReacciones` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `departamento` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `departamento`) VALUES
(1, 'Amazonas'),
(2, 'Áncash'),
(3, 'Apurímac'),
(4, 'Arequipa'),
(5, 'Ayacucho'),
(6, 'Cajamarca'),
(7, 'Cusco'),
(8, 'Huancavelica'),
(9, 'Huánuco'),
(10, 'Ica'),
(11, 'Junín'),
(12, 'La Libertad'),
(13, 'Lambayeque'),
(14, 'Lima'),
(15, 'Loreto'),
(16, 'Madre de Dios'),
(17, 'Moquegua'),
(18, 'Pasco'),
(19, 'Piura'),
(20, 'Puno'),
(21, 'San Martín'),
(22, 'Tacna'),
(23, 'Tumbes'),
(24, 'Ucayali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(10) UNSIGNED NOT NULL,
  `Provincia_id` int(10) UNSIGNED NOT NULL,
  `distrito` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `Provincia_id`, `distrito`) VALUES
(1, 1, 'Trujillo'),
(2, 1, 'El Porvenir'),
(3, 1, 'La Esperanza'),
(4, 1, 'Florencia de Mora'),
(5, 1, 'Laredo'),
(6, 1, 'Moche'),
(7, 1, 'Salaverry'),
(8, 1, 'Simbal'),
(9, 1, 'Huanchaco'),
(10, 1, 'Víctor Larco Herrera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`id`, `nombre`) VALUES
(1, 'Parvovirus'),
(2, 'Rabia'),
(3, 'Moquillo'),
(4, 'Lyme'),
(5, 'Leptospirosis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoadopcion`
--

CREATE TABLE `estadoadopcion` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoadopcion`
--

INSERT INTO `estadoadopcion` (`id`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Aprobada'),
(3, 'Rechazada'),
(4, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocomentario`
--

CREATE TABLE `estadocomentario` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadocomentario`
--

INSERT INTO `estadocomentario` (`id`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoimagen`
--

CREATE TABLE `estadoimagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoimagen`
--

INSERT INTO `estadoimagen` (`id`, `estado`) VALUES
(1, 'Activa'),
(2, 'Inactiva'),
(3, 'Eliminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadomascota`
--

CREATE TABLE `estadomascota` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadomascota`
--

INSERT INTO `estadomascota` (`id`, `estado`) VALUES
(1, 'Disponible'),
(2, 'En adopción'),
(3, 'Adoptada'),
(4, 'Reservada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopublicacion`
--

CREATE TABLE `estadopublicacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadopublicacion`
--

INSERT INTO `estadopublicacion` (`id`, `estado`) VALUES
(1, 'Activa'),
(2, 'Inactiva'),
(3, 'Eliminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadousuario`
--

CREATE TABLE `estadousuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadousuario`
--

INSERT INTO `estadousuario` (`id`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `EstadoImagen_id` int(10) UNSIGNED NOT NULL,
  `Usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `Mascota_id` int(10) UNSIGNED DEFAULT NULL,
  `Comentario_id` int(10) UNSIGNED DEFAULT NULL,
  `Publicacion_id` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `EstadoImagen_id`, `Usuario_id`, `Mascota_id`, `Comentario_id`, `Publicacion_id`, `url`) VALUES
(1, 1, NULL, 1, NULL, NULL, 'imagenesMascotasRegistradas/64af25786c603_producto1.jpg'),
(2, 1, NULL, 2, NULL, NULL, 'imagenesMascotasRegistradas/64af2a2b2548d_producto2.jpg'),
(3, 1, NULL, 3, NULL, NULL, 'imagenesMascotasRegistradas/64af2f40e5add_producto3.jpg'),
(4, 1, NULL, 4, NULL, NULL, 'imagenesMascotasRegistradas/64b09aca11efd_producto4.jpg'),
(5, 1, NULL, 5, NULL, NULL, 'imagenesMascotasRegistradas/64b09cb8887ec_producto5.jpg'),
(6, 1, NULL, 6, NULL, NULL, 'imagenesMascotasRegistradas/64b0c684c8895_producto6.jpg'),
(7, 1, NULL, 7, NULL, NULL, 'imagenesMascotasRegistradas/64b0c7d6cb3bd_producto7.jpg'),
(8, 1, NULL, 8, NULL, NULL, 'imagenesMascotasRegistradas/64b0c971eff37_producto8.jpg'),
(9, 1, NULL, 9, NULL, NULL, 'imagenesMascotasRegistradas/64b0cc0d6922f_producto9.jpg'),
(10, 1, NULL, 10, NULL, NULL, 'imagenesMascotasRegistradas/64b0cf562a150_producto10.jpg'),
(11, 1, NULL, 11, NULL, NULL, 'imagenesMascotasRegistradas/64b0d1bd2c50e_producto11.jpg'),
(12, 1, NULL, 12, NULL, NULL, 'imagenesMascotasRegistradas/64b0d5b9ede24_producto12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip`
--

CREATE TABLE `ip` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ip`
--

INSERT INTO `ip` (`id`, `ip`) VALUES
(1, '::1'),
(2, '192.168.0.1'),
(3, '10.0.0.1'),
(4, '172.16.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(10) UNSIGNED NOT NULL,
  `EstadoMascota_id` int(10) UNSIGNED NOT NULL,
  `Usuario_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `raza` varchar(45) DEFAULT NULL,
  `fechaDeNacimiento` date DEFAULT NULL,
  `sexo` varchar(6) DEFAULT NULL,
  `tamanio` varchar(7) DEFAULT NULL,
  `colores` varchar(100) DEFAULT NULL,
  `cantidadDePelaje` varchar(7) DEFAULT NULL,
  `estadoDeSalud` varchar(70) DEFAULT NULL,
  `esterilizacion` tinyint(3) UNSIGNED DEFAULT NULL,
  `disponibilidad` tinyint(3) UNSIGNED DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fechaDeRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `EstadoMascota_id`, `Usuario_id`, `nombre`, `especie`, `raza`, `fechaDeNacimiento`, `sexo`, `tamanio`, `colores`, `cantidadDePelaje`, `estadoDeSalud`, `esterilizacion`, `disponibilidad`, `descripcion`, `fechaDeRegistro`) VALUES
(1, 1, 1, 'Bosnia', 'Perro', 'Samoyedo', '2022-04-18', 'Hembra', 'Grande', 'Blanco', 'Largo', 'Saludable', 1, 1, 'Bosnia es amigable, gentil, afectuosa y juguetona. Suele llevarse bien con otras mascotas y también son amigables con las personas, incluyendo a los niños.', '2023-07-13'),
(2, 1, 1, 'Bronco', 'Perro', 'Mestizo', '2021-07-12', 'Macho', 'Pequeño', 'Café con Blanco', 'Mediano', 'Saludable', 0, 1, 'Bronco es un adorable perro cruzado entre Shih Tzu y Yorkshire Terrier. Tiene un pelaje corto y suave en tonos blanco y mostaza. Sus ojos oscuros y vivaces reflejan su inteligencia y energía. A pesar de su tamaño mediano, Bronco es un perro amigable, leal y le encanta acompañar a sus dueños en actividades al aire libre.', '2023-07-13'),
(3, 1, 2, 'Kira', 'Perro', 'Mestizo', '2021-01-15', 'Hembra', 'Pequeño', 'Naranja y blanco', 'Mediano', 'Saludable', 1, 1, ' Kira es una imponente hembra de Pastor Alemán de tamaño grande. Tiene un pelaje corto y denso en tonos negro y fuego, que resalta su elegancia y belleza. Sus ojos oscuros y alertas reflejan su inteligencia y lealtad. Kira es una perra valiente, activa y está siempre lista para proteger y cuidar a su familia.', '2023-07-13'),
(4, 1, 2, 'Garra', 'Perro', 'Golden Retriver', '2020-08-10', 'Hembra', 'Grande', 'Marrón', 'Mediano', 'Saludable', 1, 1, 'Garra es una perrita amigable, y muy obediente, le gusta jugar con su peluchito en forma de pato, a menudo suele llevarse bien con el resto de animales.', '2023-07-14'),
(5, 1, 2, 'Fiona', 'Perro', 'Poodle', '2022-07-04', 'Hembra', 'Pequeño', 'Negro con Blanco', 'Largo', 'Saludable', 0, 1, 'Fiona es una perrita muy alegre y divertida, siempre le gusta estar saltando de un lugar a otro, le gusta mucho jugar con otro perros, es muy amigable y se lleva super bien con los niños.', '2023-07-14'),
(6, 1, 3, 'Salem', 'Gato', 'Mestizo', '2022-11-29', 'Macho', 'Mediano', 'Plomo, Rayas Negras', 'Corto', 'Saludable', 0, 1, 'Salem es un gato muy amigable, le gusta mucho jugar con su bola de estambre, y suele dormir a gusto a los pies de las personas que le agradan y le suelen brindar afecto.', '2023-05-14'),
(7, 1, 3, 'Jampi', 'Perro', 'Labrador', '2021-01-04', 'Macho', 'Mediano', 'Cafe claro con Blanco', 'Corto', 'Saludable', 0, 1, 'Jampi es un labrador muy dócil y tranquilo, le gusta mucho dormir y correr, lo que más ama correr es sus croquetas, a menudo llora cuando esta solo, pero cuando tiene con quien jugar se pone muy contento y juguetón,', '2023-07-14'),
(8, 1, 3, 'Tyson', 'Gato', 'Mestizo', '2022-02-24', 'Macho', 'Mediano', 'Plomo, Rayas Blancas', 'Corto', 'Saludable', 0, 1, 'Tyson es un compañero fiel y juguetón, que disfruta de las sesiones de juego y de pasar tiempo relajándose en su entorno acogedor. Con su apariencia cautivadora y personalidad encantadora, Tyson es un gato que seguramente llenará de alegría y compañía la vida de aquellos que tienen la suerte de conocerlo.', '2023-07-14'),
(9, 1, 3, 'Bruno', 'Perro', 'Border Collie', '2023-05-09', 'Macho', 'Pequeño', 'Blanco, Rayas Negras Mas Café', 'Mediano', 'Saludable', 0, 1, 'Bruno es un perro inteligente y lleno de energía. Desde temprana edad, muestra su inclinación natural hacia el aprendizaje y la obediencia, lo que hace que sea un perro fácil de entrenar. A pesar de su corta edad, Bruno es curioso y valiente, siempre dispuesto a explorar su entorno y descubrir nuevas aventuras. A medida que crece, se espera que desarrolle una personalidad leal, cariñosa y enérgica, propia de su raza.', '2023-07-14'),
(10, 1, 4, 'Sasha', 'Perro', 'Husky Siberiano', '2019-08-16', 'Hembra', 'Grande', 'Negro Con Blanco', 'Mediano', 'Saludable', 1, 1, 'Sasha, una Husky Siberiano de 6 años, es una perra con una personalidad inigualable. Aventurera y enérgica, siempre está lista para explorar el mundo que la rodea. Su inteligencia y astucia la personalizada en una compañera leal y obediente. A pesar de su apariencia imponente, Sasha es una perra cariñosa y amigable, siempre dispuesta a recibir y dar afecto a aquellos que la rodean. Su espíritu juguetón y su naturaleza sociable hacen que sea una gran compañera para actividades al aire libre y juegos interminables. Con su pelaje negro y blanco, Sasha no solo es una belleza, sino también una amiga fiel que llenará de alegría y vitalidad la vida de quienes la rodean.', '2023-05-29'),
(11, 1, 4, 'Peter', 'Perro', 'American Shepherd', '2023-03-23', 'Macho', 'Pequeño', 'Blanco, Rayas Negras Y Plomas Mas Café', 'Largo', 'Saludable', 0, 1, 'Peter es un cachorro macho de casi 2 meses de edad, perteneciente a la raza American Shepherd. Su pelaje combina tonos de blanco, rayas negras y plomas, junto con pinceladas de café. A pesar de su corta edad, Peter muestra una curiosidad innata y un espíritu juguetón. Con su apariencia encantadora y su energía contagiosa, seguro será un compañero animado y lleno de diversión.', '2023-07-14'),
(12, 1, 5, 'Ramón', 'Perro', 'Frenchton', '2020-10-22', 'Macho', 'Pequeño', 'Mostaza Claro', 'Corto', 'Saludable', 0, 1, 'Ramón, un Frenchton macho de aproximadamente 3 años de edad, es un perro con una personalidad inigualable. Con su pelaje de color mostaza claro, Ramón irradia calidez y alegría. Es un perro amistoso y sociable que siempre está ansioso por hacer nuevos amigos, tanto humanos como de otras mascotas. Su naturaleza juguetona y enérgica lo convierte en un compañero de juegos divertido e incansable. Además, Ramón es conocido por su carácter cariñoso y afectuoso, siempre listo para brindar amor y lealtad incondicionales. Con Ramón a tu lado, cada día estará lleno de diversión, amor y compañía.', '2023-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_has_alergia`
--

CREATE TABLE `mascota_has_alergia` (
  `Mascota_id` int(10) UNSIGNED NOT NULL,
  `Alergia_id` int(10) UNSIGNED NOT NULL,
  `fechaDeDeteccion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_has_enfermedad`
--

CREATE TABLE `mascota_has_enfermedad` (
  `Mascota_id` int(10) UNSIGNED NOT NULL,
  `Enfermedad_id` int(10) UNSIGNED NOT NULL,
  `fechaDeDiagnostico` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_has_vacuna`
--

CREATE TABLE `mascota_has_vacuna` (
  `Mascota_id` int(10) UNSIGNED NOT NULL,
  `Vacuna_id` int(10) UNSIGNED NOT NULL,
  `fechaDeVacunacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(10) UNSIGNED NOT NULL,
  `Departamento_id` int(10) UNSIGNED NOT NULL,
  `provincia` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `Departamento_id`, `provincia`) VALUES
(1, 12, 'Trujillo'),
(2, 12, 'Ascope'),
(3, 12, 'Bolívar'),
(4, 12, 'Chepén'),
(5, 12, 'Julcán'),
(6, 12, 'Otuzco'),
(7, 12, 'Pacasmayo'),
(8, 12, 'Pataz'),
(9, 12, 'Sánchez Carrión'),
(10, 12, 'Santiago de Chuco'),
(11, 12, 'Gran Chimú'),
(12, 12, 'Virú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `EstadoPublicacion_id` int(10) UNSIGNED NOT NULL,
  `Usuario_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `fechaDePublicacion` date DEFAULT NULL,
  `horaDePublicacion` time DEFAULT NULL,
  `nroDeReacciones` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temperamento`
--

CREATE TABLE `temperamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `temperamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temperamento`
--

INSERT INTO `temperamento` (`id`, `temperamento`) VALUES
(1, 'juguetón'),
(2, 'tímido'),
(3, 'amigable'),
(4, 'agresivo'),
(5, 'tranquilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temperamento_has_mascota`
--

CREATE TABLE `temperamento_has_mascota` (
  `Temperamento_id` int(10) UNSIGNED NOT NULL,
  `Mascota_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo`
--

CREATE TABLE `ubigeo` (
  `id` int(10) UNSIGNED NOT NULL,
  `Departamento_id` int(10) UNSIGNED NOT NULL,
  `Provincia_id` int(10) UNSIGNED NOT NULL,
  `Distrito_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubigeo`
--

INSERT INTO `ubigeo` (`id`, `Departamento_id`, `Provincia_id`, `Distrito_id`) VALUES
(1, 12, 1, 1),
(2, 12, 1, 2),
(3, 12, 1, 3),
(4, 12, 1, 4),
(5, 12, 1, 5),
(6, 12, 1, 6),
(7, 12, 1, 7),
(8, 12, 1, 8),
(9, 12, 1, 9),
(10, 12, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ubigeo_id` int(10) UNSIGNED DEFAULT NULL,
  `EstadoUsuario_id` int(10) UNSIGNED NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `user_password` varchar(150) DEFAULT NULL,
  `rol` tinyint(3) UNSIGNED DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `sexo` tinyint(3) UNSIGNED DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` int(10) UNSIGNED DEFAULT NULL,
  `trabajoOcupacion` varchar(100) DEFAULT NULL,
  `mascotasPasadas` tinyint(3) UNSIGNED DEFAULT NULL,
  `mascotasActualidad` tinyint(3) UNSIGNED DEFAULT NULL,
  `estadoCivil` varchar(20) DEFAULT NULL,
  `nroDeHijos` int(10) UNSIGNED DEFAULT NULL,
  `nroDeIntegrantesFamilia` int(10) UNSIGNED DEFAULT NULL,
  `fechaDeRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Ubigeo_id`, `EstadoUsuario_id`, `dni`, `usuario`, `user_password`, `rol`, `correo`, `nombre`, `apellidos`, `sexo`, `direccion`, `celular`, `trabajoOcupacion`, `mascotasPasadas`, `mascotasActualidad`, `estadoCivil`, `nroDeHijos`, `nroDeIntegrantesFamilia`, `fechaDeRegistro`) VALUES
(1, 3, 1, '73179853', 'cristian1999', 'adf04fd0cead3176d07b88756d1f5f55a44f634e5fde15792d50a04ca50d83bb09fe29cfbd68c66edac0596122223d6280ec48395ee6cbd1fabf727170e32b87', 1, 'cm9225064@gmail.com', 'Christian Anthony', 'Morales Esquivel', 1, 'Av. Cahuide #435', 949177350, 'Estudiante', 1, 1, 'Soltero', 0, 4, '2021-10-03'),
(2, 2, 1, '75708984', 't452700120', 'ea009c2a0206e6b49ff1b46ffe3ec77acad56e0739d28c2b6b3311dc5b21c0fce3278881f09ad0cacd18672b765ed46eab06b402230d1bd832fd5967165486ab', 1, 't452700120@unitru.edu.pe', 'Deyvi Rolan', 'Villegas Olano', 1, 'Av. Jaime Blanco #1234', 987933121, 'Estudiante', 1, 0, 'Soltero', 0, 7, '2022-07-13'),
(3, 1, 1, '75627488', 'dnique', '4e57351743c17c3a61d57b4ae305add12716987c1015d2ce2c091d79975bf8174d7e770f1c5cb31461e19c437312746d5952385922df150fe0cda88df943d713', 1, 'dnique@unitru.edu.pe', 'Diego Gianpierre', 'Ñique Baldeon', 1, 'Av. Mansiche #845', 910688712, 'Estudiante', 0, 1, 'Soltero', 0, 3, '2023-07-14'),
(4, 1, 1, '71253646', 'famayo', '9af7b3d9d8a8ebef5168e5f55a6220a8b5a6b9918e6d42c4f617d0572c7aa21c5355de68b4c677bd521b032443f4c99b24e04552c60780c65f76c735c36fae6d', 0, 'famayo@unitru.edu.pe', 'Flavio Cesar', 'Amayo Gamboa', 1, 'Av. Mansiche #213', 998475163, 'Estudiante', 1, 1, 'Soltero', 0, 5, '2022-02-18'),
(5, 3, 1, '75397551', 'jdmendozam', '965da9be3ee0cc71dab2e52303ac83fad77cf238263ebb1550c777a785ab32e4d7adac883ade2a137ac7e78e823c9461c7840a20c4602f1e1c30ff589eb9d5ab', 0, 'jdmendozam@unitru.edu.pe', 'Jefree Diamond Wallace', 'Mendoza Miranda', 1, 'Av Panamericana #677', 944838575, 'Estudiante', 1, 1, 'Casado', 0, 4, '2023-07-14'),
(6, 3, 1, '73179854', 'came123', 'adf04fd0cead3176d07b88756d1f5f55a44f634e5fde15792d50a04ca50d83bb09fe29cfbd68c66edac0596122223d6280ec48395ee6cbd1fabf727170e32b87', 0, 'chmoralese@unitru.edu.pe', 'Cristian', 'Morales', 1, 'José Castelli #740', 947993400, 'Estudiante', 0, 1, 'Soltero', 0, 4, '2023-07-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id`, `nombre`) VALUES
(1, 'Parvovirus/Moquillo'),
(2, 'Pilivalente canina I'),
(3, 'Pilivalente canina II'),
(4, 'Traqueobronquitis'),
(5, 'Antirrábica'),
(6, 'Revacunación Anual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(10) UNSIGNED NOT NULL,
  `Mascota_id` int(10) UNSIGNED NOT NULL,
  `IP_id` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id`, `Mascota_id`, `IP_id`, `fecha`, `hora`) VALUES
(1, 1, 1, '2023-07-02', '07:46:18'),
(2, 5, 1, '2023-04-21', '11:47:45'),
(3, 3, 1, '2023-05-23', '10:14:42'),
(4, 10, 2, '2023-04-11', '08:33:28'),
(5, 6, 2, '2023-07-19', '03:28:10'),
(6, 6, 1, '2023-04-11', '02:21:28'),
(7, 10, 3, '2023-04-21', '10:14:42'),
(8, 7, 4, '2023-07-18', '02:52:05'),
(9, 3, 4, '2023-07-18', '02:52:10'),
(10, 10, 4, '2023-07-18', '04:44:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Adopcion_FKIndex1` (`id_usuario_dador`),
  ADD KEY `Adopcion_FKIndex2` (`id_usuario_adoptante`),
  ADD KEY `Adopcion_FKIndex3` (`Mascota_id`),
  ADD KEY `Adopcion_FKIndex4` (`EstadoAdopcion_id`);

--
-- Indices de la tabla `alergia`
--
ALTER TABLE `alergia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Comentario_FKIndex1` (`Publicacion_id`),
  ADD KEY `Comentario_FKIndex2` (`Usuario_id`),
  ADD KEY `Comentario_FKIndex3` (`EstadoComentario_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Distrito_FKIndex1` (`Provincia_id`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadoadopcion`
--
ALTER TABLE `estadoadopcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadocomentario`
--
ALTER TABLE `estadocomentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadoimagen`
--
ALTER TABLE `estadoimagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadomascota`
--
ALTER TABLE `estadomascota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadopublicacion`
--
ALTER TABLE `estadopublicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadousuario`
--
ALTER TABLE `estadousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Imagen_FKIndex1` (`Publicacion_id`),
  ADD KEY `Imagen_FKIndex2` (`Comentario_id`),
  ADD KEY `Imagen_FKIndex3` (`Mascota_id`),
  ADD KEY `Imagen_FKIndex4` (`EstadoImagen_id`),
  ADD KEY `Imagen_FKIndex5` (`Usuario_id`);

--
-- Indices de la tabla `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Mascota_FKIndex1` (`Usuario_id`),
  ADD KEY `Mascota_FKIndex2` (`EstadoMascota_id`);

--
-- Indices de la tabla `mascota_has_alergia`
--
ALTER TABLE `mascota_has_alergia`
  ADD PRIMARY KEY (`Mascota_id`,`Alergia_id`),
  ADD KEY `Mascota_has_Alergia_FKIndex1` (`Mascota_id`),
  ADD KEY `Mascota_has_Alergia_FKIndex2` (`Alergia_id`);

--
-- Indices de la tabla `mascota_has_enfermedad`
--
ALTER TABLE `mascota_has_enfermedad`
  ADD PRIMARY KEY (`Mascota_id`,`Enfermedad_id`),
  ADD KEY `Mascota_has_Enfermedad_FKIndex1` (`Mascota_id`),
  ADD KEY `Mascota_has_Enfermedad_FKIndex2` (`Enfermedad_id`);

--
-- Indices de la tabla `mascota_has_vacuna`
--
ALTER TABLE `mascota_has_vacuna`
  ADD PRIMARY KEY (`Mascota_id`,`Vacuna_id`),
  ADD KEY `Mascota_has_Vacuna_FKIndex1` (`Mascota_id`),
  ADD KEY `Mascota_has_Vacuna_FKIndex2` (`Vacuna_id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Provincia_FKIndex1` (`Departamento_id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Publicacion_FKIndex1` (`Usuario_id`),
  ADD KEY `Publicacion_FKIndex2` (`EstadoPublicacion_id`);

--
-- Indices de la tabla `temperamento`
--
ALTER TABLE `temperamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temperamento_has_mascota`
--
ALTER TABLE `temperamento_has_mascota`
  ADD PRIMARY KEY (`Temperamento_id`,`Mascota_id`),
  ADD KEY `Temperamento_has_Mascota_FKIndex1` (`Temperamento_id`),
  ADD KEY `Temperamento_has_Mascota_FKIndex2` (`Mascota_id`);

--
-- Indices de la tabla `ubigeo`
--
ALTER TABLE `ubigeo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ubigeo_FKIndex1` (`Distrito_id`),
  ADD KEY `Ubigeo_FKIndex2` (`Provincia_id`),
  ADD KEY `Ubigeo_FKIndex3` (`Departamento_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Usuario_FKIndex1` (`EstadoUsuario_id`),
  ADD KEY `Usuario_FKIndex2` (`Ubigeo_id`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Estadisticas_FKIndex1` (`IP_id`),
  ADD KEY `Estadisticas_FKIndex2` (`Mascota_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `alergia`
--
ALTER TABLE `alergia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadoadopcion`
--
ALTER TABLE `estadoadopcion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadocomentario`
--
ALTER TABLE `estadocomentario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadoimagen`
--
ALTER TABLE `estadoimagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadomascota`
--
ALTER TABLE `estadomascota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadopublicacion`
--
ALTER TABLE `estadopublicacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadousuario`
--
ALTER TABLE `estadousuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temperamento`
--
ALTER TABLE `temperamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubigeo`
--
ALTER TABLE `ubigeo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`id_usuario_dador`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`id_usuario_adoptante`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `adopcion_ibfk_3` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `adopcion_ibfk_4` FOREIGN KEY (`EstadoAdopcion_id`) REFERENCES `estadoadopcion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Publicacion_id`) REFERENCES `publicacion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`EstadoComentario_id`) REFERENCES `estadocomentario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`Provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`Publicacion_id`) REFERENCES `publicacion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagen_ibfk_2` FOREIGN KEY (`Comentario_id`) REFERENCES `comentario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagen_ibfk_3` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagen_ibfk_4` FOREIGN KEY (`EstadoImagen_id`) REFERENCES `estadoimagen` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagen_ibfk_5` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`EstadoMascota_id`) REFERENCES `estadomascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota_has_alergia`
--
ALTER TABLE `mascota_has_alergia`
  ADD CONSTRAINT `mascota_has_alergia_ibfk_1` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mascota_has_alergia_ibfk_2` FOREIGN KEY (`Alergia_id`) REFERENCES `alergia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota_has_enfermedad`
--
ALTER TABLE `mascota_has_enfermedad`
  ADD CONSTRAINT `mascota_has_enfermedad_ibfk_1` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mascota_has_enfermedad_ibfk_2` FOREIGN KEY (`Enfermedad_id`) REFERENCES `enfermedad` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota_has_vacuna`
--
ALTER TABLE `mascota_has_vacuna`
  ADD CONSTRAINT `mascota_has_vacuna_ibfk_1` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mascota_has_vacuna_ibfk_2` FOREIGN KEY (`Vacuna_id`) REFERENCES `vacuna` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`Departamento_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`EstadoPublicacion_id`) REFERENCES `estadopublicacion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `temperamento_has_mascota`
--
ALTER TABLE `temperamento_has_mascota`
  ADD CONSTRAINT `temperamento_has_mascota_ibfk_1` FOREIGN KEY (`Temperamento_id`) REFERENCES `temperamento` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `temperamento_has_mascota_ibfk_2` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubigeo`
--
ALTER TABLE `ubigeo`
  ADD CONSTRAINT `ubigeo_ibfk_1` FOREIGN KEY (`Distrito_id`) REFERENCES `distrito` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ubigeo_ibfk_2` FOREIGN KEY (`Provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ubigeo_ibfk_3` FOREIGN KEY (`Departamento_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`EstadoUsuario_id`) REFERENCES `estadousuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Ubigeo_id`) REFERENCES `ubigeo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`IP_id`) REFERENCES `ip` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`Mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
