<?php


echo "<script> window.addEventListener('load', init, false);
function init () {
    Swal.fire({
        title: '¡Cierre de sesion exitoso!',
        text: 'Su sesion ha finalizado correctamente',
        icon: 'success',
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
session_start();
session_destroy();
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
