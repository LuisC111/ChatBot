<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=phpbot','root','');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
$sql = "SELECT * FROM no_answer";
$st = $conn
    ->query($sql);
if ($st) {
    $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($id, $correo, $mensaje, $fecha) => [$id, $correo, $mensaje, $fecha] );
    echo json_encode([
        'data' => $rs,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}


?>