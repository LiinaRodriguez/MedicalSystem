<?php 
    class cita{
        private $pdo;

        public $id_cita;
        public $fecha; 
        public $id_medico;
        public $id_paciente;
        public $id_especialidad;
        public $id_sede;

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
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.cita LEFT JOIN medicalsystemdb.medico ON cita.id_medico = medico.id_medico LEFT JOIN medicalsystemdb.sede ON cita.id_sede = sede.id_sede LEFT JOIN medicalsystemdb.especialidad ON cita.id_especialidad = especialidad.id_especialidad;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function selectEsp(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.especialidad ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function selectSede(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.sede ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function selectMedico(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.medico ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function selectPaciente(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.paciente ;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function selectPatient($email){
            try{
              
                $stm = $this->pdo->prepare("SELECT id_paciente FROM medicalsystemdb.paciente WHERE paciente.email = ?");
                $stm->execute(array($email));
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Obtener($id_cita){
            try{
                $stm = $this->pdo->prepare("SELECT * FROM medicalsystemdb.cita WHERE cita.id_cita = ?;");
                $stm->execute(array($id_cita));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }

        }

        public function Actualizar($data){
            try{
                $sql = "UPDATE medicalsystemdb.cita SET 
                     fecha = ?, 
                     id_m??dico = ?, 
                     id_especialidad = ?, 
                     is_sede = ?,
                     WHERE id_cita = ? ;";
                
                $this->pdo->prepare($sql)
                     ->execute(
                        array(
                            $data->fecha, 
                            $data->id_medico, 
                            $data->id_paciente, 
                            $data->id_especialidad, 
                            $data->id_sede
                        ));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Registrar(cita $data){
            try{
                $sql = "INSERT INTO medicalsystemdb.cita (fecha,id_medico,id_paciente,id_especialidad,id_sede)
                 VALUES (?, ?, ?, ?, ?) ;";
                 
                 $this->pdo->prepare($sql)
                 ->execute(
                    array(
                    $data->fecha, 
                    $data->id_medico, 
                    $data->id_paciente, 
                    $data->id_especialidad, 
                    $data->id_sede
                 ));
            }catch(Exception $e){   
                die($e->getMessage());
            }
        }

        public function Eliminar($id_cita){
            try{
                $stm = $this->pdo->prepare("DELETE  FROM medicalsystemdb.cita WHERE cita.id_cita = ? ;");
                $stm->execute(array($id_cita));
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }


?>