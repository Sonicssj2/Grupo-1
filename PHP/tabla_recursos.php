<?php

//tabla de recursos
if($materia_post!=""){
	//cabecera
	echo "<tr>";
	$flag=true;
	foreach($cabeceras as $cabecera){
		if($flag){
			$flag=false;
			continue;
		}
		echo "<td><b>$cabecera->name</b></td>";
	}
	echo "</tr>";
	
	//tabla
	foreach($recursos as $recurso){
		echo "
			<tr>
				<td><a href='$recurso[0]'>$recurso[1]</a></td>
				<td>$recurso[2]</td>
			</tr>
		";
	}
}

?>