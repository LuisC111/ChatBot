<?php

//Add Smarty class
require_once('Smarty.class.php');
date_default_timezone_set('America/Bogota');
//Instance Class
$smarty = new Smarty();
//Add routes    
$smarty->template_dir = ('C:\xampp\plantillas_smarty\phpbot\templates');
$smarty->compile_dir = ('C:\xampp\plantillas_smarty\phpbot\templates_c');
$smarty->config_dir =('C:\xampp\plantillas_smarty\phpbot\config');
    

//PHP CODE
$logo = 'https://emovies.oui-iohe.org/wp-content/uploads/2020/09/logo-14-300x300.png';
$logo2 = 'https://wwwp.ugc.edu.co/sede/bogota/pages/recibos/app/imagenes/logoUGC_MD.png';
$title = 'Reportes UGC';
$logo3 = 'https://wwwp.ugc.edu.co/sede/bogota/pages/recibos/app/imagenes/ugc.png';
$logo4 = 'https://wwwp.ugc.edu.co/sede/bogota/pages/TramiteSolicitudes/app/imagenes/logoUGC.png';

//Assign
$smarty->assign('logo', $logo);
$smarty->assign('logo2', $logo2);
$smarty->assign('title', $title);
$smarty->assign('logo3', $logo3);
$smarty->assign('logo4', $logo4);
$smarty->display('login.tpl');
?>