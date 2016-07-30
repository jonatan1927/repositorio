<?php
require '../excel/PHPExcel/Reader/Excel2007.php';
require '../dao/UsuarioDao.php';
    $destination_path = "documentos/";
   $result = 3;   
   $target_path = $destination_path.basename( $_FILES['myfile']['name']);   
   
   $ds=basename($_FILES['myfile']['name']);   
   $ds1=$_FILES['myfile']['tmp_name'];
   $ext=substr(strrchr($target_path, '.'), 1);     
		
	if($ext=="doc"||$ext=="DOC"||$ext=="DOCX"||$ext=="docx"||$ext=="xls"||$ext=="XLS"||$ext=="xlsx"||$ext=="XLSX")
	{	
	   if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) 
	   {	
		  $result=1;
                 $d = new PHPExcel_Reader_Excel2007();
               $usu = new UsuarioDao();
            $da = $d->load($target_path);
            $da->setActiveSheetIndex(0);
            for ($i = 2; $i <= 65535; $i++) {
                $mecha[] = array(
                    'id' => $da->getActiveSheet()->getCell('A' . $i)->getValue(),
                    'nombre' => $da->getActiveSheet()->getCell('B' . $i)->getValue(),
                );
                $c = $i + 1;
                if ($da->getActiveSheet(0)->getCell('A' . $c) == "") {
                    $i = 65535;
                }
                
                
        }
               for ($i = 0; $i < count($mecha); $i++) {
                $cedula = $mecha[$i]['id'];
                $nombre = $mecha[$i]['nombre'];
                $ee = $usu->verificar($cedula);
                if ($ee == 1) {
                $usu->cargar($cedula, $nombre);
                }
               }
             header('Location:../administrador/carga.php?error=2'); 
                  
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
