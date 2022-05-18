<?php

//Add Smarty class
require_once('Smarty.class.php');
date_default_timezone_set('America/Bogota');

//Instance Class
$smarty = new Smarty();
//Add routes    
$smarty->template_dir = ('C:\xampp\plantillas_smarty\Testing\templates');
$smarty->compile_dir = ('C:\xampp\plantillas_smarty\Testing\templates_c');
$smarty->config_dir =('C:\xampp\plantillas_smarty\Testing\config');
    
//PHP CODE

$logo = 'img/logoUGC.png';
$bool = false;
$titulo = 'Testing templates';
$nombre = 'Luis Carlos Martinez';
$fecha = "Hoy es: " . date("Y-m-d");
$hora = "La hora es: " . date("H:i:s");


//Assign
$smarty->assign('logo', $logo);
$smarty->assign('bool', $bool);
$smarty->assign('title', $titulo);
$smarty->assign('content', $nombre);
$smarty->assign('date', $fecha);
$smarty->assign('time', $hora);
$smarty->assign('Contacto',
    array('fax' => '123-45.67',
          'email' => 'luis.martinez1@ugc.edu.co',
          'phone' => array('home' => '1234567',
                           'cell' => '3024358217')
                           )
         );

//Display
$smarty->display('ejemplo1.tpl');
?>




