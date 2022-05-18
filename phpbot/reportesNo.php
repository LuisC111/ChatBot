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

// Code php
$logo2 = './assets/images/logoUGC.png';
$title = 'Reportes UGC';

//Assign
$smarty->assign('logo2', $logo2);
$smarty->assign('title', $title);

$smarty->display('reportesNo.tpl');

    
?>