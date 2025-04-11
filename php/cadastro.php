<?php 

 include "con.php";
 
try{
  

   $nome = $_POST['nome'];
   $telefone = $_POST['telefone']; 
    $data_nasc = $_POST['data'];
    $gravidade = $_POST['gravidade'];
    
     $observacao = $_POST['observacao'];
 
   $stmt = $conn->prepare("
   INSERT INTO paciente(nome, telefone, observacao,data_de_nascimento, gravidade) VALUES (?,
   ?, ?, ?, ?);
   ");
   $stmt->execute([$nome, $telefone, $observacao, $data_nasc, $gravidade]);
   echo "inserido com sucesso;";
}catch(PDOException $e){
  echo "erro" . $e->getMessage();
}
