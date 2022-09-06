<?php

//iniciar conexão
$host = "localhost";
$user = "usuarioTeste";
$pass = "usuarioTeste";
$dbname = "base_busca";
$port = 3306;


try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=". $dbname, $user, $pass);

    //conexão sem porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão realizada com sucesso.";

} catch(PDOException $erro){
    die("ERRO: Erro gerado ao tentar conectar com o banco de dados. " . 
    $erro->getMessage());
}

?>