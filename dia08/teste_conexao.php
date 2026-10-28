<?php

try{
    require_once "conexao.php";
    echo "<p>\u{2705} Conectado com sucesso!</p>";
}catch(PDOException $e){
    echo "<p>Erro: ".$e->getMessage()."</p>";
}


