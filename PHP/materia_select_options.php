<?php

//se generan las opciones del select contenedor de las materias
foreach ($materias as $materia) {
	echo '<option value="'.$materia[1].'">'.$materia[1].'</option>';
}

?>