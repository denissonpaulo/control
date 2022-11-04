<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Control</title>
	    <meta charset="utf-8"/>
    </head>
    
    <body>
        <?php
            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); //validando se existe algum erro no código php

            //Declaramos váriaveis que serão usadas durante a executação do código	
	        $i=1; //Variavel que será utilizada como controle na função if.. else
	        $total = 0.0; //Variavel que será utilizada para somar valores inseridos na tabela

            
            //verifica se existe conexão com bd, caso não tenta criar uma nova
            $conexao = new mysqli("localhost","denisson","123456") //porta, usuário, senha
            or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
     
            $select_db = mysqli_select_db($conexao, "control"); //seleciona o banco de dados
     
           
            //Abaixo atribuímos os valores provenientes do formulário pelo método POST
            $login = $_POST["login"];
	        $senha = $_POST["senha"];  
           	    
     
            //Abaixo validamos a consulta ao banco de acordo com as informações provenientes do formulário pelo método POST
	        if ($login != null){

               	$string_sql = "SELECT * from usuario where login='$login' and senha='$senha'"; // String com consulta SQL da data inicial
                $consulta = mysqli_query($conexao, $string_sql); //Realiza a consulta
                
                 if(mysqli_num_rows($consulta) > 0){ //verifica se existe conteudo na tabela e faz a impressão
                        echo '<h1>Login realizado com sucesso!<br/><br/></h1>'; //Menssagem para o usuário
                        
                        //Redirecionamento PHP usando função HEADER
                        header('Status: Redirecinando para página principal', false, 301);
						header('Location: principal.html');
                        
                } else {
                        echo '<h1>Login ou Senha incorreta!<br/></h1>'; //Menssagem para o usuário
                        
                    }


		        
     	    }
	        else {	//validando se existe algum conteudo na opção de busca do formulário
            			
				echo "<h1>Login ou Senha incorreta!<br/></h1>";
                
		    }


     
            mysqli_close($conexao); //fecha conexão com banco de dados
            
             
        ?>

	<!-- Fazer Um Redirecionamento PHP usando a função META -->
	<meta http-equiv="refresh" content="2;url=index.html">

    </body>
</html>
