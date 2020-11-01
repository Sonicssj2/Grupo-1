<?php

if($materia_post==""||$materia_post==NULL){
	echo '
		<div id="matv">
			Seleccione una materia
		</div>
		<img src="../Imagenes/chaca.png" width="30" height="20" id="img">
		<br>
		<div class="espacio">
			Descripcion de la materia:
		</div>
		<div id="descripcion" name="descripcion">
		</div>
		<br>
	';
}
else{
	for($f=0;$f<$num_rows_materias;$f++){
		if($materias[$f][0]==$materia_post){
			echo '
				<div id="matv">
					'.$materias[$f][1].'
				</div>
				<img src="'.$materias[$f][2].'" width="30" height="20" id="img">
				<br>
				<div class="espacio">
					Descripcion de la materia:
				</div>
				<div id="descripcion" name="descripcion">
					'.str_replace(PHP_EOL, '<br>', $materias[$f][3]).'
				</div>
				<br>
			';
			break;
		}

	}
}


?>