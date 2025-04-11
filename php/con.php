<?php
try{
 $conn = new
 PDO("sqlite:/data/data/com.termux/files/home/htdocs/clinica/database/clinica.db");
 
}catch(PDOException $e){
  echo "erro: " . $e->getMessage();
}
 
 