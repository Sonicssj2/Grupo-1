<?php 

 //tabla de recursos
if($materia_post!=""){
	//nombre de las columnas
	echo "
		<tr>
			<td>PROGRAMA</td>
			<td>TEORÍA</td>
			<td>TRABAJOS PRÁCTICOS</td>
			<td>NOTAS</td>
			<td>ENLACES RELACIONADOS</td>
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
}

?>