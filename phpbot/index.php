<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './include/config.php';
require './include/PHPMailer/src/Exception.php';
require './include/PHPMailer/src/PHPMailer.php';
require './include/PHPMailer/src/SMTP.php';

header("Refresh: 30; URL='index.php'");

class conexion{

public function conectar(){
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conexion->set_charset("utf8");
        if ($conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        }
        return $conexion;
    }

public function guardarBD($sql){
        $conexion = $this->conectar();
        $resultado = $conexion->query($sql);
        if (!$resultado) {
            echo "Error al ejecutar la consulta: (" . $conexion->errno . ") " . $conexion->error;
        }else{
            return $resultado;
        }

    }

public function desconectar(){
        $conexion = $this->conectar();
        $conexion->close();
    }
}

class ObtieneMails{


 //usuario de gmail, email a donde deseamos conectarnos
 var $user="test@gmail.com";
 //password de nuestro email
 var $password="";
 //información necesaria para conectarnos al INBOX de gmail,
 //incluye el servidor, el puerto 993 que es para imap, e indicamos que no valide con ssl
 var $mailbox="{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";

 var $host="smtp.gmail.com";
 
 var $fecha="01-JANUARY-2022"; //desde que fecha sincronizara



function get_email_address($email){
  $email = str_replace("<","|",$email);
  $email = str_replace(">","",$email);
  return $email;
}



function reenviarMail($cuerpo, $remail, $subject, $correo){

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = $this->host;
    $mail->Port = 465;
    $mail->Username = $this->user;
    $mail->Password = $this->password;
    $mail->From = $this->user;
    $mail->FromName = "MailBot UGC";
    $mail->Subject = "No pude responder este mail: ".iconv('UTF-8', 'ISO-8859-1', $subject)."";
    $mail->Body = "

    <!DOCTYPE html>

<html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
    <title></title>
    <meta charset='utf-8' />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
        }
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }
        
        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }
        
        p {
            line-height: inherit
        }
        
        @media (max-width:720px) {
            .icons-inner {
                text-align: center;
            }
            .icons-inner td {
                margin: 0 auto;
            }
            .row-content {
                width: 100% !important;
            }
            .image_block img.big {
                width: auto !important;
            }
            .mobile_hide {
                display: none;
            }
            .stack .column {
                width: 100%;
                display: block;
            }
            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }
        }
    </style>
</head>

<body style='background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
    <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9;' width='100%'>
        <tbody>
            <tr>
                <td>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <div class='spacer_block' style='height:10px;line-height:10px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img alt='Alternate text' src='https://www.ugc.edu.co/sede/liceo/templates/shaper_educon/images/presets/preset1/logo@2x.png' style='display: block; height: auto; border: 0; width: 245px; max-width: 100%;'
                                                                        title='Alternate text' width='245' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #00460F;'><span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='heading_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;text-align:center;'>
                                                                <h1 style='margin: 0; color: #555555; font-size: 23px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; line-height: 120%; text-align: center; direction: ltr; font-weight: normal; letter-spacing: normal; margin-top: 0; margin-bottom: 0;'><strong>MailBot UGC</strong></h1>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;padding-top:30px;'>
                                                                <div align='center' style='line-height:10px'><img alt='I' m an image ' src='https://wwwp.ugc.edu.co/sede/bogota/pages_pruebas/SolicitudesEstudiantes/app/imagenes/mail.png ' style='display: block; height: auto; border: 0; width: 300px;
                                                                        max-width: 100%; ' title='I 'm an image' width='245' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #191919; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 12px; mso-line-height-alt: 14.399999999999999px;'> </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: center;'><span style='font-size:26px;'><strong>Asunto: ".$subject." </strong></span></p>
                                                                        <p style='margin: 0; font-size: 14px; text-align: center;'><span style='font-size:20px;'><strong>Correo enviado por: ".$correo." </strong></span></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 18px; text-align: center; mso-line-height-alt: 21.6px; color: #555555; line-height: 1.8; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 18px; mso-line-height-alt: 21.6px;'>".$cuerpo."</p><br>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='button_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                        <a href='mailto:".$correo."' style='text-decoration:none;display:inline-block;color:#ffffff;background-color:#00460f;border-radius:20px;width:auto;border-top:1px solid #00460f;border-right:1px solid #00460f;border-bottom:1px solid #00460f;border-left:1px solid #00460f;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;' target='_blank'><span style='padding-left:40px;padding-right:40px;font-size:16px;display:inline-block;letter-spacing:normal;'><span style='font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'><strong>¡Clic</strong><strong> aquí para responder el correo!</strong></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #00460F;'><span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-6' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-left:20px;padding-right:20px;padding-top:35px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 18px; color: #191919; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 42px;'><span style='font-size:28px;'><strong><span style=''>Sitios de interés </span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='5' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='15%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 2px solid #000000;'><span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='5%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 2px solid #000;'><span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-7' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='66.66666666666667%'>
                                                    <div class='spacer_block' style='height:5px;line-height:5px;font-size:1px;'> </div>
                                                    <div class='spacer_block mobile_hide' style='height:20px;line-height:20px;font-size:1px;'> </div>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:40px;padding-right:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #00460f; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 40px;'><span style='font-size:20px;'><strong><span style=''>Infografías</span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:40px;padding-right:30px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #000000; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left;'>https://www.ugc.edu.co/plataformatecnologica/servicios</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:15px;padding-left:45px;padding-right:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #1f8559; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 30px;'><span style='font-size:15px;'><strong><span style=''><span style=''><span style=''><a href='https://www.ugc.edu.co/plataformatecnologica/servicios' rel='noopener' style='text-decoration: underline; color: #1f8559;' target='_blank'>Ir al sitio →</a></span></span>
                                                                            </span>
                                                                            </strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='33.333333333333336%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='padding-right:40px;width:100%;padding-left:0px;padding-top:5px;padding-bottom:5px;'>
                                                                <div align='center' style='line-height:10px'><img alt='I' m an image ' src='https://wwwp.ugc.edu.co/sede/bogota/pages_pruebas/SolicitudesEstudiantes/app/imagenes/mail2.jpg ' style='display: block; height: auto; border: 0; width: 193px;
                                                                        max-width: 100%; ' title='I 'm an image' width='193' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!-- End -->
