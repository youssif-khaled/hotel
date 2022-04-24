
<?php

trait DB{


   private $servername = "sql664.main-hosting.eu";
   private  $username = "u401445780_mdc";
   private $password = "Root_1234";
   private $dbname = "u401445780_project";
    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password); 
           
         return $conn;
        } catch(PDOException $e) {
          echo "error". "<br>" . $e->getMessage();
        }
        
       
    }
    
    
    }
    
    // $user = new DB();
    // $user->connect();



?>