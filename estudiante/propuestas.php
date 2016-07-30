<?php
require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null;
if ($user == '') {
    header('Location:../usuario.php?error=2');
}
$err = isset($_GET['error']) ? $_GET['error'] : null;
$uno = isset($_GET['tema']) ? $_GET['tema'] : null;
$dos = isset($_GET['propuesta']) ? $_GET['propuesta'] : null;
require '../dao/PropuestaDao.php';
$uDao = new PropuestaDao();
date_default_timezone_set("America/Bogota");
$g = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>estudiante</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #c9302c;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="index.html">Start Bootstrap</a>-->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="background: #c9302c;">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #c9302c;">Salir <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../controlador/log_out.php">cerrar cesión</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Estudiante:
                        <small><?php echo '' . $user; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="inicio.php">estudiante</a>
                        </li>
                        <li class="active">inicio</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Content Row -->
            <div class="row">
                <!-- Sidebar Column -->
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="inicio.php" class="list-group-item active">Inicio</a>
                        <a href="propuestas.php" class="list-group-item ">Propuestas</a>
                        <a href="entregas.php" class="list-group-item">Entregas</a>
                        <a href="notas.php" class="list-group-item">Notas</a>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-md-9">
                    <div class="form-group">
                                           <?php
                    if ($err == 1) {
                        echo "<div class='alert alert-danger text-center'><strong>Adventencia:"
                        . " </strong>la propuesta no se pudo registrar</div>";
                    }
                    if ($err == 2) {
                        echo "<div class='alert alert-success text-center'><strong>Adventencia: "
                        . "</strong>la propuesta esta registrada, continue</div>";
                    }
                    ?>
                    </div>
                    <table id="example" class="table table-bordered" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Docente</th>
                                <th>Estado</th>
                                <th>intentos</th>
                                <th>Inicio</th>
                                <th>Final</th>
                                <th>Obs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allusers = $uDao->propuesta($cedula);
                            foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td>   <?php echo $user['b']; ?> </td>
                                    <td> <?php echo $user['d']; ?> </td>
                                    <td><?php echo $user['e']; ?></td>
                                    <td><?php echo $user['g']; ?></td>
                                    <td><?php echo $user['h']; ?></td>
                                    <td><?php echo $user['j']; ?></td>
                                    <td><?php echo $user['p']; ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <h2> DETALLES</h2>
                    <br>
                    <form  role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
                        <input name="id" value="<?php echo $cedula; ?>" hidden="hidden">
                        <div class="form-group">
                            <label for="lapro" class="control-label col-xs-4">Propuesta:</label>
                            <div class="col-xs-5">
                                <select id="categoria" name="lapro" class="form-control"  onkeyup="validacion('categoria')" required="required">
                                    <?php
                            $allusers = $uDao->propuesta($cedula);
                            foreach ($allusers as $propu) {
                                ?>
                                    <option value="<?php echo $propu['a'];?>" 
                                           <?php if ($dos == $propu['a']) {
                                                   echo 'selected'; } ?>   
                                            ><?php echo $propu['a']; ?></option>
                                    <?php }
                                    ?> 
                                </select>
                            </div>
                           <input type="submit"  name="propuestaest" value="ver detalles" class="btn btn-default" ></div>
                        
                        <input style=" display: none" value="">
                        <div style="<?php if($dos ==NULL){echo 'display: none';} ?>">
                        <div class="form-group">
                            <label for="estado" class="control-label col-xs-4">Estado:</label>
                            <div class="col-xs-5">
                                <select id="estado" name="estado" class="form-control"  onkeyup="validacion('tema')"  disabled>
                                    <?php
                                    $oleee =$uDao->soloestado();
                                    foreach ($oleee as $tea) {
                                        ?>
                                        <option value="<?php echo $tea['a']; ?>"<?php
                                    $allusers = $uDao->estado($dos);
                                    foreach ($allusers as $pea) {
                                       if ($tea['a'] == $pea['a']) {
                                                   echo 'selected'; }  
                                    }
                                        ?>
                                                
                                                ><?php echo $tea['b']; ?></option>
                                    <?php }
                                    ?> 
                                </select>
                            </div></div>             
                        <div class="form-group" >
                            <div class="col-xs-10">
                                <label for="descripcion" class="control-label col-xs-4" >Descripcion:</label>
                                <textarea class="form-control" rows="5" id="descripcion" 
                                          name="descripcion"
                                          ><?php $allusers = $uDao->propu($dos);
                                    foreach ($allusers as $tea) {echo $tea['a'];} ?></textarea>
                            </div>
                        </div>
                            
                                                                <?php
                            $allusers = $uDao->veces($dos);
                            foreach ($allusers as $propu) {
                                ?>
                            <input name="veces" style=" display: none" value="<?php echo $propu['a'];?>" >
                            <?php } ?>
                        <div style="margin-left: 630px;"> 
                            <input type="submit" class="btn btn-primary" value="registrar" name="proyectoest"></div>
                        </div>
                    </form> 
                    <br>
                    <br>
                    <h2> REGISTRAR</h2>
                    <br>
                    <form  role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
                        <input name="id" value="<?php echo $cedula; ?>" hidden="hidden">
                        <div class="form-group">
                            <label for="categoria" class="control-label col-xs-4">Categoria:</label>
                            <div class="col-xs-5">
                                <select id="categoria" name="categoria" class="form-control"  onkeyup="validacion('categoria')" required="required">
                                    <?php
                                    $allusers = $uDao->catebusca($g, $g);
                                    foreach ($allusers as $categoria) {
                                        ?>
                                    <option value="<?php echo $categoria['a'];?>" 
                                           <?php if ($uno == $categoria['a']) {
                                                   echo 'selected'; } ?>   
                                            ><?php echo $categoria['b']; ?></option>
                                    <?php }
                                    ?> 

                                </select>
                                <?php echo $g; ?>

                            </div>
                            <input type="submit"  name="buscar" value="buscar" class="btn btn-default" ></div>
                        <div style="<?php if($uno ==NULL){echo 'display: none';} ?>">
                        <div class="form-group">
                            <label for="tema" class="control-label col-xs-4">Tema:</label>
                            <div class="col-xs-5">
                                <select id="tema" name="tema" class="form-control"  onkeyup="validacion('tema')" >
                                    <?php
                                    $allusers = $uDao->tema($uno);
                                    foreach ($allusers as $tea) {
                                        ?>
                                        <option value="<?php echo $tea['a']; ?>"><?php echo $tea['b']; ?></option>
                                    <?php }
                                    ?> 
                                </select>
                            </div></div>             
                        <div class="form-group" >
                            <div class="col-xs-10">
                                <label for="comentario" class="control-label col-xs-4" >Comentario:</label>
                                <textarea class="form-control" rows="5" id="comentario" name="comentario" onkeyup="validacion('comentario');"
                                          <?php if($uno ==NULL){} else {echo 'required';} ?>>escriba su propuesta</textarea>
                            </div></div>
                        <div style="margin-left: 630px;"> 
                            <input type="submit" class="btn btn-primary" value="registrar" name="registrar"></div>
                        </div>
                    </form> 


                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <p>ADSI;Website 2016</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="..js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../js/validacion.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>



        <script>
                                $(document).ready(function () {
                                    $('#example').DataTable({responsive: true});
                                });</script>

    </body>

</html>
