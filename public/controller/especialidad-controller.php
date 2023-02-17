<?php
    //require_once "../model/espec$especialdiad.php";
    require_once 'C:\xampp\htdocs\MedicalSystem\public\model\especialidad.php';
   
    class especialidadController{
        private $model;

        public function __CONSTRUCT(){
            $this->model = new especialidad;
        }

        public function Index(){
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\asesor\admin_especialidad.php';
        }

        public function Crud(){
            $especialdiad = new especialidad();
            if(isset($_REQUEST['id_especialidad'])){
                $especialdiad = $this->model->Obtener($_REQUEST['id_especialidad']);
            }
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\asesor\registrarEspecialidad.php';
        }

        public function Guardar(){
            $especialdiad = new especialdiad();

            $especialdiad->id_especialdiad = $_REQUEST['id_especialdiad'];
            $especialdiad->especialidad = $_REQUEST['especialidad'];

            $especialdiad->id_especialdiad > 0 
                   ? $this->model->Actualizar($especialdiad)
                   :$this->model->Registrar($especialdiad); 
                header('Location: ../asesor/especialdiad.php');
        }
        
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id_especialdiad']);
            header('Location: ../asesor/especialdiad.php');
        }
    }

?>