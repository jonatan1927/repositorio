<?php
//require '../correo/class.phpmailer.php';
require '../correo/PHPMailerAutoload.php';
require '../dao/UsuarioDao.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Mailer = 'smtp';
            $mail->SMTPAuth = true; // enable SMTP authentication
            $mail->SMTPDebug = 1;
            $mail->SMTPSecure = 'tls'; // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->FromName = "CASI BLACK BOARD";
            $mail->Username = "jvvcatastral@gmail.com";
            $mail->Password = "200208mecha";
            $mail->Subject = 'CIRCULAR';
             $p = 0;
            $usu = new UsuarioDao();
            $yyt = $usu->correo(); 
            foreach ($yyt as $vol) {
                $meca[$p] = array(
                   'correo' => $vol['a'],
              );
                $mail->Body =$_POST['comentario'];;
                    $mail->addAddress($meca[$p]['correo']);     
            $p =$p+1;}
                    if (!$mail->send()) {
                    $mecha = $mail->ErrorInfo;
header('Location:../administrador/correos.php?error=2');
} else {
header('Location:../administrador/correos.php?error=1'); 
}  
