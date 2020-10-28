USE chacawiki;

TRUNCATE TABLE archivos;

INSERT INTO `archivos` (`id_archivo`, `ruta_archivo`, `nombre_archivo`, `tipo_archivo`) VALUES
(1, '../Archivos/test_PROGRAMA.pdf', 'test_PROGRAMA', 'PROGRAMA'),
(2, '../Archivos/test_TEORÍA.pdf', 'test_TEORÍA', 'TEORÍA'),
(3, '../Archivos/test_TRABAJO_PRÁCTICO.pdf', 'test_TRABAJO_PRÁCTICO', 'TRABAJO PRÁCTICO'),
(4, '../Archivos/test_NOTA.pdf', 'test_NOTA', 'NOTA'),
(5, '../Archivos/test_ENLACE.pdf', 'test_ENLACE', 'ENLACE');

TRUNCATE TABLE materias;

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `icono_materia`, `descripcion_materia`) VALUES
(1, 'Geografía', '../Imagenes/Geografía', 'geo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc\r\ngeo_desc'),
(2, 'Historia', '../Imagenes/Historia', 'his_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc\r\nhis_desc'),
(3, 'Literatura', '../Imagenes/Literatura', 'lit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc\r\nlit_desc'),
(4, 'Matemática', '../Imagenes/Matemática', 'mat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc\r\nmat_desc');

TRUNCATE TABLE usuarios;

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `tipo_documento`, `numero_documento`, `contraseña`, `curso`, `division`, `email`) VALUES
(1, 'Julia', 'Pérez', 'LC', 2597715, 'jp', 6, 6, 'juliaperez@gmail.com'),
(2, 'Tobías', 'Gómez', 'LE', 3596214, 'tg', 5, 6, 'tobiasgomez@gmail.com'),
(3, 'Damián', 'González', 'LE', 5568213, 'dg', 4, 2, 'damiangonzalez@gmail.com'),
(4, 'Martina', 'Rodríguez', 'DNI', 43954297, 'mr', 2, 3, 'martinarodriguez@gmail.com'),
(5, 'Pablo', 'López', 'DNI', 41647242, 'pl', 1, 5, 'pablolopez@gmail.com');