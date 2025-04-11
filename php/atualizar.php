<?php

include "con.php";
$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$observacao = $_POST['observacao'];
$gravidade = $_POST['gravidade'];

$stmt = $conn->prepare(
  "UPDATE paciente SET
  nome = ?, 
  telefone = ?,
  data_de_nascimento = ?, observacao = ?,
  gravidade = ?
  WHERE id = ?"
  );

$stmt->execute([$nome, $telefone, $data, $observacao, $gravidade, $id]);




?>