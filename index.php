<?php
include('./src/NSSuite.php');
foreach (glob('./src/Requisicoes/*/*.php') as $filename) { 
    require_once($filename); 
} 

// Para testes de metodos::.
?>
