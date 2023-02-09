<?php
    include_once 'conection.php';

   Class User extends Connection{
        private $email;
        private $nombre;
        private $id_paciente;


        public function userExist($user, $pass){  

            $pass = $pass;
            $query = $this->connect()->prepare('SELECT * FROM medicalsystemdb.paciente WHERE paciente.email = :user AND paciente.password = :pass');
            $query->execute(['user'=> $user, 'pass'=> $pass]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
        }


        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM medicalsystemdb.paciente WHERE paciente.email = :user');
            $query->execute(['user'=>$user]);

            foreach($query as $usuarioActual){
                $this->nombre = $usuarioActual['nombre'];
                $this->email = $usuarioActual['email'];
                $this->id_paciente = $usuarioActual['id_paciente'];
            }

           
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getId(){
            return $this->id_paciente;
        }
    }

?>