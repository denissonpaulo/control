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
            	$atributo1 varchar(20), 
            	$atributo2 varchar(20));
				CREATE TABLE IF NOT EXISTS gastos ( 
				cod_gasto int not null auto_increment primary key,
            	data varchar(20), 
				valor float, 
				descricao varchar(50));");
				
				// Verificamos se a base de dados e tabelas foram criadas com sucesso
            	if ( $syntax_sql >0 ) {
                	echo 'Base de dados, tabelas usuario e gastos criadas com sucesso!';
            	} else {
                	echo 'Base de Dados e Tabelas Já Existem!<br/>';
            	}
        	
        	$syntax_sql=null;
        	$syntax_sql = $conn-> exec (
            	"INSERT INTO usuario ($atributo1, $atributo2) values ('denisson', '123456');"
            	);
	
            	// Verificamos se a base de dados foi criada com sucesso
            	if ( $syntax_sql >0 ) {
                	echo 'Usuário para primeiro acesso criado com sucesso!';
            	} else {
                	echo 'Usuário para primeiro acesso já existe!';
            	}
	
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
