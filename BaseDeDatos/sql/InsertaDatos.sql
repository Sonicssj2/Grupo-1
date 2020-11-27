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
(1, '../Recursos/test_PROGRAMA.pdf', 'test_PROGRAMA', 'PROGRAMA'),
(2, '../Recursos/test_TEORÍA.pdf', 'test_TEORÍA', 'TEORÍA'),
(3, '../Recursos/test_TRABAJO_PRÁCTICO.pdf', 'test_TRABAJO_PRÁCTICO', 'TRABAJO PRÁCTICO'),
(4, '../Recursos/test_NOTA.pdf', 'test_NOTA', 'NOTA'),
(5, '../Recursos/test_ENLACE.pdf', 'test_ENLACE', 'ENLACE'),
(6, 'https://es.wikipedia.org/wiki/Wikipedia:Portada', 'Wikipedia', 'ENLACE');

TRUNCATE TABLE usuarios_materias;
INSERT INTO `usuarios_materias` (`numero_documento`, `tipo_documento`, `id_materia`) VALUES
(2597715, 'LC', 1),
(2597715, 'LC', 2),
(3596214, 'LE', 1),
(3596214, 'LE', 2),
(5568213, 'LE', 3),
(5568213, 'LE', 4),
(43954297, 'DNI', 3),
(43954297, 'DNI', 4),
(41647242, 'DNI', 5),
(41647242, 'DNI', 6),
(44646612, 'DNI', 5),
(44646612, 'DNI', 6);

TRUNCATE TABLE materias_recursos;
INSERT INTO `materias_recursos` (`id_materia`, `id_recurso`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(4, 4),
(4, 5),
(5, 5),
(5, 6),
(6, 1),
(6, 6);