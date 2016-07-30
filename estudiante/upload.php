<?php
require '../dao/ProyectoDao.php';
date_default_timezone_set("America/Bogota");
$g = date('Y-m-d H:i:s');
    $destination_path = "../documentos/";
   $result = 3;   
   $target_path = $destination_path.basename( $_FILES['myfile']['name']);   
   
   $ds=basename($_FILES['myfile']['name']);   
   $ds1=$_FILES['myfile']['tmp_name'];
   $ext=substr(strrchr($target_path, '.'), 1);     
		
	if($ext=="doc"||$ext=="DOC"||$ext=="DOCX"||$ext=="docx"||$ext=="xls"||$ext=="XLS"||$ext=="xlsx"||$ext=="XLSX")
	{	
	   if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) 
	   {  
            $entrega = $_POST['entrega'];
            $pro = new ProyectoDao();     
            $pro->actualizar($g,$target_path,$entrega);              
            header('Location:entregas.php?error=1');       
	   }
	   else
	   {
		  $result=0;
                  echo 'pailas';
	   }
	}
	else
	{
		 $result=3;
                 echo 'no se pudo';
	}
   

?>
