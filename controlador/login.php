<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../dao/UsuarioDao.php';
require '../dto/UsuarioDto.php';

$uDao = new UsuarioDao();
    
    $uDto = new UsuarioDto();
    $usua = $_POST['txtusuario'];
    $cla = $_POST ['txtcontra'];  
    $uDto->setIdUsuario($usua);
    $uDto->setClave($cla);
    $uDao->login($uDto->getIdUsuario(),$uDto->getClave());

    
    


