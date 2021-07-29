<?php
class Database{
    private $db_host = 'sql6.freemysqlhosting.net';
    private $db_name = 'sql6428206';
    private $db_username = 'sql6428206';
    private $db_password = '6QKh7iNhRN';
    
    public function dbConnection(){
        
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
          
    }
}
