<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Gastos</title>
	<meta charset="utf-8"/>
    </head>
    <body>
        <?php
        	//validando se existe algum erro no código php
            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
            
			//Importando obejto conexão
			include_once('conectbd.php');

			$id = $_POST["fldID"];
            
            //verifica se existe conexão com o banco de dados através da função acessarbd
            acessarbd();

            //variável que armazena a conexão com o banco de dados
			$bd_conected = true;

			if ($bd_conected) {
				$string_sql = "SELECT * from gastos where cod_gasto = '$id';";
				$consulta = mysqli_query(acessarbd(), $string_sql); //Realiza a consulta
				
				if(mysqli_num_rows($consulta) != 0){ //verifica se existe conteudo na tabela e faz a impressão
               	
					$row = mysqli_fetch_array($consulta);
					$cod_gasto = $row["cod_gasto"];
					$data = $row["data"];
					$valor = $row["valor"];
					$descricao = $row["descricao"];		
					
					echo "<DOCTYPE html";
					echo "<html>";
					echo "<head>";
					echo "<title>Editar Gastos</title>";
					echo "</head>";
					echo "<body>";

						echo '<form method="post" action="editar_gasto.php">';
						echo '<p>Código: <input type="hidden" name="fldID" value="'.$cod_gasto.'"></p>';
						echo '<p>Data: <input type="text" name="fldData" value="'.$data.'"></p>';
						echo '<p>Valor: <input type="text" name="fldValor" value="'.$valor.'"></p>';
						echo '<p>Descrição: <input type="text" name="fldDescricao" value="'.$descricao.'"></p>';


						echo '<a href="cons_gastos.html">Consultar outra despesa</a><br/>'; //Apenas um link para retornar para a consulta
						echo '<a href="principal.html">Tela Principal</a>'; //Apenas um link para retornar para o site da empresa


					echo "</body>";
					echo "</html>";
			
				} else {
							echo "<h1 align='center'>Não existem dados a serem exibidos </h1><br/>";
							echo '<a href="cons_gastos.html">Tentar consultar novamente a despesa</a><br/>'; //Apenas um link para retornar para a consulta
							echo '<a href="principal.html">Tela Principal</a>'; //Apenas um link para retornar para o site da empresa

							mysqli_free_result($consulta);
						}
			
		
		 
				//fecha conexão com o banco de dados
				mysqli_close(acessarbd()); 

			}

			if ($bd_conected) {
				$string_sql = "update gastos SET data='$data', valor='$valor', descricao='$descricao' where id='$id'";
				$save = mysqli_query(acessarbd(), $string_sql); //Realiza a consulta

				if ($save != 0) {
					echo "<div align='center'>";
					echo "<table width=759 border=0>";
					echo "<tr>";
					echo "<td bgcolor='#FF9900'>";
					echo "div align='center'>";
					echo "<font face=Verdana size=3><b>Confirmação de Atualização de Cadastro</b></font>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "<div align=çenter'>";
					echo "<font face=Arial size=3><b>Dados do cliente atualizados com sucesso !</b></font>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</div>";
					echo "<p>&nbsp;</p>";
					echo "<br/><br/>";
					echo "Data: $data <br/>";
					echo "Valor: $valor <br/>";
					echo "Descrição: $descricao <br/>";
				}
				else {
					echo "<h2><center>Erro na atualização do cadastro do cliente !</center></h2>";
					 	echo "<br/><br/>";
					echo mysqli_error();
				}	

			}
        ?>



    </body>
</html>
