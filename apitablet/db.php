<?php
//CAMBIOS
class DB{
    private $host;
    private $port;
    private $db;
    private $user;
    private $password;    

    public function __construct(){
        $this->host     = 'localhost';
        $this->user     = 'postgres';
        $this->password = '12345';                               
        $this->port     = '3358';
        $this->db       = 'sismed911';
    }    

    function connect(){
    
        try{

            
            $connection = "pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            //$pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo = new PDO($connection,$this->user,$this->password);            

            return $pdo;


        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }    
}
