<?php

require'../controlador/sessions.php';
require'../dao/evaluacionDao.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
} 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
$evalu = new evaluacionDao();
$uno = isset($_GET['mecha']) ? $_GET['mecha'] : null;
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
                    <small><?php echo ''.$user; ?></small>
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
                    <h2>Evaluaciones</h2>
                    <div class="form-group">
                        <?php if ($err == 1) {
                            echo "<div class='alert alert-success text-center'>
                            <strong>Advertencia:Su registro ha sido guardado</strong></div> ";
                        } ?>
                        <?php
                        if ($err == 2) {
                            echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia: </strong>este registro no se pudo realizar</div>";
                        }
                        ?>
                    </div>
                    <table id="example" class="table table-bordered" cellspacing="0" width="100%" >
                        <thead>
                            <tr>                    
                                <th>Tema</th>
                                <th>Propuesta</th>
                                <th>Nota</th>
                                <th>Estado</th>
                                <th>Detalles</th>
                                <th>Segundo evaluador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allusers = $evalu->lanota($cedula);
                            foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['a']; ?> </td>
                                    <td><?php echo $user['b']; ?> </td>
                                    <td><?php echo $user['nota']; ?> </td>
                                    <td><?php if($user['nota']>=3.5){ echo 'aprovado' ;}
                                    else {echo 'reprobado';}?> </td>
                                    <td> 
                                        <form action="../controlador/evaluacion.php" method="post">
                 <input name="id" value="<?php echo $user['c']; ?>" style="display: none;">
                        <input type="submit" name="detalle" value="detalles"></form>      
                                </td>
                                    <td><?php if($user['se']==0){ ?><form action="../controlador/evaluacion.php" method="post">
                                            <input style=" display: none;" name='codigo' value="<?php echo $user['c']; ?>">
                                            <input type="submit" name="seevalua" value="Solicitar"></form> 
                                    <?php } else { echo 'solicitud hecha' ; } ?></td>
                                </tr>
<?php }
?>
                        </tbody>
                    </table>
                                                            <br></br>                         
                        <div style="<?php if($uno ==NULL){echo 'display: none';} ?> "> 
                             <br></br>
                            <h2>Detalles</h2>
                                <table id="example" class="table table-bordered" cellspacing="0" width="100%" >
                        <thead>
                            <tr>                    
                                <th>Item</th>
                                <th>Calificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allusers = $evalu->tres($uno);
                            foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['b']; ?> </td>
                                    <td><?php echo $user['c']; ?> </td></tr>
<?php }
?>
                        </tbody>
                    </table>      
                    <br>
                    <br></br>                   
                        </div></div>
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

</body>

</html>
