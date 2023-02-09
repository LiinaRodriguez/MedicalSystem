<?php
    
    require_once 'C:\xampp\htdocs\MedicalSystem\public\model\cita.php';

    class citaController{
        private $model;

        public function __CONSTRUCT(){
            $this->model = new cita;
        }

        public function Index(){
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once  'C:\xampp\htdocs\MedicalSystem\public\view\paciente\paciente_cita.php';
        }

        public function Crud(){
            $cita = new cita;
            if(isset($_REQUEST['id_cita'])){
                $cita = $this->model->Obtener($_REQUEST['id_cita']);
            }
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\header.php';
            require_once 'C:\xampp\htdocs\MedicalSystem\public\view\paciente\reservarCita.php';
        }

        public function Guardar(){
            $cita = new cita();

            $cita->id_cita = $_REQUEST['id_cita'];
            $cita->fecha = $_REQUEST['fecha'];
            $cita->id_medico = $_REQUEST['id_medico'];
            $cita->id_paciente = $_REQUEST['id_paciente'];
            $cita->id_especialidad = $_REQUEST['id_especialidad'];
            $cita->id_sede = $_REQUEST['id_sede'];
           

            $cita->id_cita > 0 
                   ? $this->model->Actualizar($cita)
                  : $this->model->Registrar($cita); 
                
                header('Location: ../paciente/cita.php');
                die;
        }


        public function Eliminar(){
            
            $this->model->Eliminar($_REQUEST['id_cita']);
            header('Location: ../paciente/cita.php');
            die;    
            
        }


    }

?>