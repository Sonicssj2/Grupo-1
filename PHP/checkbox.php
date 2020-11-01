<?php

foreach($materias as $fila){
	echo '
		<p>
    	  <label for="'.$fila[1].'">
    	    <input type="checkbox" class="filled-in" id="'.$fila[1].'" name="'.$fila[1].'" value="'.$fila[0].'">
    	    <span>'.$fila[1].'</span>
    	  </label>
    	</p>
	';
}

?>