<?php
require'./sessions.php';
$objses = new Sessions();
$objses->init();
$objses->destroy();
 header('Location:../usuario.php'); 
?>

