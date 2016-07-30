<?php
require '../dao/evaluacionDao.php';
require '../controlador/sessions.php';
date_default_timezone_set("America/Bogota");
if (isset($_POST['eva'])) {
$obs =$_POST['id'];
$pp = new sessions();
$pp->set('uno',$obs);
header('Location:../docente/evaluaciones.php?obs='.$obs);    
        }
if (isset($_POST['evalu'])) {
$g = date('Y-m-d H:i:s');
$ide =$_POST['proyecto'];
$evalu = new evaluacionDao();
$pro = $evalu->idente($ide);
for($i=1;$i<=5;$i++){
$iten =$_POST['it'.$i];
$califi =$_POST['cal'.$i];
$evalu->nota($pro, $g, $iten, $califi);
$evalu->actualizar($ide);
header('Location:../docente/evaluaciones.php?error=1');
}}

if (isset($_POST['detalle'])) {
$obs =$_POST['id'];
$evaeva = new evaluacionDao();
$mecha = $evaeva->uno($obs);
header('Location:../estudiante/notas.php?mecha='.$mecha);    
        }
if (isset($_POST['det'])) {
$obs =$_POST['id'];
$evaeva = new evaluacionDao();
$mecha = $evaeva->uno($obs);
header('Location:../administrador/entregas.php?mecha='.$mecha);    
        }
if (isset($_POST['cambianota'])) {
$obs =$_POST['id'];
$nota =$_POST['nota'];
$codigo = $_POST['codigo'];
$evite = new evaluacionDao();
$evite->cambia($nota,$obs);
header('Location:../administrador/entregas.php?mecha='.$codigo);    
        }
if (isset($_POST['seevalua'])) {
$codigo = $_POST['codigo'];
$evite = new evaluacionDao();
$evite->segundoeva($codigo);
header('Location:../estudiante/notas.php?error=1');  
        }
if (isset($_POST['nuevodocente'])) {
$obs =$_POST['id'];
$profe =$_POST['profe'];
$evaeva = new evaluacionDao();
$evaeva->docenteuno($profe,$obs);
$evaeva->docentedos($obs);
header('Location:../administrador/entregas.php?mecha='.$mecha);    
        }       