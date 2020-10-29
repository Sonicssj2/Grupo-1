use chacawiki;

DELIMITER //

DROP PROCEDURE IF EXISTS SeleccionarNumeroDocumentoDeUsuariosConWhere//
CREATE PROCEDURE SeleccionarNumeroDocumentoDeUsuariosConWhere (IN vNumeroDocumento INT)

BEGIN

	SELECT numero_documento
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento;

END//





DROP PROCEDURE IF EXISTS SeleccionarIdDivisionDeDivisionesConWhere//
CREATE PROCEDURE SeleccionarIdDivisionDeDivisionesConWhere (IN vCurso INT, IN vDivision INT)

BEGIN

	SELECT id_division
	FROM divisiones
	WHERE id_curso=(SELECT id_curso FROM cursos WHERE numero_curso=vCurso) AND numero_division=vDivision;

END//





DROP PROCEDURE IF EXISTS SeleccionarContraseñaDeUsuariosConWhere//
CREATE PROCEDURE SeleccionarContraseñaDeUsuariosConWhere (IN vNumeroDocumento INT)

BEGIN

	SELECT contraseña
	FROM usuarios
	WHERE numero_documento=vNumeroDocumento;

END//





DROP PROCEDURE IF EXISTS SeleccionarArchivosConWhere//
CREATE PROCEDURE SeleccionarArchivosConWhere (IN vRutaArchivo VARCHAR(50))

BEGIN

	SELECT ruta_archivo
	FROM archivos
	WHERE ruta_archivo LIKE vRutaArchivo;

END//





DROP PROCEDURE IF EXISTS SeleccionarMaterias//
CREATE PROCEDURE SeleccionarMaterias ()

BEGIN

	SELECT nombre_materia,descripcion_materia
	FROM materias;

END//





DROP PROCEDURE IF EXISTS SeleccionarArchivos//
CREATE PROCEDURE SeleccionarArchivos ()

BEGIN

	SELECT ruta_archivo,nombre_archivo,tipo_archivo
	FROM archivos;

END//





DROP PROCEDURE IF EXISTS InsertarUsuarios//
CREATE PROCEDURE InsertarUsuarios (IN vIdDivision INT, IN vNombre VARCHAR(30),IN vApellido VARCHAR(30),IN vTipoDocumento VARCHAR(3),IN vNumeroDocumento INT,IN vContraseña VARCHAR(50), IN vEmail VARCHAR(50))

BEGIN

	INSERT INTO usuarios(id_division,nombre,apellido,tipo_documento,numero_documento,contraseña,email)
	VALUES (vIdDivision,vNombre,vApellido,vTipoDocumento,vNumeroDocumento,vContraseña,vEmail);

END//





DROP PROCEDURE IF EXISTS InsertarArchivos//
CREATE PROCEDURE InsertarArchivos (IN vRutaArchivo VARCHAR(50),IN vNombreArchivo VARCHAR(50),IN vTipoArchivo VARCHAR(16))

BEGIN

	INSERT INTO archivos(ruta_archivo,nombre_archivo,tipo_archivo)
	VALUES (vRutaArchivo,vNombreArchivo,vTipoArchivo);

END//





DROP PROCEDURE IF EXISTS ActualizarArchivos//
CREATE PROCEDURE ActualizarArchivos (IN vRutaArchivo VARCHAR(50),IN vNombreArchivo VARCHAR(50),IN vTipoArchivo VARCHAR(16))

BEGIN

	UPDATE archivos
	SET ruta_archivo=vRutaArchivo, nombre_archivo=vNombreArchivo, tipo_archivo=vTipoArchivo
	WHERE ruta_archivo LIKE vRutaArchivo;

END//

DELIMITER ;