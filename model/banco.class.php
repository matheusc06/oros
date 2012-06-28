
<?php

/**
 *  
 *  @author Ramon Willer
 */
abstract class Banco {
    
    private $endereco   = null;
    private $usuario    = null;
    private $senha      = null;
    private $banco      = null;
    private $conexao    = null;
    private $consulta   = null;
    private $codigo     = null;

    public function __construct() {
        
    }
    
    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getBanco(){
        return $this->banco;
    }

    public function setBanco($banco){
        $this->banco = $banco;
    }

    public function getConexao(){
        return $this->conexao;
    }

    public function setConexao($conexao){
        $this->conexao = $conexao;
    }

    public function getConsulta(){
        return $this->consulta;
    }

    public function setConsulta($consulta){
        $this->consulta = $consulta;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }    

    public function Conectar(){
        $this->conexao = mysql_connect($this->endereco, $this->usuario, $this->senha);
        mysql_select_db($this->banco);
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection = utf8');
        mysql_query('SET character_set_client = utf8');
        mysql_query('SET character_set_results = utf8');	
    }
    
    public function Desconectar(){
        mysql_close($this->conexao);
    }
    
    public function Executar($sql){
        $this->consulta = mysql_query($sql, $this->conexao);
        return $this->consulta;
    }
    
    public function UltimoCodigo($tabela){
        $this->consulta = mysql_query("SELECT max(last_insert_id()) as id FROM $tabela");
        $this->consulta = mysql_fetch_object($this->consulta);
        $this->codigo = $this->consulta->id;
        return $this->codigo;
    }
}
?>
