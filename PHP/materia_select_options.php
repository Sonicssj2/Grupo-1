<?php

//se generan las opciones del select contenedor de las materias
foreach ($materias as $materia) {
	if($materia[0]==$materia_post){
		echo '
			<option selected value="'.$materia[0].'">
				'.$materia[1].'
			</option>
		';
	}
	else{
		echo '
			<option value="'.$materia[0].'">
				'.$materia[1].'
			</option>
		';
	}
}

?>