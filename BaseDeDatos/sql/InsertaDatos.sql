USE chacawiki;

TRUNCATE TABLE archivos;

INSERT INTO `archivos` (`id_archivo`, `id_materia`, `ruta_archivo`, `nombre_archivo`, `tipo_archivo`) VALUES
(1, 1, '../Archivos/test_PROGRAMA.pdf', 'test_PROGRAMA', 'PROGRAMA'),
(2, 2, '../Archivos/test_TEORÍA.pdf', 'test_TEORÍA', 'TEORÍA'),
(3, 3, '../Archivos/test_TRABAJO_PRÁCTICO.pdf', 'test_TRABAJO_PRÁCTICO', 'TRABAJO PRÁCTICO'),
(4, 4, '../Archivos/test_NOTA.pdf', 'test_NOTA', 'NOTA'),
(5, 5, '../Archivos/test_ENLACE.pdf', 'test_ENLACE', 'ENLACE');





TRUNCATE TABLE cursos;

INSERT INTO `cursos` (`id_curso`, `numero_curso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);





TRUNCATE TABLE divisiones;

INSERT INTO `divisiones` (`id_division`, `id_curso`, `numero_division`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 1),
(8, 2, 2),
(9, 2, 3),
(10, 2, 4),
(11, 2, 5),
(12, 2, 6),
(13, 3, 1),
(14, 3, 2),
(15, 3, 3),
(16, 3, 4),
(17, 3, 5),
(18, 3, 6),
(19, 4, 1),
(20, 4, 2),
(21, 4, 3),
(22, 4, 4),
(23, 4, 5),
(24, 4, 6),
(25, 5, 1),
(26, 5, 2),
(27, 5, 3),
(28, 5, 4),
(29, 5, 5),
(30, 5, 6),
(31, 6, 1),
(32, 6, 2),
(33, 6, 3),
(34, 6, 4),
(35, 6, 5),
(36, 6, 6);





TRUNCATE TABLE materias;

INSERT INTO `materias` (`id_materia`, `id_curso`, `nombre_materia`, `icono_materia`, `descripcion_materia`) VALUES
(1, 1, 'Geografía', '../Imagenes/Geografía', 'geo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc'),
(2, 2, 'Historia', '../Imagenes/Historia', 'his_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc'),
(3, 3, 'Literatura', '../Imagenes/Literatura', 'lit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc'),
(4, 4, 'Matemática', '../Imagenes/Matemática', 'mat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc'),
(5, 5, 'Arte', '../Imagenes/Arte', 'art_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc');





TRUNCATE TABLE usuarios;

INSERT INTO `usuarios` (`id_usuario`, `id_division`, `nombre`, `apellido`, `tipo_documento`, `numero_documento`, `contraseña`, `email`) VALUES
(1, 1, 'Julia', 'Pérez', 'LC', 2597715, 'jp', 'juliaperez@gmail.com'),
(2, 7, 'Tobías', 'Gómez', 'LE', 3596214, 'tg', 'tobiasgomez@gmail.com'),
(3, 13, 'Damián', 'González', 'LE', 5568213, 'dg', 'damiangonzalez@gmail.com'),
(4, 19, 'Martina', 'Fernández', 'DNI', 43954297, 'mr', 'martinarodriguez@gmail.com'),
(5, 25, 'Pablo', 'López', 'DNI', 41647242, 'pl', 'pablolopez@gmail.com'),
(6, 31, 'Cristina', 'Rodríguez', 'DNI', 44646612, 'cr', 'cristinarodriguez@gmail.com');

/*Añadir relaciones*/

ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON UPDATE CASCADE;

ALTER TABLE `divisiones`
  ADD CONSTRAINT `divisiones_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE;

ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE;

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_division`) REFERENCES `divisiones` (`id_division`) ON UPDATE CASCADE;