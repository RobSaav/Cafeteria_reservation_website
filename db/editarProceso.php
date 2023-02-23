<?php
include_once('db_conn2.php');
//print_r($_POST);
if(!isset($_POST['ID'])){
    header('Location: citas.php?mensaje = error');
    echo "error";
    exit();
}

// connect to the database


//initializing variables
if(isset($_POST["ID"])){

$codigo = $_POST['ID'];
$Nombre= $_POST['Nombre'];
$Telefono= $_POST['Telefono'];
$Fecha= $_POST['Fecha'];
$Hora= $_POST['Hora'];
$Correo= $_POST['Correo'];
$Mensaje= $_POST['Mensaje'];
$Personas= $_POST['Personas'];
}
$sentencia = $bd->prepare("UPDATE citas SET Nombre = ?, Telefono = ?, Fecha = ?, Hora = ? , Correo = ?, Mensaje = ?, Personas = ? WHERE ID = ?;");

$resultado = $sentencia->execute([$Nombre,$Telefono,$Fecha,$Hora,$Correo,$Mensaje,$Personas,$codigo]);

if ($resultado === TRUE){
    echo "ok id ".$codigo;
    header("Location: citas.php?mensaje=Ok, cambiado");

}else{
	$codigo = $_GET['ID'];
	
    echo "ERRROR";
}