<?php
//print_r($_POST);
if(empty($_POST["Enviar"]) || empty($_POST["Nombre"]) || empty($_POST["Correo"]) || empty($_POST["Mensaje"])){
    header('Location: contacto.php?mensaje=falta informacion');
    exit();
}




// connect to the database
include("db_conn3.php");


//initializing variables
$Nombre= $_POST['Nombre'];
$Correo= $_POST['Correo'];
$Mensaje= $_POST['Mensaje'];

$sentencia = $bd->prepare("INSERT INTO contacto(Nombre,Correo,Mensaje) VALUES (?,?,?);");
$resultado2 = $sentencia->execute([$Nombre,$Correo,$Mensaje]);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagen/png" href="../imagen/reduccion2.png">
    <title>COFEECAT</title>
    <meta name="description" content="Página web de blog de café con gatos">

    <!-- Prefetch -->
    <link rel="prefetch" href="nosotros.html" as="document">

    <!-- Preload -->
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
        crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header class="header">

        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="../index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">COFEE<span class="logo__bold">CAT</span></h1>


                </a>
                <div class="logo">
                    <img src="../imagen/Coffee Cat logo cafeteria.png">
                </div>

                <nav class="navegacion">
                    <a href="nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="cursos.html" class="navegacion__enlace">Agenda</a>
                    <a href="contacto.html" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <h2 class="no-margin">Su Reservación
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coffee" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M3 14c.83 .642 2.077 1.017 3.5 1c1.423 .017 2.67 -.358 3.5 -1c.83 -.642 2.077 -1.017 3.5 -1c1.423 -.017 2.67 .358 3.5 1">
                    </path>
                    <path d="M8 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                    <path d="M12 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                    <path d="M3 10h14v5a6 6 0 0 1 -6 6h-2a6 6 0 0 1 -6 -6v-5z"></path>
                    <path d="M16.746 16.726a3 3 0 1 0 .252 -5.555"></path>
                </svg>

            </h2>


            <p class="no-margin">Citas penidientes
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cup" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 11h14v-3h-14z"></path>
                    <path d="M17.5 11l-1.5 10h-8l-1.5 -10"></path>
                    <path d="M6 8v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                    <path d="M15 5v-2"></path>
                </svg>
            </p>
        </div>
    </header>
    <main class="contenedor">
        <h3 class="centrar-texto">Reservaciones</h3>
        <div class="container mt-5">
            <div class="contacto-bg3"></div>
            <form action="F1.php" method="POST" class="formulario">
                <?php
            if($resultado2 === TRUE){
                echo "OK...Tenemos su mensaje";
                echo "Pronto nos contactaremos con usted por su correo ";
                echo "Lo esperamos ";
            }else{
                echo "Parece que hubo un fallo =(";
                echo "Intentelo de nuevo más tarde";
            }
            ?>
                <?php
        include_once('db_conn3.php');
        $sentencia = $bd -> query("select * from contacto");
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //print_r($persona);
        ?>




        </div>
        <center>
            <img src="../img/baile.gif" alt="funny GIF" width="45%">
        </center>
        </form>
    </main>
    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="../index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Coffee<span class="logo__bold">Cat</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="../nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="../cursos.html" class="navegacion__enlace">Agenda</a>
                    <a href="../contacto.html" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>
    </footer>

    <script src="../js/modernizr.js"></script>
</body>

</html>