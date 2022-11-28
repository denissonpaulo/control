<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Gastos</title>
    </head>
    <body>
        <?php
        	
        	//validando se existe algum erro no código php

            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
            
            //Importando obejto conexão
			include_once('conectbd.php');
            
            //verifica se existe conexão com o banco de dados através da função acessarbd
            acessarbd();
     
            //Abaixo atribuímos os valores provenientes do formulário pelo método POST
            $data = $_POST["data"]; 
            $valor = (float) $_POST["valor"];
            $descricao = $_POST["descricao"];
     
     		//String com o SQL da inserção
            $string_sql = "INSERT INTO gastos(data,valor,descricao) VALUES ('$data','$valor','$descricao')"; 
     
            mysqli_query(acessarbd(), $string_sql); //Realiza a consulta
     
            if(mysqli_affected_rows(acessarbd()) == -1){ //verifica se foi inserida alguma linha no banco
                echo "<h1 align='center'>Cadastro realizado com sucesso</h1>";
                echo '<meta http-equiv="refresh" content="2;url=principal.html">'; //Redirecionando para pagina principal
                

            } else {
                echo "Erro, não foi possível inserir no banco de dados <br/>";
				echo '<a href="cad_gastos.html">Tentar novamente</a><br/>'; //link para retornar ao cadastro
				echo '<a href="principal.html">Deseja voltar para tela Principal</a><br/>'; //link para retornar ao da empresa
				echo '<meta http-equiv="refresh" content="7;url=principal.html">'; //Redirecionando para pagina principal
				
            }
     
            //fecha conexão com o banco de dados
            encerrarbd(acessarbd()); 
        ?>
	

    </body>
</html>
