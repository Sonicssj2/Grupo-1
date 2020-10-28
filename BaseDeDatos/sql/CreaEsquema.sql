DROP DATABASE IF EXISTS chacawiki;
CREATE DATABASE IF NOT EXISTS chacawiki;

USE chacawiki;

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `ruta_archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_archivo` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `icono_materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_materia` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `curso` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;