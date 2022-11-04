<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Gastos</title>
	<meta charset="utf-8"/>
    </head>
    <body>
        <?php
            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); //validando se existe algum erro no código php

//Declaramos váriaveis que serão usadas durante a executação do código	
	    $i=1; //Variavel que será utilizada como controle na função if.. else
	    $total = 0.0; //Variavel que será utilizada para somar valores inseridos na tabela

            
//verifica se existe conexão com bd, caso não tenta criar uma nova
            $conexao = mysqli_connect("localhost","root","Redes123!") //porta, usuário, senha
            or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
     
            $select_db = mysqli_select_db($conexao, "despesas"); //seleciona o banco de dados
     
           
 //Abaixo atribuímos os valores provenientes do formulário pelo método POST
            $data_ini = $_POST["data_ini"];
	    	$data_fim = $_POST["data_fim"];  
            $descricao = $_POST["descricao"];
	    	$tabela = $_POST["tabela"];
	    
     
//Abaixo validamos a consulta ao banco de acordo com as informações provenientes do formulário pelo método POST
	    if ($data_ini != null){		
            	$string_sql = "SELECT * from gastos where data between '$data_ini' and '$data_fim'"; // String com consulta SQL da data inicial
		$i--;
     	    }
	    	else if ($descricao != null){	//validando se existe algum conteudo na opção de busca do formulário
            		$string_sql = "SELECT * from gastos where descricao='$descricao'"; // String com consulta SQL da descrição
			$i--;

	    		}else {	//validando se existe algum conteudo na opção de busca do formulário
            			$string_sql = "SELECT * from $tabela"; // String com consulta SQL da descrição
				$i--;
			}

				

		$consulta = mysqli_query($conexao, $string_sql); //Realiza a consulta
     
		if(mysqli_num_rows($consulta) > 0){ //verifica se existe conteudo na tabela e faz a impressão
               
			while($row = mysqli_fetch_assoc($consulta)) {
				echo "Código:" . $row["cod_gastos"]. "</a> "; //imprime o campo que você escolheu da tabela existente no mysql
               			echo "Data: " . $row["data"]. " "; //imprime o campo que você escolheu da tabela existente no mysql
				echo "Valor: " . $row["valor"]. " "; //imprime o campo que você escolheu da tabela existente no mysql
				echo "Descrição: " . $row["descricao"]. "<br/>"; //imprime o campo que você escolheu da tabela existente no mysql
						
				$total += $row["valor"]; // soma os campos escolhidos da tabela
            		}

			echo "<p>Consutla feita com sucesso</p>";

			echo "<p>Total das Despesas $total</p><br/>"; //imprime a soma dos campos escolhidos da tabela.

			echo '<a href="cons_gastos.html">Consultar nova despesa</a><br/>'; //Apenas um link para retornar para a consulta
			echo '<a href="principal.html">Voltar para pagina principal da empresa</a>'; //Apenas um link para retornar para o site da empresa

            	} else {
                	echo "Não existem dados a serem exibidos <br/>";
			echo '<a href="cons_gastos.html">Tentar consultar novamente a despesa</a><br/>'; //Apenas um link para retornar para a consulta
			echo '<a href="principal.html">Voltar para pagina principal da empresa</a>'; //Apenas um link para retornar para o site da empresa
		
            	}
	

     
            mysqli_close($conexao); //fecha conexão com banco de dados 
        ?>



    </body>
</html>
