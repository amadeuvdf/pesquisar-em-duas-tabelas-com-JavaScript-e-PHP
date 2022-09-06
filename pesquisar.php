<?php

//incluir a conexão com o banco de dados
include_once "./conexao.php";

//receber os dados do JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//acessar o IF quando o campo pesquisar usuario possuir valor
if(!empty($dados['texto_pesquisar'])){
    //variavel com caractere %
    $nome = "%" . $dados['texto_pesquisar'] . "%";

    //Query pesquisar usuarios
    $query = "SELECT usr.id, usr.nome, usr.email,
    vei.modelo
    FROM usuarios AS usr
    LEFT JOIN veiculos AS vei ON vei.usuario_id = usr.id
    WHERE usr.nome LIKE :nome
    OR vei.modelo LIKE :modelo
    ORDER BY usr.id ASC";
    //preparar a query
    $result_usuarios = $conn->prepare($query);
    //substitui :nome pela variavel com os dados $nome (Evita SQL injection).
    $result_usuarios->bindParam(':nome', $nome);
    $result_usuarios->bindParam(':modelo', $nome);

    //Executar query
    $result_usuarios->execute();

    $listar_usuarios = "";

    //Acessa o IF quando retornar registros do banco de dados
    if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){
        //Ler os registros
        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            //Extrair o array para imprimir (podemos colocar o nome da coluna como variavel).
            extract($row_usuario);

            // imprimir o valor de cada coluna
            $listar_usuarios .= "ID: $id <br/>";
            $listar_usuarios .= "Nome: $nome <br/>";
            $listar_usuarios .= "E-mail: $email <br/>";
            $listar_usuarios .= "Modelo/Marca: $modelo <br/>";
            $listar_usuarios .= "<hr>";
        }

        //criar um array de informações que será retornado para o JavaScript
        $retorno = ['status' => true, 'msg' => "Pesquisar", 'dados' => $listar_usuarios];
    } else {
            //retorna status falso no array e retorna mensagem
        $retorno = ['status' => false, 'msg' => "<p style='color: #f00'>Nenhum usuario encontrado!</p>"];
    }

} else {
    //retorna status falso no array e retorna mensagem
    $retorno = ['status' => false, 'msg' => "<p style='color: #f00'>Nenhum usuario encontrado!</p>"];
}



//Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorno);


