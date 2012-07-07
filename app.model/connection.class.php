<?php

require_once 'configuration.class.php';

class Connection extends Configuration{
    
    public $dataConnection;

    public function __construct() {
        $this->DataConnect();
    }
    
    public function getDataConnection(){
        return $this->dataConnection;
    }

    private function setDataConnection($dataConnection){
        $this->dataConnection = $dataConnection;
    }
    
    public function DataConnect(){
        
        parent::DataBase();
        $host = parent::getDataHost();
        $base = parent::getDataBase();
        $user = parent::getDataUser();
        $pass = parent::getDataPass();
        $port = parent::getDataPort();
        $type = parent::getDataType();
        
        switch ($type){
            case 'mysql': 
                $port = $port ? $port : '3306'; 
                $conn = new PDO("mysql:host={$host};port={$port};dbname={$base}", $user, $pass);
                break; 
            case 'pgsql':
                $port = $port ? $port : '5432';
                $conn = new PDO("pgsql:dbname={$base}; user={$user}; password={$pass}; 
                host=$host;port={$port}");
                break; 
            case 'sqlite': 
                $conn = new PDO("sqlite:{$base}"); 
                break; 
            case 'ibase': 
                $conn = new PDO("firebird:dbname={$base}", $user, $pass); 
                break; 
            case 'oci8': 
                $conn = new PDO("oci:dbname={$base}", $user, $pass); 
                break; 
            case 'mssql': 
                $conn = new PDO("mssql:host={$host},1433;dbname={$base}", $user, $pass); 
                break; 
       }
       
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
       $this->setDataConnection($conn);
    }

}
?>
