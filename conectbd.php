
<?php
	ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); //validando se existe algum erro no código php

	function acessarbd(){ //Declarando função de acesso ao banco de dados
                      
            //verifica se existe conexão com bd, caso não, tenta criar uma nova
            $conexao = new mysqli("localhost","denisson","123456") //porta, usuário, senha
            or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
     
            $select_db = mysqli_select_db($conexao, "control"); //seleciona o banco de dados
            
            return $conexao;
     		
     		}


	function encerrarbd()	{     
            mysqli_close(acessarbd()); //fecha conexão com banco de dados
            
            }
             
?>
