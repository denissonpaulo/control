<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Control</title>
	    <meta charset="utf-8"/>
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
            $login = $_POST["login"];
	        $senha = $_POST["senha"];  
           	    
     
            //Abaixo validamos a consulta ao banco de acordo com as informações provenientes do formulário pelo método POST
	        if ($login != null){

               	$string_sql = "SELECT * from usuario where login='$login' and senha='$senha'"; //Validando usuário e senha
                $consulta = mysqli_query(acessarbd(), $string_sql); //Realiza a consulta
                
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


            //fecha conexão com o banco de dados
            encerrarbd(acessarbd());
            
             
        ?>

	<!-- Outra forma de realizar um redirecionamento, mas agora usando a função META dentro do HTML -->
	<meta http-equiv="refresh" content="2;url=index.html">

    </body>
</html>
