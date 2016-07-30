<?php
require'../controlador/sessions.php';
require '../dto/CalificacionDto.php';
require '../dao/CalificacionDao.php';
$sda = $_POST['sda'];
$result = 0;
for ($index = 1; $index < $sda; $index++) {
    $rta = $_POST['rta'.$index]; 
    $res = $_POST['resp'.$index];
    if ($rta==$res) {
        $result = $result+1;
    }    
}
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
$puchi = isset($_SESSION['puchi']) ? $_SESSION['puchi'] : null ;
$finil = ($result/($sda-1)*5);
$cto = new CalificacionDto();
$cao = new CalificacionDao();
$cto->setIdExamen($puchi);
$cto->setIdEstudiante($cedula);
$cto->setCalificacion($finil);
$cao->calif($cto);
header('Location:../estudiante/inicio.php?error=1');


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

