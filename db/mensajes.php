<?php
        include_once('db_conn2.php');
        $sentencia = $bd -> query("select * from contacto");
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                    <a href="../db/citas.php" class="navegacion__enlace">Citas</a>
                    <a href="../db/mensajes.php" class="navegacion__enlace">Mensajes</a>
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <h2 class="no-margin">Llene su cita</h2>
            <p class="no-margin">Agende el día que necesite al menor costo.</p>
        </div>
    </header>
    <main class="contenedor">
        <form class="formulario">
            <div class="contenedor">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <!-- inicio alerta -->
                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Rellena todos los campos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                }
            ?>


                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado!</strong> Se agregaron los datos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                }
            ?>



                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Vuelve a intentar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                }
            ?>



                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cambiado!</strong> Los datos fueron actualizados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                }
            ?>


                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Eliminado!</strong> Los datos fueron borrados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                }
            ?>

                        <!-- fin alerta -->
                        <div class="card">
                            <div class="card-header">
                                <h3>Lista de mensajes</h3>
                            </div>
                            <div class="p-4">
                                <table class="tab, table aling-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Mensaje</t>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                foreach($persona as $dato){ 
                            ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->ID; ?></td>
                                            <td><?php echo $dato->Nombre; ?></td>
                                            <td><?php echo $dato->Correo; ?></td>
                                            <td><?php echo $dato->Mensaje; ?></td>
                                            <td><a class="text-success" href="editar.php?ID=<?php echo $dato->ID; ?>"><i
                                                        class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');"
                                                    class="text-danger"
                                                    href="eliminar.php?ID=<?php echo $dato->ID; ?>"><i
                                                        class="bi bi-trash"></i></a></td>
                                        </tr>

                                        <?php 
                                }
                            ?>

                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>

        </form>
    </main>
    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="../index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Coffee<span class="logo__bold">Cat</span>
                    </h1>
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