</body>

</html>

    ";
    $mail->AddAddress("".$remail."");
    $mail->AddCC('cristian.alarcon@ugc.edu.co');

    // $mail->AddCC('diego.quintero@ugc.edu.co');
    $mail->AddCC('diana.sanchez3@ugc.edu.co');
    // $mail->AddCC('yennifer.vargas@ugc.edu.co');
    // $mail->AddCC('harold.ortiz@ugc.edu.co');
    // $mail->AddCC('diana.torres@ugc.edu.co');
    // $mail->AddCC('gloria.lotero@ugc.edu.co');

    //$mail->AddCC('paula.hernandez@ugc.edu.co');
    $mail->IsHTML(true);
    $mail->Send();

    echo "Mensaje reenviado correctamente";

}



function enviarMailSGA($correo){

    $body = file_get_contents('./plantillas/templateSga.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = $this->user;
    $mail->Password = $this->password;
    $mail->From = $this->user;
    $mail->FromName = "Soporte de tecnología";
    $mail->Subject = "Soporte: Plataformas tecnológicas";
    $mail->Body = $body;
    $mail->AltBody = 'Para ver este mensaje, por favor utilice un cliente de correo compatible con HTML.';
    $mail->AddAddress("".$correo."");
    $mail->IsHTML(true);
    // Activo codificación utf-8
    $mail->CharSet = 'UTF-8';
    $mail->Send();

    echo "Mensaje de soporte de plataformas tecnológicas enviado correctamente | ✔️";
    


}


function enviarMailCorreoInstitucional($correo){

    $body = file_get_contents('./plantillas/templateCorreo.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = $this->user;
    $mail->Password = $this->password;
    $mail->From = $this->user;
    $mail->FromName = "Soporte de tecnología";
    $mail->Subject = "Soporte: Cuenta de correo insitucional";
    $mail->Body = $body;
    $mail->AltBody = 'Para ver este mensaje, por favor utilice un cliente de correo compatible con HTML.';
    $mail->AddAddress("".$correo."");
    $mail->IsHTML(true);
    // Activo codificación utf-8
    $mail->CharSet = 'UTF-8';
    $mail->Send();

    echo "Correo Insitucional enviado correctamente | ✔️";    


        }

 //metodo que realiza todo el trabajo
 function obtenerAsuntosDelMails(){

    $cConectar = new conexion();

     //realizamos la conexión por medio de nuestras credenciales
      $inbox = imap_open($this->mailbox,$this->user,$this->password) or die('No pude conectarme a Gmail: ' . imap_last_error());

       //con la instrucción SINCE mas la fecha entre apostrofes ('')
       //indicamos que deseamos los mails desde una fecha en especifico
       //imap_search sirve para realizar un filtrado de los mails.
      $emails=imap_search($inbox,'UNSEEN SINCE "'.$this->fecha.'"');
      $num_mensajes = imap_num_msg($inbox);
      echo "En total hay: ".$num_mensajes." mensajes"."<br>"."<br>";

      //comprobamos si existen mails con el la busqueda otorgada
         if($emails) {

              //ahora recorremos los mails
              foreach($emails as $email_number)
             {
                  //leemos las cabeceras de mail por mail enviando el inbox de nuestra conexión
                  //enviando el identificador del mail
                 $overview=imap_fetch_overview($inbox,$email_number);

                 //ahora recorremos las cabeceras para obtener el asunto
                 foreach($overview as $over){


                         
                         //Para obtener el asunto del mail sin caracteres raros anexo una función que lo limpia y lo muestra legible
                         $asunto=$this->fix_text_subject($over->subject);
                         $asunto = strtolower($asunto);
                         $subject = utf8_decode($asunto);
                         //Obtenemos el nombre del remitente
                         $de=$this->fix_text_subject($over->from);
                         //Obtenemos la fecha del mail
                         $fecha=$this->fix_text_subject($over->date);
                         //Obtenemos el numero de mensaje
                         $num = imap_num_msg($inbox);  
                         //Obtenemos el email por medio de la función
                         $email = $this->get_email_address($de);
                         //Cortamos el email para obtener el correo
                         $correo = stristr($email, '|');
                         //Borramos el separador |
                         $correo = ltrim($correo, '|');
                         //Obtenemos las keywords desde un JSON
                         $restablecerSGA = @file_get_contents('https://api.jsonbin.io/b/61d464692675917a6289d147/20');
                         $correoInstitucional = @file_get_contents('https://api.jsonbin.io/b/61d47fc339a33573b322f2b3/10');
                         //Decodificamos el JSON
                         $restablecerSGA = json_decode($restablecerSGA, true);
                         $correoInstitucional = json_decode($correoInstitucional, true);
                         $listaUnoS = $restablecerSGA["keywords"];
                         $listaDosC = $correoInstitucional["keywords"];
                         $can = false;

                           

                            //ahora obtenemos el cuerpo del mail
                            $body=quoted_printable_decode(imap_fetchbody($inbox,$email_number,1));
                            $body = strtolower($body);

                            //ahora obtenemos el cuerpo del mail en formato HTML
                            $body_html=quoted_printable_decode(imap_fetchbody($inbox,$email_number,1));
                            $body_html = strtolower($body_html);
                            $body_html = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($body_html));

                            //ahora obtenemos el cuerpo del mail en formato TEXT
                            $body_text=quoted_printable_decode(imap_fetchbody($inbox,$email_number,2));
                            $body_text = strtolower($body_text);
                            $body_guion = preg_replace( "/\r|\n/", "", $body_text);

                            //ahora obtenemos el cuerpo del mail en formato PLAIN
                            $body_text_plain=quoted_printable_decode(imap_fetchbody($inbox,$email_number,3));
                            $body_text_plain = strtolower($body_text_plain);




                        //echo
                        
                        echo "Asunto: ".utf8_decode($asunto)."<br>";
                        echo "De: ".$de."<br>";
                        echo "Fecha: ".$fecha."<br>";
                        echo "Correo: ".$email."<br>";
                        echo "Email: ".$correo."<br>";
                        echo "Cuerpo del mensaje (Normal): ".$body."<br>";
                        echo "Cuerpo del mensaje (HTML): ".$body_html."<br>";
                        echo "Cuerpo del mensaje (TEXT): ".$body_text."<br>";
                        //echo "Cuerpo del mensaje (GUIONES): ".$body_guion."<br>";
                        echo "<br>";

                        

                        if($correo == "mailer-daemon@googlemail.com" || $de == "Mail Delivery Subsystem" || str_contains($body_text, 'campus') || str_contains($body_text, 'campues')  ){
                            echo "<strong>❌| No respondí el correo ya que fue enviado por Google o es acerca del Campus virtual</strong>";
                            //Ahora creamos una consulta para insertar el log en la base de datos
                            $parseFecha= strtotime($fecha);
                            $newDate = date("Y-m-d",$parseFecha);
                            $cuerpo = iconv('UTF-8', 'ISO-8859-1', $body_html);
                            $cConectar->conectar();
                            $sql = "INSERT INTO `no_answer` (email, body, date) VALUES ('$correo', '$cuerpo', '$newDate');";
                            $cConectar->guardarBD($sql);
                            echo "Se guardo el registro del fallo en la BD, con el correo: ".$correo."<br>";
                            $cConectar->desconectar();
               
                            //Cerramos el mensaje
                            imap_delete($inbox,$email_number);
                            
                            echo "<br>";
                            
    
                            $remail = "luis.martinez1@ugc.edu.co";
                            $this->reenviarMail($cuerpo, $remail, $subject, $correo);
                            break;
                        }
                        
                        
                        //Ahora recorremos el JSON para obtener las keywords
                        foreach($listaUnoS as $keyword){
                           
                            //Ahora obtenemos el valor de la keyword
                            $keywords = $keyword;
                            $keywords = strtolower($keywords);  
                            $vef = strpos($body_text, $keywords);
                            //Ahora comparamos el asunto con las keywords
                            

                            //Ahora recorremos el cuerpo del mail
                            if($vef){         
                                echo $vef."<br>";                      
                                //Si se encuentra una keyword, se realiza la acción
                                echo "Se encontro la keyword en el body: ".$keywords."| ✅<br>";
                                $this->enviarMailSGA($correo);
                                echo "Se envio el correo al correo: ".$correo."<br>";
                                $can = true;
                                if($can){
                                    //bd     
                                    $cConectar->conectar();
                                    $parseFecha= strtotime($fecha);
                                    $newDate = date("Y-m-d",$parseFecha);
                                    $cuerpo = utf8_decode($body_html);
                                    $asunto = iconv('UTF-8', 'ISO-8859-1', $asunto);
                                    $sql = "INSERT INTO `answer` (`id`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES (NULL, '$correo', '$asunto', '$cuerpo', '$newDate');";
                                    $cConectar->guardarBD($sql);
                                    echo "Se guardo el log con exito en la BD con el correo: ".$correo."<br>";
                                    $cConectar->desconectar();

                                    break;
                                }
                                echo "<br>";
                            }         
                                                       
                        }
                    

                        //Si no se encuentra una keyword, se realiza la acción
                        foreach($listaDosC as $keyword2){
                            //Obtenemos las keywords
                           
                            //Ahora obtenemos el valor de la keyword
                            $keywords2 = $keyword2;
                            $keywords2 = strtolower($keywords2);
                            

                            //Ahora recorremos el cuerpo del mail
                            
                            if(strpos($body_text,$keywords2)){
                                //Si se encuentra una keyword, se realiza la acción
                                $this->enviarMailCorreoInstitucional($correo);
                                echo "Se encontro la keyword en el body: ".$keywords2." | ✅<br>";
                                echo "Se envio el correo al correo: ".$correo."<br>";
                                $can = true;
                                if($can){
                                    //BD
                                    $cConectar->conectar();
                                    $parseFecha= strtotime($fecha);
                                    $newDate = date("Y-m-d",$parseFecha);
                                    $cuerpo = iconv('UTF-8', 'ISO-8859-1', $body_html);
                                    $asunto = iconv('UTF-8', 'ISO-8859-1', $asunto);
                                    $sql = "INSERT INTO `answer` (`id`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES (NULL, '$correo', '$asunto', '$cuerpo', '$newDate');";
                                    $cConectar->guardarBD($sql);
                                    echo "Se guardo el log con exito en la BD con el correo: ".$correo."<br>";
                                    $cConectar->desconectar();
                                    break;
                                }
                                echo "<br>";
                            }
                        }



                        if(!$can){
                            //Ahora creamos una consulta para insertar el log en la base de datos
                            $parseFecha= strtotime($fecha);
                            $newDate = date("Y-m-d",$parseFecha);
                            $cuerpo = iconv('UTF-8', 'ISO-8859-1', $body_html);
                            $cConectar->conectar();
                            $sql = "INSERT INTO `no_answer` (email, body, date) VALUES ('$correo', '$cuerpo', '$newDate');";
                            $cConectar->guardarBD($sql);
                            echo "Se guardo el registro del fallo en la BD, con el correo: ".$correo."<br>";
                            $cConectar->desconectar();
               
                            //Cerramos el mensaje
                            imap_delete($inbox,$email_number);
                            
                            echo "<br>";
                            
    
                            $remail = "luis.martinez1@ugc.edu.co";
                            $this->reenviarMail($cuerpo, $remail, $subject, $correo);
                              
    
                         }
                         echo "<hr>";                       



                     
                    }

             }


         }

 }

 //arregla texto de asunto
 function fix_text_subject($str)
 {
     $subject = '';
     $subject_array = imap_mime_header_decode($str);

     foreach ($subject_array AS $obj)
     
         $subject .= utf8_encode(rtrim($obj->text, "t"));


     return $subject;
 }

}


//creamos el objeto
$oObtieneMails= new ObtieneMails();
 
//ejecutamos el metodo
$oObtieneMails->obtenerAsuntosDelMails();
?>
