<?php
        	//validando se existe algum erro no código php
            ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
            
			//Importando obejto conexão
			include_once('conectbd.php');

			$id = $_POST["fldID"];
            $data = $_POST["fldData"];
            $valor = $_POST["fldValor"];
            $descricao = $_POST["fldDescricao"];
            
            //verifica se existe conexão com o banco de dados através da função acessarbd
            acessarbd();

            //variável que armazena a conexão com o banco de dados
			$bd_conected = true;


            if ($bd_conected) {
				$string_sql = "update gastos SET data='$data', valor='$valor', descricao='$descricao' where cod_gasto='$id'";
				$save = mysqli_query(acessarbd(), $string_sql); //Realiza a consulta

				if ($save != 0) {
					echo "<!DOCTYPE html";
					echo "<html>";
						echo "<head>";
							echo "<title>Editar Gastos</title>";
						echo "</head>";
						echo "<body>";
						
						echo "<div align='center'>";
							echo "<table width=759 border=0>";
								echo "<tr>";
									echo "<td bgcolor='#FF9900'>";
										echo "<div align='center'>";
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

						echo '<p><a href="alt_gastos.html">Alterar outra despesa</a><br/>'; //Apenas um link para retornar para a consulta
						echo '<a href="principal.html">Tela Principal</a></p>'; //Apenas um link para retornar para o site da empresa
					
					echo "</body>";
					echo "</html>";

				}
				else {
					echo "<h2><center>Erro na atualização do cadastro do cliente !</center></h2>";
					 	echo "<br/><br/>";
					echo mysqli_free_result($save);
				}	

			}

?>