 <?php

	function criaruser(){
    	try {
	
        	$conn = new PDO ('mysql:host=localhost; dbname=', 'root', '');
	
        	// configurando o modo de erro PDO para exceção
        	$conn-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
        	// usando exec() porque nenhum resultado é retornado
        	$syntax_sql = $conn-> exec (
            	"CREATE USER IF NOT EXISTS 'denisson'@'localhost' IDENTIFIED BY '123456';
            	GRANT ALL PRIVILEGES ON *.* TO 'denisson'@'localhost';
            	FLUSH PRIVILEGES;"
            	);
	
            // Verificamos se a base de dados foi criada com sucesso
            if ( $syntax_sql > 0) {
                echo 'Usuário MySQL criado com sucesso!';
            } else {
                echo 'Usuário Já Existe! <br/>';
            }
			
	
        }
    	catch (PDOException $e) {
	
        	echo $syntax_sql. " ". $e-> getMessage();
	
        	}
	
		$syntax_sql=null;
        $conn = null;	
 
 	}   //Fim da função
 	
 	
 	function migratetables(&$bd, $syntax_sql, &$atributo1, &$atributo2, &$login, &$senha){
 		try {
 		    	
        	$conn = new PDO ('mysql:host=localhost; dbname=', 'denisson', '123456');
	
        	$syntax_sql = $conn-> exec (
            	"CREATE DATABASE IF NOT EXISTS $bd;
            	USE $bd;
            	CREATE TABLE IF NOT EXISTS usuario (
            	cod_user int not null auto_increment primary key,
            	login varchar(20), 
            	password varchar(20));");
        	
        	$syntax_sql=null;
        	$syntax_sql = $conn-> exec (
            	"CREATE TABLE IF NOT EXISTS gastos ( cod_gasto int not null auto_increment primary key,
            	data varchar(20), valor float, descricao varchar(50));
            	insert into usuario (login "," senha) values ($login "," $senha);"
            	);
	
            	// Verificamos se a base de dados foi criada com sucesso
            	if ( $syntax_sql >0 ) {
                	echo 'Comandos MySQL executados com sucesso!';
            	} else {
                	echo 'Falha! ou Base de Dados/Tabela Já Existe!';
            	}
	
        	echo "Usuario DENISSON e Banco de dados CONTROL criado com sucesso!";
	
        	}
    	catch (PDOException $e) {
	
        	echo $syntax_sql. " ". $e-> getMessage();
	
        	}
        	
    	$conn = null;
    	
    	return ($syntax_sql);
    }
    
    $bd = "control";
    $syntax_sql=null;
    $atributo1="login";
    $atributo2="password";
    $login="denisson";
    $senha="123456";
    
    criaruser();
    migratetables($bd, $syntax_sql, $atributo1, $atributo2, $login, $senha);
    echo $syntax_sql;

?>
