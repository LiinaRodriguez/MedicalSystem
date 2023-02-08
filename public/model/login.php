<?php
    include ("paciente.php");
    class Sesion  extends paciente{
        private $pdo;

        public $email;
        public $password;


        public function __CONSTRUCT(){
            try{
                $this->pdo = connection::connect();
              
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

       
        public function inicioSesion($paciente){
                $query = "SELECT * FROM medicalsystemdb.paciente WHERE paciente.email = :email AND paciente.password= :password;";
                self::connect(); 

                $result = self::$pdo->prepare(query);
                $result->bindParam(":email", $emal->getEmail());
                $result->bindParam(":password", $password->getPassword());

                $result->execute();
        }
    }

?>