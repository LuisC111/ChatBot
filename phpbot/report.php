<?php

session_start();
require_once('./include/loginfo.php');


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
$logo2 = './assets/images/logoUGC.png';
$title = 'Reportes UGC';
$logo3 = './assets/images/ugc.png';
$logo4 = './assets/images/logoG.png';


//Assign
$smarty->assign('logo2', $logo2);
$smarty->assign('title', $title);
$smarty->assign('logo3', $logo3);
$smarty->assign('logo4', $logo4);
$smarty->display('pagina.tpl');
?>