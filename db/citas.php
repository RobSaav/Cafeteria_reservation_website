<?php
        include_once('db_conn2.php');
  
        $sentencia = $bd -> query("select * from citas");
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
        $where="";
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
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/user-form.css" th:href="@{/css/user-form.css}">
    <!-- DATA TABLE -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
            <div class="contenedor2">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h3>Lista de citas</h3>
                        <!-- Boton busqueda-->
                        <form action="datos.php" method="POST" class="formulario">
                            <div class="campo">
                                <form class="d-flex">
                                    <input class="form-control me-2 light-table-filter" type="text"
                                        placeholder="Busca información" name="Nombre" data-table="table_id">
                                    <hr>
                                </form>

                            </div>
                        </form>
                        <!-- Boton busqueda-->

                        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Ok, cambiado'){

       
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Exito!</strong> Campo editado.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
            }
            ?>
                     <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){

       
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Exito!</strong> Campo borrado.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
            }
            ?>

                        <!-- fin alerta -->
                        <div class="row justify-content-center">
                            <div class="table-responsive">

                            </div>
                            <div class="p-4">
                                <!--Codigo busqueda-->
                                <table class="table table-striped table-dark table_id ">

                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Correo Electronico</th>
                                            <th scope="col"> Mesa </th>
                                            <th scope="col">Citados</th>
                                            <th scope="col" colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                foreach($persona as $dato){ 
                            ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->ID; ?></td>
                                            <td><?php echo $dato->Nombre; ?></td>
                                            <td><?php echo $dato->Telefono; ?></td>
                                            <td><?php echo $dato->Fecha; ?></td>
                                            <td><?php echo $dato->Hora; ?></td>
                                            <td><?php echo $dato->Correo; ?></td>
                                            <td><?php echo $dato->Mensaje; ?></td>
                                            <td><?php echo $dato->Personas; ?></td>
                                            <td> <a style="color:#24ef1a;"
                                                    href="editar.php?ID=<?php echo $dato->ID; ?>">Editar</td>
                                            <td> <a style="color:#ef2e1a;"
                                                    href="eliminar.php?ID=<?php echo $dato->ID; ?>" onclick="return confirmacion()">Eliminar</td>

                                        </tr>

                                        <?php 
                                }
                            ?>

                                    </tbody>
                                </table>
                                <br>


                                <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Editado'){

       
            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Campo editado.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
            }
            ?>





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
    <script src="../js/buscador.js"></script>
</body>

</html>