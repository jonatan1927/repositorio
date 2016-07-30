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
$dos = isset($_GET['mecha']) ? $_GET['mecha'] : null;
require '../dao/PropuestaDao.php';
$uDao = new PropuestaDao();
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

        <link href="../js/bootstrap-datetimepicker.min.js" rel="stylesheet" media="screen">
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
                        <small><?php echo '' . $user; ?></small>
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
                     <div class="form-group">
                        <?php
                        if ($err == 1) {
                            echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:El examen fue registrado, consulte su calificación </strong></div>";
                        }
                        if ($err == 2) {
                            echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:El tema fue registrado </strong></div>";
                        }
                        ?>
                    </div>
                        <h2>Habilitar categorias</h2> 
    <form role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
            <div class="form-group">
                        <label for="nombres" class="control-label col-xs-4">Fecha y hora de inicio:</label>
                <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="nombres" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" />
            </div>
                    <div class="form-group">
                        <label for="dni" class="control-label col-xs-4">Fecha y hora de finalizar:</label>
<div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
    <input class="form-control" size="16" type="text" name="dni" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
                    </div>
        <div>  <input type="submit"  name="escarlata" value="Registrar" class="btn btn-default" ></div>
    </form> 
                    <h2> Registrar</h2>
                    <br>
                    <form  role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
                        <div class="form-group" style=" margin-right: 400px; <?php if ($dos <>null){ echo 'display: none';}  ?>">
                            <label for="categoria" class="control-label col-xs-4">Categoria:</label>
                            <div class="col-xs-5">
                                <select id="categoria" name="categoria" class="form-control"  onkeyup="validacion('categoria')" required="required">
                                    <?php
                                    $allusers = $uDao->categoria();
                                    foreach ($allusers as $categoria) {
                                        ?>
                                        <option value="<?php echo $categoria['a']; ?>" 
                                                <?php if ($uno == $categoria['a']) {
                                                    echo 'selected';
                                                }
                                                ?>   
                                                ><?php echo $categoria['b']; ?></option>
<?php }
?> 

                                </select>

                            </div>
                            <input type="submit"  name="mecha" value="buscar" class="btn btn-default" ></div>
                        <div id="prime" style="<?php if ($uno == NULL) {
    echo 'display: none';
} ?>">
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
                                </div>
                                <input type="submit"   name="updtema" value="actualizar" class="btn btn-default" >
                            </div>

                        </div>

                    </form>


                    <div class="form-group" style=" margin-left: 630px; <?php if ($uno == NULL) {
    echo 'display: none';
} ?>">       <div id="myP2">
                        <input type="submit"  onclick="demoDisplay()"  name="createma" value="crear tema" class="btn btn-default" ></div>
                    </div>
                    <div id="myP1" style=" display: none">
                        <h2>Nuevo Tema</h2>
                    <br>
              <form  role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
                        <div class="form-inline">
                            <div class="col-xs-5">
                            <label for="usr">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                            </div></div>
                            <div class="form-inline">
                                <div class="col-xs-5">
                            <label for="usr">Cupos:</label>
                            <input type="text" class="form-control" name="cupo"></div></div>
                            <input name="ass" style=" display: none" value="<?php echo $uno; ?>">
                            
                            <div>
                                <input type="submit"  name="createma" value="crear tema" class="btn btn-default" >
                        
                        </div>    </form>
                    </div>
                    <div style="<?php if($dos==NULL){ echo 'display:none';} ?>">
                    <br>
              <form  role="form" class="form-horizontal" action="../controlador/propuesta.php" method="post">
                                                     <?php
                                    $all = $uDao->completo($dos);
                                    foreach ($all as $temate) {
                                        ?> 
                  
                  <div class="form-group">          
                  <div class="col-xs-4">
                      <label for="categoria" >Categoria:</label>
                                <select id="categoria" name="categoria" class="form-control"  onkeyup="validacion('categoria')" required="required">
                                    <?php
                                    $allusers = $uDao->categoria();
                                    foreach ($allusers as $categoria) {
                                        ?>
                                        <option value="<?php echo $categoria['a']; ?>" 
                                                <?php if ($temate['ca'] == $categoria['a']) {
                                                    echo 'selected';
                                                }
                                                ?>   
                                                ><?php echo $categoria['b']; ?></option>
<?php }
?> 

                                </select>
                  </div></div>
                        <div class="form-group">
                            <div class="col-xs-10">
                            <label for="usr">Nombre:</label>
             <input type="text" class="form-control" name="nombre" value="<?php echo $temate['d'] ?>">
                            </div></div>
                            <div class="form-group">
                                <div class="col-xs-4">
                            <label for="usr">Cupos:</label>
                            <input type="text" class="form-control" name="cupo"  value="<?php echo $temate['c'] ?>"></div></div>
                            <input name="ass" style=" display: none" value="<?php echo $dos; ?>">
                                    <?php } ?>
                            
                            <div>
                                <input type="submit"  name="temaupdate" value="actualizar tema" class="btn btn-default" >
                        
                        </div>    
                    
</form>
                    </div>



                        <script>
                            function demoDisplay() {
                                document.getElementById("myP1").style.display = "";
                                document.getElementById("prime").style.display = "none";
                                document.getElementById("myP2").style.display = "none";
                            }
                        </script>



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
    <script type="text/javascript" src="..js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
    <script type="text/javascript" src="../js/date/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/date/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">

    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
    

</body>

</html>



