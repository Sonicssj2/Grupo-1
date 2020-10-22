<?php

//se generan las opciones del select contenedor de las materias
foreach ($materias as $materia) {
	echo '<option value="'.$materia[0].'">'.$materia[0].'</option>';
}

?>