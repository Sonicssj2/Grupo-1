USE chacawiki;

DELIMITER //



DROP PROCEDURE IF EXISTS SeleccionarContraseña//
CREATE PROCEDURE SeleccionarContraseña (IN vNumeroDocumento INT)
BEGIN
	SELECT contraseña
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento;
END//



DROP PROCEDURE IF EXISTS SeleccionarNumeroDocumento//
CREATE PROCEDURE SeleccionarNumeroDocumento (IN vNumeroDocumento INT)
BEGIN
	SELECT numero_documento
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento;
END//



DROP PROCEDURE IF EXISTS InsertarUsuarios//
CREATE PROCEDURE InsertarUsuarios (IN vNombre VARCHAR(30),IN vApellido VARCHAR(30),IN vTipoDocumento VARCHAR(3),IN vNumeroDocumento INT,IN vContraseña VARCHAR(50),IN vCurso INT,IN vDivision INT,IN vEmail VARCHAR(50))
BEGIN
	INSERT INTO usuarios(nombre,apellido,tipo_documento,numero_documento,contraseña,curso,division,email)
	VALUES (vNombre,vApellido,vTipoDocumento,vNumeroDocumento,vContraseña,vCurso,vDivision,vEmail);
END//



DROP PROCEDURE IF EXISTS SeleccionarMaterias//
CREATE PROCEDURE SeleccionarMaterias (IN vNumeroDocumento INT)
BEGIN
	SELECT *
	FROM materias
	WHERE id_materia IN (SELECT id_materia FROM usuarios_materias WHERE numero_documento=vNumeroDocumento);
END//



DROP PROCEDURE IF EXISTS SeleccionarNombreMaterias//
CREATE PROCEDURE SeleccionarNombreMaterias (IN vNumeroDocumento INT)
BEGIN
	SELECT nombre_materia
	FROM materias
	WHERE id_materia IN (SELECT id_materia FROM usuarios_materias WHERE numero_documento=vNumeroDocumento);
END//



DROP PROCEDURE IF EXISTS SeleccionarRecursosPorMateria//
CREATE PROCEDURE SeleccionarRecursosPorMateria (IN vIdMateria INT)
BEGIN
	SELECT ruta_recurso,nombre_recurso,tipo_recurso
	FROM recursos
	WHERE id_recurso IN (SELECT id_recurso FROM materias_recursos WHERE id_materia=vIdMateria);
END//



DROP PROCEDURE IF EXISTS SeleccionarRecursoPorRuta//
CREATE PROCEDURE SeleccionarRecursoPorRuta (IN vRutaRecurso VARCHAR(200))
BEGIN
	SELECT id_recurso,ruta_recurso
	FROM recursos
	WHERE ruta_recurso LIKE vRutaRecurso;
END//



DROP PROCEDURE IF EXISTS InsertarRecursos//
CREATE PROCEDURE InsertarRecursos (IN vRutaRecurso VARCHAR(200),IN vNombreRecurso VARCHAR(50),IN vTipoRecurso VARCHAR(16))
BEGIN
	INSERT INTO recursos(ruta_recurso,nombre_recurso,tipo_recurso)
	VALUES (vRutaRecurso,vNombreRecurso,vTipoRecurso);
END//



DROP PROCEDURE IF EXISTS InsertarMateriasRecursos1//
CREATE PROCEDURE InsertarMateriasRecursos1 (IN vIdMateria INT)
BEGIN
	INSERT INTO materias_recursos
	VALUES (vIdMateria,(SELECT MAX(id_recurso) FROM recursos));
END//



DROP PROCEDURE IF EXISTS InsertarMateriasRecursos2//
CREATE PROCEDURE InsertarMateriasRecursos2 (IN vIdMateria INT,IN vIdRecurso INT)
BEGIN
	INSERT INTO materias_recursos
	VALUES (vIdMateria,vIdRecurso);
END//



DELIMITER ;