<?php
include "con.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID inválido!";
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare(
  "DELETE FROM paciente WHERE id = ?");
$stmt->execute([$id]);


?>

<h1 color="red">Excluído com sucesso!</h1>