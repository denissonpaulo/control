<?php

class DaoUsuario {

  public static $instance;

  private function __construct() {
      //
  }

  public static function getInstance() {
      if (!isset(self::$instance))
          self::$instance = new DaoUsuario();

      return self::$instance;
  }

  public function getNextID() {
      try {
          $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='usuario'";
          $result = Conexao::getInstance()-&gt;query($sql);
          $final_result = $result-&gt;fetch(PDO::FETCH_ASSOC);
          return $final_result['Auto_increment'];
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      }
  }


  public function Inserir(PojoUsuario $usuario) {
      try {
          $sql = "INSERT INTO usuario (
              login,
              senha)
              VALUES (
              :login,
              :senha)";

          $p_sql = Conexao::getInstance()-&gt;prepare($sql);

          $p_sql-&gt;bindValue(":login", $usuario-&gt;getLogin());
          $p_sql-&gt;bindValue(":senha", $usuario-&gt;getSenha());

          return $p_sql-&gt;execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
          GeraLog::getInstance()-&gt;inserirLog("Erro: Código: " . $e-&gt;getCode() . " Mensagem: " . $e-&gt;getMessage());
      }
  }

  public function Editar(PojoUsuario $usuario) {
      try {
          $sql = "UPDATE usuario set
              login = :login,
              senha = :senha, WHERE cod_usuario = :cod_usuario";

          $p_sql = Conexao::getInstance()-&gt;prepare($sql);

          $p_sql-&gt;bindValue(":cod_usuario", $usuario-&gt;getCod_usuario());
          $p_sql-&gt;bindValue(":login", $usuario-&gt;getLogin());
          $p_sql-&gt;bindValue(":senha", $usuario-&gt;getSenha());

          return $p_sql-&gt;execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      }
  }


  public function Deletar($cod) {
      try {
          $sql = "DELETE FROM usuario WHERE cod_usuario = :cod";
          $p_sql = Conexao::getInstance()-&gt;prepare($sql);
          $p_sql-&gt;bindValue(":cod", $cod);

          return $p_sql-&gt;execute();
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      }
  }


  public function BuscarPorCOD($cod) {
      try {
          $sql = "SELECT * FROM usuario WHERE cod_usuario = :cod";
          $p_sql = Conexao::getInstance()-&gt;prepare($sql);
          $p_sql-&gt;bindValue(":cod", $cod);
          $p_sql-&gt;execute();
          return $this-&gt;populaUsuario($p_sql-&gt;fetch(PDO::FETCH_ASSOC));
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      }
  }


  public function BuscarTodos() {
      try {
          $sql = "SELECT * FROM usuario order by login";
          $result = Conexao::getInstance()-&gt;query($sql);
          $lista = $result-&gt;fetchAll(PDO::FETCH_ASSOC);
          $f_lista = array();

          foreach ($lista as $l)
              $f_lista[] = $this-&gt;populaUsuario($l);

          return $f_lista;
      } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      }
  }


  private function populaUsuario($row) {
      $pojo = new PojoUsuario;
      $pojo-&gt;setCod_usuario($row['cod_usuario']);
      $pojo-&gt;setLogin($row['login']);
      $pojo-&gt;setSenha($row['senha']);
      $pojo-&gt;setPerfil(ControllerPerfil::getInstance()-&
      gt;BuscarPorCOD($row['cod_usuario']));
      return $pojo;
  }

}

?>
