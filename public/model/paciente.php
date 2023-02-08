<?php
    class paciente{
        private $pdo;

        public $id_paciente;
        public $nombre;
        public $password;
        public $email;
        public $cedula;
        public $genero;
        public $telefono;

        public function __CONSTRUCT(){
            try{
                $this->pdo = connection::connect();
              
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Listar(){
            try{
                $result = array();
                //$query = "SELECT * FROM medicalsystemdb.paciente"; 
                //$stm = $this->pdo->prepare($query);
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.paciente ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }

        public function Obtener($id_paciente){
            try{
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.paciente WHERE id_paciente= ? ;");
                $stm->execute(array($id_paciente));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Eliminar($id_paciente){
            try{
                $stm = $this->pdo->prepare("DELETE  FROM medicalsystemdb.paciente WHERE paciente.id_paciente = ? ;");
                $stm->execute(array($id_paciente));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Actualizar($data){
            try{
                $sql = "UPDATE medicalsystemdb.paciente SET 
                     nombre = ?, 
                     password = ?, 
                     email = ?, 
                     cedula = ?,
                     genero = ?,
                     telefono = ? 
                     WHERE id_paciente = ? ;";
                
                $this->pdo->prepare($sql)
                     ->execute(
                        array(
                            $data->nombre, 
                            $data->password,
                            $data->email,
                            $data->cedula,
                            $data->genero,
                            $data->telefono,
                            $data->id_paciente
                        )
                    );
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Registrar(paciente $data){
            try{
                $sql = "INSERT INTO medicalsystemdb.paciente (nombre,password,email,cedula,genero,telefono)
                 VALUES (?, ?, ?, ?, ?, ?) ;";
                 
                 $this->pdo->prepare($sql)
                 ->execute(
                    array(
                    $data->nombre, 
                    $data->password, 
                    $data->email, 
                    $data->cedula, 
                    $data->genero, 
                    $data->telefono
                 ));
            }catch(Exception $e){   
                die($e->getMessage());
            }
        }
    }
?>