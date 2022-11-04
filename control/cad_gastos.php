<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Gastos</title>
    </head>
    <body>
        <?php
            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); //validando se existe algum erro no código php

            //verifica se existe conexão com bd, caso não tenta criar uma nova
            $conexao = mysqli_connect("localhost","root","Redes123!") //porta, usuário, senha
            or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
     
            $select_db = mysqli_select_db($conexao, "despesas"); //seleciona o banco de dados
     
            //Abaixo atribuímos os valores provenientes do formulário pelo método POST
            $data = $_POST["data"]; 
            $valor = (float) $_POST["valor"];
            $descricao = $_POST["descricao"];
     
            $string_sql = "INSERT INTO gastos(data,valor,descricao) VALUES ('$data','$valor','$descricao')"; //String com o SQL da inserção
     
            mysqli_query($conexao, $string_sql); //Realiza a consulta
     
            if(mysqli_affected_rows($conexao) == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
                echo "<p>Cadastro feito com sucesso</p>";
		echo '<a href="cad_gastos.html">Cadastrar nova despesa</a><br/>'; //Apenas um link para retornar ao cadastro
		echo '<a href="principal.html">Voltar para pagina principal da empresa</a>'; //Apenas um link para retornar ao site da empresa

            } else {
                echo "Erro, não foi possível inserir no banco de dados";
		echo '<a href="cad_gastos.html">Tentar cadastrar novamente a despesa</a><br/>'; //Apenas um link para retornar ao cadastro
		echo '<a href="principal.html">Voltar para pagina principal da empresa</a>'; //Apenas um link para retornar ao da empresa
		
            }
     
            mysqli_close($conexao); //fecha conexão com banco de dados 
        ?>



    </body>
</html>
