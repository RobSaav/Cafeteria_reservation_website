<?php 
 include('db_conn2.php');
    if(!isset($_GET['ID'])){
        header('Location: citas.php?mensaje=error ahora');
        exit();
    }

   
    $codigo = $_GET['ID'];

    $sentencia = $bd->prepare("DELETE FROM citas where ID = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: citas.php?mensaje=eliminado');
    } else {
        header('Location: citas.php?mensaje=error');
    }
    
?>