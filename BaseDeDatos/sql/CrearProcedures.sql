use chacawiki;

DELIMITER //

DROP PROCEDURE IF EXISTS SelecionarConWhereLike//
CREATE PROCEDURE SelecionarConWhereLike (IN vField VARCHAR(200), IN vTable VARCHAR(8), IN vA VARCHAR(16), IN vB VARCHAR(100))

BEGIN

	SELECT vField
	FROM vTable
	WHERE vA LIKE vB;

END//


DROP PROCEDURE IF EXISTS SeleccionarConWhereEqual//
CREATE PROCEDURE SeleccionarConWhereEqual (IN vField VARCHAR(200), IN vTable VARCHAR(8), IN vA VARCHAR(16), IN vB INt)

BEGIN

	SELECT vField
	FROM vTable
	WHERE vA=vB;

END//


DROP PROCEDURE IF EXISTS Seleccionar//
CREATE PROCEDURE Seleccionar (IN vField VARCHAR(200), IN vTable VARCHAR(8))

BEGIN

	SELECT vField
	FROM vTable;

END//


DROP PROCEDURE IF EXISTS Insertar//
CREATE PROCEDURE Insertar (IN vTable VARCHAR(8), IN vValues VARCHAR(200))

BEGIN

	INSERT INTO vTable
	VALUES (vValues);

END//


DROP PROCEDURE IF EXISTS ActualizarArchivos//
CREATE PROCEDURE ActualizarArchivos (IN vTarget VARCHAR(50),IN vNombre VARCHAR(50),IN vTipoArchivo VARCHAR(16))

BEGIN

	UPDATE archivos
	SET ruta=vTarget, nombre=vNombre, tipo_archivo=vTipoArchivo
	WHERE ruta LIKE vTarget;

END//

delimiter ;