<?php

require 'funciones.php';

require 'redireccionar.php';

require 'consultas.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="../Scripts/script.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../Estilos/estilo.css">
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
							<h5>Materia:</h5>
							<form method="POST" action="Materia.php?sid=<?=$sid?>" id="materia_form">
								<select class="browser-default waves-effect waves-light" id="materia" name="materia" onchange="document.getElementById('materia_form').submit()">
									<option value="">Seleccione una materia</option>
									
									<?php require 'opciones_select.php';?>
									
								</select><br>

								<?php require 'descripcion_materia.php';?>

							</form>
							<!--Fin de Sección de Materia-->

							<!--Sección de Recurso-->
							<form onsubmit="return subir_archivo(document.getElementById('materia_recurso').value)" method="POST" action="subir_recursos.php" enctype="multipart/form-data">
								<table class="centered">
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
										<td colspan="4"><input type="hidden" id="materia_recurso" name="materia_recurso" value="<?=$materia_post?>"></td>
									</tr>
									<tr>
										<td colspan="4"><button class="btn btn-outline-danger" type="submit">Subir</button></td>
									</tr>
									<tr>
										<td colspan="4"><h5>Advetencia: Si el recurso ya existe, sera reemplazado</h5></td>
									</tr>
								</table>
							</form>
							<!--Fin de Sección de Recurso-->
							
							<!--Sección de  Tabla recurso-->
							<table class="centered" id="recurso_table" name="recurso_table">

								<?php require 'tabla_recursos.php';?>

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