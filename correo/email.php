<?php
class Email {
    //put your code here
    public static function enviar($destino, $html, $from, $asunto){
        $fecha = date('l jS \of F Y h:i:s A');
        $header = "From:" . $from . "\nReply-To:" . $sfrom . "\n";
        $header = $header . "X-Mailer:PHP/" . phpversion() . "\n";
        $header = $header . "Mime-Version: 1.0\n";
        $header = $header . "Content-Type: text/html";

        mail("$destino", "$asunto" . $fecha, $html, $header) or die("Su mensaje no pudo enviarse.");
    }
}
?>