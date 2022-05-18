<?php

require '../model/loginModel.php';

//iniciar sesion
class iniciarSesion extends conexion{

  public function iniciarSesion($correoUsuario, $passwordUsuario){
          $conexion = $this->conectar();
          $sql = "SELECT * FROM inicio WHERE correoUsuario = '$correoUsuario' AND passwordUsuario = '$passwordUsuario'";
          $resultado = $this->consulta($sql);
          $fila = $resultado->fetch_assoc();
          if (!$fila) {
            $bad = "Usuario o contraseña incorrectos";
            echo "<script> window.addEventListener('load', init, false);
                  function init () {
                      Swal.fire({
                          title: '¡Ha ocurrido un error!',
                          text: '$bad',
                          icon: 'error',
                          buttons: true,
                          dangerMode: true,
                        }).then((willDelete) => {
                      if (willDelete) {
                          location.href = '../../login.php';                
                      } else {
                              location.href = '../../login.php';              
                          }
                    });
                  } 
                    </script>";        
                    }else{

                      session_start();
                      $_SESSION['correoUsuario'] = $fila['correoUsuario'];
                      $_SESSION['passwordUsuario'] = $fila['passwordUsuario'];

            $welcomer = "Bienvenido, $correoUsuario";
            echo "<script> window.addEventListener('load', init, false);
                  function init () {
                      Swal.fire({
                          title: '¡Incio de sesión exitoso!',
                          text: '$welcomer',
                          icon: 'success',
                          buttons: true,
                          dangerMode: true,
                        }).then((willDelete) => {
                      if (willDelete) {
                          location.href = '../../report.php';                
                      } else {
                              location.href = '../../report.php';              
                          }
                    });
                  } 
                    </script>";

             
          }


        }
              }

$inicio = new iniciarSesion();
$inicio->iniciarSesion($_POST['correoUsuario'], $_POST['passwordUsuario']);


      ?>

<html>

<head>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    * {
      font-family: "Poppins";
    }
  </style>

</head>

<body>


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

</body>

</html>