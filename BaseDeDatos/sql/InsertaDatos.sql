USE chacawiki;

INSERT INTO `archivos` (`id_archivo`, `ruta`, `nombre`, `tipo_archivo`) VALUES
(1, '../Archivos/test_PROGRAMA.pdf', 'test_PROGRAMA', 'PROGRAMA'),
(2, '../Archivos/test_TEORÍA.pdf', 'test_TEORÍA', 'TEORÍA'),
(5, '../Archivos/test_ENLACE.pdf', 'test_ENLACE', 'ENLACE'),
(8, '../Archivos/test_NOTA.pdf', 'test_NOTA', 'NOTA'),
(9, '../Archivos/Santiago.txt', 'Santiago', 'NOTA'),
(17, '../Archivos/Santiago.PNG', 'Santiago', 'ENLACE'),
(18, '../Archivos/sg.txt', 'sg', 'PROGRAMA'),
(19, '../Archivos/abc.txt', 'abc', 'TEORÍA'),
(20, '../Archivos/test_TRABAJO_PRÁCTICO.pdf', 'test_TRABAJO_PRÁCTICO', 'TRABAJO PRÁCTICO');

INSERT INTO `materias` (`id_materia`, `materia`, `icono`, `descripcion`) VALUES
(1, 'Geografía', '', 'geo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc'),
(2, 'Historia', '', 'his_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc'),
(3, 'Literatura', '', 'lit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc'),
(4, 'Matemática', '', 'mat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc');

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `tipo_documento`, `numero_documento`, `contraseña`, `curso`, `division`, `email`) VALUES
(1, 'Santiago', 'García', 'DNI', 43597715, 'sg', 6, '6°', 'santiagokid11@gmail.com'),
(2, 'Santiago', 'Garcia', 'DNI', 43597714, 'sg', 6, '6°', 'santiagokid11@gmail.com'),
(3, 'Santiago', 'Garcia', 'DNI', 43597713, 'sg', 6, '6°', 'santiagokid11@gmail.com');