<?php

//variable de sesion
$numero_documento=$_SESSION['numero_documento'];

//variable de POST
$materia_post=($_POST['materia']!=NULL)?$_POST['materia']:"";

//codigo slq materias
$select_materias="CALL SeleccionarMaterias($numero_documento)";

//respuesta de query materias
$rs_select_materias=connect($select_materias);

//variables de materias
$materias=mysqli_fetch_all($rs_select_materias,MYSQLI_NUM);
$num_rows_materias=mysqli_num_rows($rs_select_materias);
$num_fields_materias=mysqli_num_fields($rs_select_materias);

//resultado de materias liberado
mysqli_free_result($rs_select_materias);

//si se selecciono una materia:
if($materia_post!=""){
    //código slq recursos
    $select_recursos="CALL SeleccionarRecursos($materia_post)";

    //respuesta de query recursos
    $rs_select_recursos=connect($select_recursos);

    //variables de recursos
    $recursos=mysqli_fetch_all($rs_select_recursos,MYSQLI_NUM);
    $num_rows_recursos=mysqli_num_rows($rs_select_recursos);
    $num_fields_recursos=mysqli_num_fields($rs_select_recursos);

    //resultado de recursos liberado
    mysqli_free_result($rs_select_recursos);
}

/*
//se envia el array $materias a javascript
echo php_to_javascript($materias,"materias");

//se envia el array $recursos a javascript
echo php_to_javascript($recursos,"recursos");
*/

?>