<?php
 include "con.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID inválido!";
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare(
  "SELECT * FROM paciente WHERE id = ?");
$pacientes = $stmt->execute([$id]);
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="estilos/cadastro.css">
  </head>
  <body>
    <header>
      <h1>Clínica de Fisioterapia</h1>
    </header>
    <main>
      <section = "cadastro">
        <form action="atualizar.php" method="POST">
  <?php foreach($pacientes as $paciente): ?>    
  <input type="hidden"
  name="id" value ="<?= htmlspecialchars($paciente['id']) ?>"> 
  
  
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?=
        htmlspecialchars($paciente['nome'] ?? '') ?>">
        
        <br>
        
      <label for="telefone">telefone:</label>
      <input type="text" name="telefone" value="<?=
        htmlspecialchars($paciente['telefone'] ?? '') ?>">
      <br>
      <label for="data_nas">Data de Nascimento:</label>
      <input type="date" name="data" value="<?=
        htmlspecialchars($paciente['data_de_nascimento'] ?? '') ?>">
      <br>
      <label for="observacoes">Observações</label>
      <input type="text" name="observacao"
      value = "<?=
        htmlspecialchars($paciente['observacao'] ?? '') ?>">
      <br>
      
      <select name="gravidade" value="<?=
        htmlspecialchars($paciente['gravidade'] ?? '') ?>">
        
        <option undefined>Gravidade do paciente</option>
        <option>Sem risco</option>
        <option>Com risco</option>
        <option>Grave</option>
        <option>Muito grave</option>
      </select>
    
      <br>
        <?php endforeach; ?>
      <button value="enviar">Enviar</button>
        </form>
      </section>
    </main>
  </body>
</html>