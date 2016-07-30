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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admi</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


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
                <h1 class="page-header">Admi:
                    <small><?php echo ''.$user; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="inicio.php">Admi</a>
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
                    <a href="carga.php" class="list-group-item ">Carga de datos</a>
                    <a href="categorias.php" class="list-group-item">Categorias</a>
                    <a href="correos.php" class="list-group-item ">Correos masivos</a>
                    <a href="entregas.php" class="list-group-item">Entregas</a>
                    <a href="reportes.php" class="list-group-item">Reportes</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                                 <h2>Historial</h2>
                    <br>
                    <table id="example" class="table table-bordered" cellspacing="0" width="100%" >
                        <thead>
                            <tr>                    
                                <th>Categoria</th>
                                <th>Tema</th>
                                <th>Cupos disponibles</th>
                                <th>Inscritos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $allusers = $evalu->datosss();
                            foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['a']; ?> </td>
                                    <td><?php echo $user['b']; ?> </td>
                                    <td><?php echo $user['c']; ?> </td>
                            <td><?php echo $user['d']; ?></td></tr> <?php }?>
                        </tbody>
                    </table>
		<script type="text/javascript">
$(function () {
    $('#containero').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Calificacion promedio por tema'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                                            <?php
                            $allusers = $evalu->reporte();
                            foreach ($allusers as $user) {
                                ?>
                          ['<?php echo $user['e'] ?>'],
                            <?php }?>

			
			],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nota',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: 'Nota'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'nota promedio',
            data: [
                                            <?php
                            $allusers = $evalu->reporte();
                            foreach ($allusers as $user) {
                                ?>
                       [<?php echo $user['b'] ?>],
                            <?php }?>
		
			]
        }]
    });
});
		</script>
                     <script src="../Highcharts-4.1.5/js/highcharts.js"></script>      
     <script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>  
<div id="containero" style="height: 400px; min-width: 310px; max-width: 800px; margin: 0 auto;"></div>  

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



</body>


</html>
