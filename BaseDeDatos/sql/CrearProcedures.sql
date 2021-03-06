USE chacawiki;

DELIMITER //



DROP PROCEDURE IF EXISTS SeleccionarContraseña//
CREATE PROCEDURE SeleccionarContraseña (IN vNumeroDocumento INT,IN VTipoDocumento VARCHAR(3))
BEGIN
	SELECT contraseña
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento AND tipo_documento LIKE VTipoDocumento;
END//



DROP PROCEDURE IF EXISTS SeleccionarNumeroDocumento//
CREATE PROCEDURE SeleccionarNumeroDocumento (IN vNumeroDocumento INT,IN VTipoDocumento VARCHAR(3))
BEGIN
	SELECT numero_documento
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento AND tipo_documento LIKE VTipoDocumento;
END//



DROP PROCEDURE IF EXISTS InsertarUsuarios//
CREATE PROCEDURE InsertarUsuarios (IN vNombre VARCHAR(30),IN vApellido VARCHAR(30),IN vTipoDocumento VARCHAR(3),IN vNumeroDocumento INT,IN vContraseña VARCHAR(50),IN vCurso INT,IN vDivision INT,IN vEmail VARCHAR(50))
BEGIN
	INSERT INTO usuarios(nombre,apellido,tipo_documento,numero_documento,contraseña,curso,division,email)
	VALUES (vNombre,vApellido,vTipoDocumento,vNumeroDocumento,vContraseña,vCurso,vDivision,vEmail);
END//



DROP PROCEDURE IF EXISTS SeleccionarMaterias//
CREATE PROCEDURE SeleccionarMaterias (IN vNumeroDocumento INT,IN VTipoDocumento VARCHAR(3))
BEGIN
	SELECT *
	FROM materias
	WHERE id_materia IN (SELECT id_materia FROM usuarios_materias WHERE numero_documento=vNumeroDocumento AND tipo_documento LIKE VTipoDocumento);
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
	SELECT id_recurso
	FROM recursos
	WHERE ruta_recurso LIKE vRutaRecurso;
END//



DROP PROCEDURE IF EXISTS InsertarRecursos//
CREATE PROCEDURE InsertarRecursos (IN vRutaRecurso VARCHAR(200),IN vNombreRecurso VARCHAR(50),IN vTipoRecurso VARCHAR(16))
BEGIN
	INSERT INTO recursos(ruta_recurso,nombre_recurso,tipo_recurso)
	VALUES (vRutaRecurso,vNombreRecurso,vTipoRecurso);
END//



DROP PROCEDURE IF EXISTS InsertarUltimoRegistro//
CREATE PROCEDURE InsertarUltimoRegistro (IN vIdMateria INT)
BEGIN
	INSERT INTO materias_recursos
	VALUES (vIdMateria,(SELECT MAX(id_recurso) FROM recursos));
END//



DROP PROCEDURE IF EXISTS test//
CREATE PROCEDURE test (IN vIdMateria INT,IN vIdRecurso INT)
BEGIN
	SELECT *
	FROM materias_recursos
	WHERE id_materia=vIdMateria AND id_recurso=vIdRecurso;
END//



DROP PROCEDURE IF EXISTS InsertarMateriasRecursos//
CREATE PROCEDURE InsertarMateriasRecursos (IN vIdMateria INT,IN vIdRecurso INT)
BEGIN
	INSERT INTO materias_recursos
	VALUES (vIdMateria,vIdRecurso);
END//



DELIMITER ;