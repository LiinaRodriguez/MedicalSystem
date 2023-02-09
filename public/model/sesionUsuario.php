<?php 
    class UserSession{
        public function __CONSTRUCT(){
            session_start(); 
        }

        public function setUsuarioActual($user){
            $_SESSION['user'] = $user;
            
        }

        public function getUsuarioActual(){
            return $_SESSION['user']; 
        }

        public function getId(){
            return $_SESSION['id_paciente'];
        }

        public function CerrarSesion(){
            session_unset();
            session_destroy();
        }
    }

?>