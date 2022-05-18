<?php

require '../../include/config.php';

class conexion{

  public function conectar(){
          $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          $conexion->set_charset("utf8");
          if ($conexion->connect_errno) {
              echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
          }
          return $conexion;
      }
  
  public function consulta($sql){
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


      ?>