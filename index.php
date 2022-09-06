<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar em PHP e JS</title>
</head>
<body>
    <h1>Pesquisar em mais e uma tabela com PHP e JS</h1>

    <span id="msg"></span>

    <form id="form-pesquisar" action="">
        <label for="">Pesquisar:</label>
        <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo?">
        <br><br>
        <input type="submit" id="btn-pesquisar" value="pesquisar" name="pesquisar_usuario">
    </form>

    <span id="listar_usuarios"></span>

    <script src="js/custom.js"></script>
</body>
</html>