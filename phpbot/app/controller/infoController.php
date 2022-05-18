<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=phpbot','root','');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
$sql = "SELECT * FROM answer";
$st = $conn
    ->query($sql);
if ($st) { 
    $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($id, $asunto, $correo, $mensaje, $fecha) => [$id, $asunto, $correo, $mensaje, $fecha] );
    echo json_encode([
        'data' => $rs,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}


?>