USE chacawiki;

TRUNCATE TABLE usuarios;
INSERT INTO `usuarios` (`nombre`, `apellido`, `tipo_documento`, `numero_documento`, `contraseña`, `curso`, `division`, `email`) VALUES
('Julia', 'Pérez', 'LC', 2597715, 'jp', 1, 1, 'juliaperez@gmail.com'),
('Tobías', 'Gómez', 'LE', 3596214, 'tg', 2, 2, 'tobiasgomez@gmail.com'),
('Damián', 'González', 'LE', 5568213, 'dg', 3, 3, 'damiangonzalez@gmail.com'),
('Martina', 'Fernández', 'DNI', 43954297, 'mr', 4, 4, 'martinarodriguez@gmail.com'),
('Pablo', 'López', 'DNI', 41647242, 'pl', 5, 5, 'pablolopez@gmail.com'),
('Cristina', 'Rodríguez', 'DNI', 44646612, 'cr', 6, 6, 'cristinarodriguez@gmail.com');

TRUNCATE TABLE materias;
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `icono_materia`, `descripcion_materia`) VALUES
(1, 'Geografía', '../Imagenes/Geografía.png', 'geo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc'),
(2, 'Historia', '../Imagenes/Historia.png', 'his_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc'),
(3, 'Literatura', '../Imagenes/Literatura.png', 'lit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc'),
(4, 'Matemática', '../Imagenes/Matemática.png', 'mat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc'),
(5, 'Arte', '../Imagenes/Arte.png', 'art_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc\r\nart_desc'),
(6, 'Educación Física', '../Imagenes/Educación Física.png', 'ef_desc\r\nef_desc\r\nef_desc\r\nef_desc\r\nef_desc\r\nef_desc\r\nef_desc');

TRUNCATE TABLE recursos;
INSERT INTO `recursos` (`id_recurso`, `ruta_recurso`, `nombre_recurso`, `tipo_recurso`) VALUES
(1, '../Archivos/test_PROGRAMA.pdf', 'test_PROGRAMA', 'PROGRAMA'),
(2, '../Archivos/test_TEORÍA.pdf', 'test_TEORÍA', 'TEORÍA'),
(3, '../Archivos/test_TRABAJO_PRÁCTICO.pdf', 'test_TRABAJO_PRÁCTICO', 'TRABAJO PRÁCTICO'),
(4, '../Archivos/test_NOTA.pdf', 'test_NOTA', 'NOTA'),
(5, '../Archivos/test_ENLACE.pdf', 'test_ENLACE', 'ENLACE'),
(6, 'https://es.wikipedia.org/wiki/Wikipedia:Portada', 'Wikipedia', 'ENLACE');

TRUNCATE TABLE usuarios_materias;
INSERT INTO `usuarios_materias` (`numero_documento`, `id_materia`) VALUES
(2597715, 1),
(3596214, 2),
(5568213, 3),
(43954297, 4),
(41647242, 5),
(44646612, 6);

TRUNCATE TABLE materias_recursos;
INSERT INTO `materias_recursos` (`id_materia`, `id_recurso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

/*Añadir relaciones*/
ALTER TABLE `materias_recursos`
  ADD CONSTRAINT `materias_recursos_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias_recursos_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `usuarios_materias`
  ADD CONSTRAINT `usuarios_materias_ibfk_1` FOREIGN KEY (`numero_documento`) REFERENCES `usuarios` (`numero_documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_materias_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;