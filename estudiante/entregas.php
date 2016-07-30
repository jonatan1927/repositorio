<?php

require'../controlador/sessions.php';
require'../dao/proyectoDao.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
} 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
$proda= new ProyectoDao();
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
                <h2> Bienvenido</h2>
                                            <div class="form-group">
			<?php if($err==1){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:El documento fue registrado</strong></div>";
			}?>
                            </div>
                
                <table id="example" class="table table-bordered" cellspacing="0" width="100%" >
                        <thead>
                            <tr>                    
                                <th>Tema</th>
                                <th>Fecha</th>
                                <th>Entrega</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allusers = $proda->proyecto($cedula);
                            foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['b']; ?> </td>
                                    <td><?php echo $user['f']; ?> </td>
                                    <td><?php if($user['h']=='0'){
                                              echo 'no hay entregas';} else {echo $user['h'];} ?> </td>
                                    <td> <?php if($user['g']=='0'){
                                              echo 'no hay obs';} else {echo $user['g'];} ?> </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                <br>
                    <br>
                
                
                    <div id="content" style='<?php if($proda->entrega($cedula)==NULL){
                                                                echo 'display:none;';} ?>'>
                <form action="upload.php" method="post" enctype="multipart/form-data" >
                         <label>Entregas:  
                              <input name="myfile" type="file" size="30" />
                         </label>
                         <label>
                             <input type="submit" name="primera" class="sbtn" value="Cargar Archivo" />
                         </label>
                    <input style=" display: none;" name="entrega" value="<?php echo $proda->entrega($cedula); ?>">
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>              
                </form>
             </div>
  

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

</body>

</html>
