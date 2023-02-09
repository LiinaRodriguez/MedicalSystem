<?php
    //require_once "../model/paciente.php";
    require_once 'C:\xampp\htdocs\MedicalSystem\public\model\paciente.php';
   
    class pacienteController{
        private $model;

        public function __CONSTRUCT(){
            $this->model = new paciente;
        }

        public function Index(){
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\asesor\admin_paciente.php';
        }

        public function Crud(){
            $paciente = new paciente();
            if(isset($_REQUEST['id_paciente'])){
                $paciente = $this->model->Obtener($_REQUEST['id_paciente']);
            }
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\asesor\registrarPaciente.php';
        }

        public function Guardar(){
            $paciente = new paciente();

            $paciente->id_paciente = $_REQUEST['id_paciente'];
            $paciente->nombre = $_REQUEST['nombre'];
            $paciente->password = $_REQUEST['password'];
            $paciente->email = $_REQUEST['email'];  
            $paciente->cedula = $_REQUEST['cedula'];
            $paciente->genero = $_REQUEST['genero'];
            $paciente->telefono = $_REQUEST['telefono'];

            $paciente->id_paciente > 0 
                   ? $this->model->Actualizar($paciente)
                   :$this->model->Registrar($paciente); 
                header('Location: ../asesor/paciente.php');
        }
        
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id_paciente']);
            header('Location: ../asesor/paciente.php');
        }
    }

?>