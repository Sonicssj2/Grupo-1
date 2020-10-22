<?php

error_reporting(E_ALL ^ E_NOTICE);//ELIMINAR NOTICE DEL SERVIDOR.

//código slq
$sqlm='SELECT materia,descripcion FROM materias';
$sqla='SELECT ruta,nombre,tipo_archivo FROM archivos';

//conexión
$link=mysqli_connect('127.0.0.1','root','','chacawiki');

//variables de conexión
$rsm=mysqli_query($link,$sqlm);
$rsa=mysqli_query($link,$sqla);

//cierre de conexión
mysqli_close($link);

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
	<script>
		<?php

		//variables (icluido free de mysqli result)
		$materias=mysqli_fetch_all($rsm,MYSQLI_NUM);
		$num_rows=mysqli_num_rows($rsm);
		$num_fields=mysqli_num_fields($rsm);
		mysqli_free_result($rsm);
		$eco='let materias=[';

		//se genera un string contenedor de las descripciones de las materias, para luego ser enviado a javascript
		for ($f=0;$f<$num_rows;$f++){
			$eco.='[';
			for ($c=0;$c<$num_fields;$c++){
				$eco.=($c!=$num_fields-1)?'"'.str_replace(PHP_EOL, '\n', $materias[$f][$c]).'",':'"'.str_replace(PHP_EOL, '\n', $materias[$f][$c]).'"';
			}
			$eco.=($f!=$num_rows-1)?'],':']';
		}
		$eco.='];';

		//se envia el string con formato de array de Javascript
		echo $eco;

		?>
	</script>
</head>
<body>
	<img src="../Imagenes/chaca.png" width="100%" height="197">
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
								<?php

								//se generan las opciones del select contenedor de las materias
								foreach ($materias as $materia) {
									echo '<option value="'.$materia[0].'">'.$materia[0].'</option>';
								}

								?>
							</select><br>
							<div id="matv">Seleccione una materia </div><img src="../Imagenes/chaca.png" width="30" height="20" id="img"><br>
							<div class="espacio">Descripcion de la materia </div><textarea id="descripcion" name="descripcion" readonly></textarea><br>
							<!--Fin de Sección de Materia-->

							<!--Sección de Archivo-->
							<table class="centered">
								<form method="POST" action="archivo.php?replace=false" enctype="multipart/form-data">
									<caption><h5><u>Archivo</u></h5></caption>
									<tr>
										<td>Nombre: </td>
										<td><input type="text" id="nombre" name="nombre" required></td>
										<td><input type="file" id="archivo" name="archivo" required></td>
									</tr>
									<tr>
										<td colspan="3">
											Tipo de Archivo <select class="browser-default waves-effect waves-light" id="tipo_archivo" name="tipo_archivo" required>
											<option value="">Seleccione un tipo de archivo</option>
											<option value="PROGRAMA">PROGRAMA</option>
											<option value="TEORÍA">TEORÍA</option>
											<option value="TRABAJO PRÁCTICO">TRABAJO PRÁCTICO</option>
											<option value="NOTA">NOTA</option>
											<option value="ENLACE">ENLACE</option>
										</select>
										</td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit">Subir</button></td>
									</tr>
								</form>
							</table>
							<!--Fin de Sección de Archivo-->

							<hr class="doble">

							<!--Sección de  Tabla archivo-->
							<table class="centered">
								<tr>
									<td>PROGRAMA</td>
									<td>TEORÍA</td>
									<td>TRABAJOS PRÁCTICOS</td>
									<td>NOTAS</td>
									<td>ENLACES RELACIONADOS</td>
								</tr>
								<tr>
									<?php

									//variables (icluido free de mysqli result)
									$archivos=mysqli_fetch_all($rsa,MYSQLI_NUM);
									$num_rows=mysqli_num_rows($rsa);
									mysqli_free_result($rsa);
									$programa_i=0;
									$teoria_i=0;
									$trabajo_practico_i=0;
									$nota_i=0;
									$enlace_i=0;
									
									
									//se generan 5 arrays bidimensionales para almacenar los campos, agrupandolos por
									//tipo de archivo
									
									for($f=0;$f<$num_rows;$f++){
										switch($archivos[$f][2]){
											case 'PROGRAMA':
												$programa[$programa_i++]=$archivos[$f];
												break;
											case 'TEORÍA':
												$teoria[$teoria_i++]=$archivos[$f];
												break;
											case 'TRABAJO PRÁCTICO':
												$trabajo_practico[$trabajo_practico_i++]=$archivos[$f];
												break;
											case 'NOTA':
												$nota[$nota_i++]=$archivos[$f];
												break;
											case 'ENLACE':
												$enlace[$enlace_i++]=$archivos[$f];
												break;
											default:
												echo '<h1>ERROR DE TIPO DE ARCHIVO H1</h1>';
												break;
										}
									}

									//es la mayor longitud de los 5 arrays, para saber la cantidad maxima de filas de
									//la tabla HTML
									$max=max($programa_i,$teoria_i,$trabajo_practico_i,$nota_i,$enlace_i);

									//se reestablecen las variables que almacenaban la longitud de los arrays
									$programa_i=0;
									$teoria_i=0;
									$trabajo_practico_i=0;
									$nota_i=0;
									$enlace_i=0;

									//se crea la tabla, ordenando los valores insertados por el tipo de archivo
									for($a=0;$a<$max;$a++){
										for($i=0;$i<5;$i++){
											switch($i){
												case 0:
													echo '<td><a href="'.$programa[$programa_i][0].'">'.$programa[$programa_i++][1].'</a></td>';
													break;
												case 1:
													echo '<td><a href="'.$teoria[$teoria_i][0].'">'.$teoria[$teoria_i++][1].'</a></td>';
													break;
												case 2:
													echo '<td><a href="'.$trabajo_practico[$trabajo_practico_i][0].'">'.$trabajo_practico[$trabajo_practico_i++][1].'</a></td>';
													break;
												case 3:
													echo '<td><a href="'.$nota[$nota_i][0].'">'.$nota[$nota_i++][1].'</a></td>';
													break;
												case 4:
													echo '<td><a href="'.$enlace[$enlace_i][0].'">'.$enlace[$enlace_i++][1].'</a></td>';
													break;
												default:
													echo '<td><h1>ERROR DE TIPO DE ARCHIVO TD</h1></td>';
													break;
											}
										}
										echo ($a!=$max-1)?'</tr><tr>':'</tr>';
									}

									?>
							</table>
							<!--Fin de Sección de Tabla archivo-->
						</div>
					</div>
				</div>
			</div>
		</article>
	</main>
	<footer class="page-footer black darken-3">
		<div class="container">
			<hr size="3">
			<div>División 7° 4° año 2018<br>Proyecto de implementación de sitios web dinámicos<br>Autores:...</div>
		</div>
	</footer>
</body>
</html>