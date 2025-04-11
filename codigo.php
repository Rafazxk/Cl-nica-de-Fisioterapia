     
      <p>número de pacientes: 58</p>
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

      <table border=1>
        <tr>
         <th>Nome</th>
         <th>Telefone</th>
         <th>Data Nascimento</th>
         <th>Gravidade</th>
         <th>Observação</th>
         <th>Editar</th>
        </tr>
<?php foreach($pacientes as $paciente): ?>        
    <tr>
     <td><?=  htmlspecialchars($paciente['nome'] ?? '');   ?></td>
     <td><?= htmlspecialchars($paciente['telefone'] ?? ''); ?></td>
     <td><?= htmlspecialchars($paciente['data_de_nascimento'] ?? ''); ?></td>
     <td><?= htmlspecialchars($paciente['gravidade'] ?? ''); ?></td>
     <td><?= htmlspecialchars($paciente['observacao'] ?? ''); ?></td>
     
    <td>
     <a href="edit.php?id=<?= $paciente['id'] ?>">Editar</a>
     <a href="excluir.php?id=<?= $paciente['id'] ?>">Excluir</a>
    </td>
         </tr>  
    <?php endforeach; ?>
      </table>
    
    
    
     
      <?php foreach ($resultado as $row): ?>
    <p><?= $row['nome'] ?> - <?= $row['data_cadastro'] ?> - Gravidade: <?= $row['gravidade'] ?></p>
<?php endforeach; ?>

     