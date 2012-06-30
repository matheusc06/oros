<?php

class Configuration {
   
    private $dataHost;
    private $dataBase;
    private $dataUser;
    private $dataPass; 
    private $dataPort;
    private $dataType;
    
    public function getDataHost(){
        return $this->dataHost;
    }

    private function setDataHost($dataHost){
        $this->dataHost = $dataHost;
    }

    public function getDataBase(){
        return $this->dataBase;
    }

    private function setDataBase($dataBase){
        $this->dataBase = $dataBase;
    }

    public function getDataUser(){
        return $this->dataUser;
    }

    private function setDataUser($dataUser){
        $this->dataUser = $dataUser;
    }

    public function getDataPass(){
        return $this->dataPass;
    }

    private function setDataPass($dataPass){
        $this->dataPass = $dataPass;
    }

    public function getDataPort(){
        return $this->dataPort;
    }

    private function setDataPort($dataPort){
        $this->dataPort = $dataPort;
    }

    public function getDataType(){
        return $this->dataType;
    }

    private function setDataType($dataType){
        $this->dataType = $dataType;
    }
    
    public function DataBase(){
        
        if(file_exists("app.config/database.ini")){
            $config = parse_ini_file("app.config/database.ini");
        }else{
            throw new Exception("O arquivo de configuração do banco de dados não foi encontrado.");
        }
        
        $this->setDataHost(isset($config['host']) ? $config['user'] : NULL);
        $this->setDataBase(isset($config['base']) ? $config['base'] : NULL);
        $this->setDataUser(isset($config['user']) ? $config['user'] : NULL);
        $this->setDataPass(isset($config['pass']) ? $config['pass'] : NULL);
        $this->setDataPort(isset($config['port']) ? $config['port'] : NULL);
        $this->setDataType(isset($config['type']) ? $config['type'] : NULL);
        
    }
    
}
?>
