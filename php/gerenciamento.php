<?php
 include "con.php";
  if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
 //$stmt = $conn->prepare("SELECT * FROM paciente");
//$stmt->execute();
//$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$filtro = $_GET['filtro'] ?? '';

$query = "SELECT * FROM paciente";
  
  switch($filtro){
    case 'alfabetica':
      $query .= " ORDER BY nome ASC";
      break;
      
    //  case "data":
      //  $query .= "ORDER BY data DESC ";
      //  break;
        
        case "gravidade":
          
          $query .= " ORDER BY gravidade ASC ";
          break;
  }
 $stmt = $conn->prepare($query);
 $stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciamento de Pacientes</title>
    <link rel="stylesheet" href="../estilos/gerenciamento.css">
  </head>
  <body>
    <header class="header">
      <h1>Gerenciamento de Pacientes</h1>
      
      <nav>
        <a href="../cadastro.html">Cadastro</a>
      </nav>
    </header>
    <main>
      <div class="filtrar">
  <form method="GET" action="">
    <select name="filtro">
      <option value="alfabetica">Ordem Alfabética</option>
      <option value="data">Data de Cadastro</option>
      <option value="gravidade">Gravidade</option>
      
    </select>
    <button type="submit">Filtrar</button>
  </form>
</div>
      
      
 <?php 
 foreach($result as $row): ?>
      <table border=1>
        <tr>
         <th>Nome</th>
         <th>Gravidade</th>
         <th>Visualizar</th>
        </tr>
        <tr>
<td><?= $row['nome'] ?></td>
<td><?= $row['gravidade'] ?>
<td><a href="visualizar.php" >Ver Mais</a></td>
       </tr>
     <?php endforeach; ?>
    </main>
  </body>
</html>