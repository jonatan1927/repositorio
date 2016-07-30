<?php
require '../dao/PropuestaDao.php';
require '../controlador/sessions.php';
date_default_timezone_set("America/Bogota");
$pro = new PropuestaDao();
        if (isset($_POST['escarlata'])) {
$inicio = $_POST['nombres'];
$final = $_POST['dni'];
$dd = new sessions();
$allusers = $pro->categoria();
foreach ($allusers as $categoria) {
$pro->horario($inicio,$final,$categoria['a']);
}
header('Location:../administrador/categorias.php?error=2');
        }
        if (isset($_POST['propuestaest'])) {
            $prop =$_POST['lapro'];
$pp = new sessions();
$pp->set('uno', $prop);
header('Location:../estudiante/propuestas.php?propuesta='.$prop);   
}
        if (isset($_POST['buscar'])) {
$asig = $_POST['categoria'];
$dd = new sessions();
$dd->set('uno', $asig);
$dd->set('dos','display: none');
header('Location:../estudiante/propuestas.php?tema='.$asig);
        }
if (isset($_POST['mecha'])) {
$asig = $_POST['categoria'];
header('Location:../administrador/categorias.php?tema='.$asig);
        } 
if (isset($_POST['createma'])) {
$no = $_POST['nombre'];
$cupo = $_POST['cupo'];
$ctg = $_POST['ass'];
$catea = $_POST['categoria'];
$pro->nuevotema($no, $ctg, $cupo);
header('Location:../administrador/categorias.php?error=2');
        }
if (isset($_POST['temaupdate'])) {
$no = $_POST['nombre'];
$cupo = $_POST['cupo'];
$ctg = $_POST['ass'];
$catea = $_POST['categoria'];
$pro->actualizalo($no, $catea, $cupo, $ctg);
header('Location:../administrador/categorias.php?error=2');
        }
if (isset($_POST['updtema'])) {
$no = $_POST['tema'];
header('Location:../administrador/categorias.php?mecha='.$no);
        }
       
        if (isset($_POST['registrar'])) {
$a = $_POST['tema'];
$b = $_POST['id'];
$c = '3456';
$d = '3';
$e = $_POST['comentario'];
$f = '1';
$g = date('Y-m-d H:i:s');
$h = date('Y-m-d H:i:s', strtotime('+8 day'));
if($pro->registrar($a, $b, $c, $d, $e, $f, $g, $h)){  
header('Location:../estudiante/propuestas.php?error=2');}
 else {
 header('Location:../estudiante/propuestas.php?error=1');}   
}
        if (isset($_POST['propuesta'])) {
            $prop =$_POST['lapro'];
$pp = new sessions();
$pp->set('uno', $prop);
header('Location:../docente/propuesta.php?propuesta='.$prop);   
}        
        if (isset($_POST['proyecto'])) {
                        $prop =$_POST['lapro'];
                        $b = $_POST['estado'];
                        $c = $_POST['veces'];
                        $p = $_POST['obs'];
                        $g = date('Y-m-d H:i:s');
                        $h = date('Y-m-d H:i:s', strtotime('+8 day'));
                        $proda = new PropuestaDao();
if($c >= 3){
 $j = 2;  
 $proda->actualizar($j, $c, $g, $g,$p, $prop); 
  header('Location:../docente/propuesta.php?error=1');
}else{
if($b==1){
$tema =$proda->uno($prop) ;
$cupo =$proda->dos($tema) ;
if($cupo<=1){
 $proda->estadotema($tema);
}
$proda->tres(($cupo-1), $tema);
$proda->actualizar($b, $c, $g, $g,$p, $prop); 
for($i=1;$i<=3;$i++){
$proda->proyect($prop, $g,'0','0');}
header('Location:../docente/propuesta.php?error=1');
}
if($b==2){
 $proda->actualizar($b, $c, $g, $g,$p, $prop); 
  header('Location:../docente/propuesta.php?error=1');
}
if($b==3){
    $proda->actualizar($b, ($c+1), $g, $h,$p ,$prop);  
     header('Location:../docente/propuesta.php?error=1');
}
} 
}
      if (isset($_POST['proyectoest'])) {
                        $prop =$_POST['lapro'];
                        $descrip =$_POST['descripcion'];
                        $proda = new PropuestaDao;
                        $proda->actualizarest($descrip,$prop);
    header('Location:../estudiante/propuestas.php?error=2');
                                
      }

