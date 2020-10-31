<?php

#error_reporting(E_ALL ^ E_NOTICE);//ELIMINAR NOTICE DEL SERVIDOR.

require 'functions.php';

require 'materia_redirect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="../Scripts/script.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../Estilos/estilo.css">
	<script type="text/javascript">

		<?php include 'arrays_to_javascript.php';?>

	</script>
</head>
<body>
	<img class="img" src="../Imagenes/chaca.png">
	<main>
		<article>
			<div class="container">
				<div class="row">
					<div class="input-field s6">
						<h1 align="center">SECCIÓN DE MATERIAS</h1>
						<div>TIPO DE USUARIO:</div>
						<hr>
						<div>OPERACIONES EN EL SITIO:</div><br>
						<div align="center">

							<!--Sección de Materia-->
							<h5>Materia: </h5><select class="browser-default waves-effect waves-light" id="materia" onchange="materia_verde_logo(document.getElementById('materia').value,materias,'matv','img','descripcion')">
								<option value="">Seleccione una materia</option>

								<?php include 'materia_select.php';?>

							</select><br>
							<div id="matv">Seleccione una materia </div><img src="../Imagenes/chaca.png" width="30" height="20" id="img"><br>
							<div class="espacio">Descripcion de la materia:</div><div id="descripcion" name="descripcion" readonly></div><br>
							<!--Fin de Sección de Materia-->

							<!--Sección de Recurso-->
							<table class="centered">
								<form method="POST" action="subir_recurso.php" enctype="multipart/form-data">
									<caption><h5><u>Recurso</u></h5></caption>
									<tr>
										<td>Nombre: </td>
										<td><input type="text" id="nombre" name="nombre" required></td>
										<td>Tipo de Recurso:</td>
										<td>
											<select class="browser-default waves-effect waves-light" id="tipo_recurso" name="tipo_recurso" onchange="recurso_form(document.getElementById('tipo_recurso').value, document.getElementById('recurso'), document.getElementById('recurso_lbl'))" required>
												<option value="">Seleccione un tipo de recurso</option>
												<option value="PROGRAMA">PROGRAMA</option>
												<option value="TEORÍA">TEORÍA</option>
												<option value="TRABAJO PRÁCTICO">TRABAJO PRÁCTICO</option>
												<option value="NOTA">NOTA</option>
												<option value="ENLACE">ENLACE</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="4"><lable id="recurso_lbl"></lable><input type="hidden" id="recurso" name="recurso" required></td>
									</tr>
									<tr>
										<td colspan="4"><button class="btn btn-outline-danger" type="submit">Subir</button></td>
									</tr>
									<tr>
										<td colspan="4"><h5>Advetencia: Si el recurso ya existe, sera reemplazado</h5></td>
										
									</tr>
								</form>
							</table>
							<!--Fin de Sección de Recurso-->
							
							<!--Sección de  Tabla recurso-->
							<table class="centered" id="recurso_table" name="recurso_table">
								<tr>
									<td>PROGRAMA</td>
									<td>TEORÍA</td>
									<td>TRABAJOS PRÁCTICOS</td>
									<td>NOTAS</td>
									<td>ENLACES RELACIONADOS</td>
								</tr>
							</table>
							<!--Fin de Sección de Tabla recurso-->

						</div>
					</div>
				</div>
			</div>
		</article>
	</main>
	<footer class="footer-mati">
        <div class="texto-footer">División 7° 4° año 2018<br>Proyecto de implementación de sitios web dinámicos<br>Autores:...</div>
        </div>
    </footer>
</body>
</html>