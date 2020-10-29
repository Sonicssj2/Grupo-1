DROP DATABASE IF EXISTS chacawiki;
CREATE DATABASE IF NOT EXISTS chacawiki;

USE chacawiki;

/*Crear tablas*/

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `ruta_archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_archivo` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `numero_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `divisiones` (
  `id_division` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `numero_division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nombre_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `icono_materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_materia` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_division` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Añadir llaves*/

ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_materia` (`id_materia`);

ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

ALTER TABLE `divisiones`
  ADD PRIMARY KEY (`id_division`),
  ADD KEY `id_curso` (`id_curso`);

ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_curso` (`id_curso`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_division` (`id_division`);

/*Añadir auto-incrementacion*/

ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;

ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;

ALTER TABLE `divisiones`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;

ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT/*, AUTO_INCREMENT=*/;