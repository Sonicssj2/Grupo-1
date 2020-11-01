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



DROP PROCEDURE IF EXISTS SeleccionarRecursos//
CREATE PROCEDURE SeleccionarRecursos (IN vNumeroDocumento INT)
BEGIN
	SELECT *
	FROM recursos
	WHERE id_recurso IN (SELECT id_recurso FROM materias_recursos WHERE id_materia IN (SELECT id_materia FROM usuarios_materias WHERE numero_documento=vNumeroDocumento));
END//



DROP PROCEDURE IF EXISTS SeleccionarRuta//
CREATE PROCEDURE SeleccionarRuta (IN vRutaArchivo VARCHAR(50))
BEGIN
	SELECT ruta_recurso
	FROM recursos
	WHERE ruta_recurso LIKE vRutaArchivo;
END//



DROP PROCEDURE IF EXISTS InsertarRecursos//
CREATE PROCEDURE InsertarRecursos (IN vRutaRecurso VARCHAR(50),IN vNombreRecurso VARCHAR(50),IN vTipoRecurso VARCHAR(16))
BEGIN
	INSERT INTO recursos(ruta_recurso,nombre_recurso,tipo_recurso)
	VALUES (vRutaRecurso,vNombreRecurso,vTipoRecurso);
END//



DROP PROCEDURE IF EXISTS ActualizarRecursos//
CREATE PROCEDURE ActualizarRecursos (IN vRutaRecurso VARCHAR(50),IN vNombreRecurso VARCHAR(50),IN vTipoRecurso VARCHAR(16))
BEGIN
	UPDATE recursos
	SET ruta_recurso=vRutaRecurso, nombre_recurso=vNombreRecurso, tipo_recurso=vTipoRecurso
	WHERE ruta_recurso LIKE vRutaRecurso;
END//



DELIMITER ;