<?php







 //usuario de gmail, email a donde deseamos conectarnos
  $user="ugcpruebas@gmail.com";
 //password de nuestro email
  $password="9876abcd";
 //información necesaria para conectarnos al INBOX de gmail,
 //incluye el servidor, el puerto 993 que es para imap, e indicamos que no valide con ssl
  $mailbox="{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";

  $host="smtp.gmail.com";
 
  $fecha="01-JANUARY-2022"; //desde que fecha sincronizara


     //realizamos la conexión por medio de nuestras credenciales
      $inbox = imap_open($mailbox,$user,$password) or die('No pude conectarme a Gmail: ' . imap_last_error());

       //con la instrucción SINCE mas la fecha entre apostrofes ('')


?>
