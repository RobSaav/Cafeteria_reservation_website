<?php
        include('db_conn2.php');
        //print_r($persona);
        
        $sentencia = $bd -> query("select * from citas");
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //if(isset($_GET['ID'])){
          //  header('Location: citas.php?mensaje=error');
        //}

        $codigo = $_GET['ID'];

        $sentencia = $bd->prepare("select * from citas where ID = ?;");
        $sentencia->execute([$codigo]);
        $persona = $sentencia->fetch(PDO::FETCH_OBJ);
        //print_r($persona);
        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagen/png" href="../imagen/reduccion2.png">
    <title>COFEECAT Formulario</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script>
    function confirmacion() {
        var respuesta = confirm("¿Desea borrar o editar la fecha?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
    </script>
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
                    <a href="../nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="../cursos.html" class="navegacion__enlace">Agenda</a>
                    <a href="../db/contacto.php" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <h2 class="no-margin">Editar cita seleccionada</h2>
            <p class="no-margin">Modifique los datos</p>
        </div>
    </header>

    <main class="contenedor">
        <h3 class="centrar-texto">A cambiar algunas cosas
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coffee" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                    d="M3 14c.83 .642 2.077 1.017 3.5 1c1.423 .017 2.67 -.358 3.5 -1c.83 -.642 2.077 -1.017 3.5 -1c1.423 -.017 2.67 .358 3.5 1">
                </path>
                <path d="M8 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                <path d="M12 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                <path d="M3 10h14v5a6 6 0 0 1 -6 6h-2a6 6 0 0 1 -6 -6v-5z"></path>
                <path d="M16.746 16.726a3 3 0 1 0 .252 -5.555"></path>
            </svg>
        </h3>

        <div class="contacto-bg3"></div>

        <form action="editarProceso.php" method="POST" class="formulario">
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre</label>
                <input class="campo__field" type="text" placeholder="Tu Nombre" name="Nombre" value="<?php echo $persona->Nombre;?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="email">Télefono</label>
                <input class="campo__field" type="tel" placeholder="Tu Número" name="Telefono" value="<?php echo $persona->Telefono;?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="email">Fecha</label>
                <input class="campo__field" type="date" placeholder="Día" name="Fecha" value="<?php echo $persona->Fecha;?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="email">Hora</label>
                <input class="campo__field" type="text" placeholder="La hora" id="email" min="06:00" max="1:00"
                    name="Hora" value="<?php echo $persona->Hora;?>">

            </div>
            <div class="campo">
                <label class="campo__label" for="email">E-mail</label>
                <input class="campo__field" type="email" placeholder="ej: persona@gmial.com" name="Correo" value="<?php echo $persona->Correo;?>">
            </div>



            <div class="campo">
                <label class="campo__label" for="mensaje">Mesa</label>
                <input class="campo__field" name="Mensaje" placeholder="Especifique te tipo de mesa quiere"
                    value="<?php echo $persona->Mensaje;?>"></textarea>
            </div>
			
            <div class="campo">
                <label class="campo__label" for="email">Personas</label>
                <input class="campo__field" type="text" max="2" min="1" placeholder="¿Cuantos?" name="Personas"
                    value="<?php echo $persona->Personas;?>">
            </div>
            <br>
			
            <div class="campo">
               <input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>">
                <input type="submit" class="boton boton--primario" type="submit" value="Editar" onclick="return confirmacion()">
            </div>
			
            <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){

       
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>

            <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Editado'){

       
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Campo editado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>
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