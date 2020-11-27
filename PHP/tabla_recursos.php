<?php

//tabla de recursos
if($materia_post!=""){
	//cabecera
	echo "<tr>";
	for($f=1;$f<$num_fields_recursos;$f++){
		echo "<td><b>".$cabecera[$f]->name."</b></td>";
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
	/*
	//nombre de las columnas
	echo "
		<tr>
			<td><b>PROGRAMA</b></td>
			<td><b>TEORÍA</b></td>
			<td><b>TRABAJOS PRÁCTICOS</b></td>
			<td><b>NOTAS</b></td>
			<td><b>ENLACES RELACIONADOS</b></td>
		</tr>
	";

	//variables
	$cols=["PROGRAMA","TEORÍA","TRABAJO PRÁCTICO","NOTA","ENLACE"];
	$r=0;

	//filas
	while($r!=$num_rows_recursos){
		echo "<tr>";
		for($c=0;$c<5;$c++){
			$w=0;
			for($f=0;$f<$num_rows_recursos;$f++){
				if($recursos[$f][2]==$cols[$c]){
					echo "<td><a href='".$recursos[$f][0]."'>".$recursos[$f][1]."</a></td>";
					$recursos[$f][2]="-";
					$r++;
					break;
				}
				else{
					$w++;
				}
			}
			if($w==$num_rows_recursos){
				echo "<td></td>";
			}
		}
		echo "</tr>";
	}
	*/
}

?>