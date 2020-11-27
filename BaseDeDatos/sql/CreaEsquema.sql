DROP DATABASE IF EXISTS chacawiki;
CREATE DATABASE IF NOT EXISTS chacawiki;

USE chacawiki;

/*Crear tablas*/

CREATE TABLE `usuarios` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `curso` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `icono_materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_materia` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `ruta_recurso` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_recurso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_recurso` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `usuarios_materias` (
  `numero_documento` int(11) NOT NULL,
  `tipo_documento` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `materias_recursos` (
  `id_materia` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Añadir llaves*/

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numero_documento`,`tipo_documento`);

ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`);

ALTER TABLE `usuarios_materias`
  ADD PRIMARY KEY (`numero_documento`,`tipo_documento`,`id_materia`);

ALTER TABLE `materias_recursos`
  ADD PRIMARY KEY (`id_materia`,`id_recurso`);

/*Añadir auto-incrementacion*/

ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;

ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;