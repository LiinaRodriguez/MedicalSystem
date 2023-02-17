<?php
    class especialidad{
        private $pdo;

        public $id_especialidad;
        public $especialidad;

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
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.especialidad ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Obtener($id_especialidad){
            try{
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.especialidad WHERE id_especialidad= ? ;");
                $stm->execute(array($id_especialidad));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Eliminar($id_especialidad){
            try{
                $stm = $this->pdo->prepare("DELETE  FROM medicalsystemdb.especialidad WHERE especialdiad.id_especialidad = ? ;");
                $stm->execute(array($id_especialidad));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Actualizar($data){
            try{
                $sql = "UPDATE medicalsystemdb.especialidad SET 
                     especialidad = ?, 
                     WHERE id_especialidad = ? ;";
                
                $this->pdo->prepare($sql)
                     ->execute(
                        array(
                            $data->especialidad, 
                            $data->id_especialidad
                        )
                    );
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Registrar(especialidad $data){
            try{
                $sql = "INSERT INTO medicalsystemdb.especialidad (especialidad)
                 VALUES (?) ;";
                 
                 $this->pdo->prepare($sql)
                 ->execute(
                    array(
                    $data->especialidad
                 ));
            }catch(Exception $e){   
                die($e->getMessage());
            }
        }
    }
?>