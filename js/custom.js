//recebe o elemento do formulario pesquisar
const formPesquisar = document.getElementById('form-pesquisar');

//verificar se existe o elemento formulario pesquisar

if(formPesquisar){
    formPesquisar.addEventListener("submit", async (e) => {
        //bloquear para não recaregar a página
        e.preventDefault();

        // receber os dados do formulário
        const dadosForm = new FormData(formPesquisar);

        //imprimir os valores
        for(var dadosFormPesq of dadosForm.entries()){
            console.log(dadosFormPesq[0] + " - " + dadosFormPesq[1]);
        }

        //fazer a requisição para o arquivo pesquisar.php
        const dados = await fetch("pesquisar.php", {
            method: "POST",
            body: dadosForm
        });

        //ler os dados retornados do arquivo pesquisa.php
        const resposta = await dados.json();
        console.log(resposta);

        //Acessa o IF quando não retornar nenhum usuário do banco de dados
        if(!resposta['status']){
            //Enviar a mensagem de erro do JavaScript para o HTML
            document.getElementById("msg").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msg").innerHTML = "";


            // Enviar a lista de usuarios em Java Script
            document.getElementById("listar_usuarios"). innerHTML = resposta['dados'];
        }

    });
}