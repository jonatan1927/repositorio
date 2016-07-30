<?php
require '../dao/ProyectoDao.php';
require '../controlador/sessions.php';
if (isset($_POST['crea'])) {
$obs =$_POST['id'];
$pp = new sessions();
$pp->set('uno',$obs);
header('Location:../docente/proyectos.php?obs='.$obs);    
        }
if (isset($_POST['obser'])) {
$ide =$_POST['ide'];
$observa =$_POST['observacion'];  
$pro = new ProyectoDao();
$pro->observaciones($observa, $ide);
header('Location:../docente/proyectos.php?error=1');    
        }


        