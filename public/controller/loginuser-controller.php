<?php
    include_once 'C:\xampp\htdocs\MedicalSystem\public\model\user.php';
    include_once 'C:\xampp\htdocs\MedicalSystem\public\model\sesionUsuario.php';

    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user'])){
        #echo'existe sesion';

        $user->setUser($userSession->getUsuarioActual());
        include_once "../view/header.php";
        include_once "../view/paciente/cita.php";

    }elseif (isset($_POST['email']) && isset($_POST['password'])){
            #echo'validacion de login';
            $userForm = $_POST['email'];
            $passForm = $_POST['password'];
            if($user->userExist($userForm, $passForm)){
                #echo 'usuario válido';

                $userSession->setUsuarioActual("userForm"); 
                $user->setUser($userForm);
                include_once "../view/header.php";
                include_once "../view/paciente/cita.php";

            }else{
               #echo 'usuario invalido';
                $errorLogin = "Correo o contraseña incorrectos";
                include_once '../view/login.php';
            }
    }else{
        #echo'Login'; 
        include_once 'C:\xampp\htdocs\MedicalSystem\public\view\login.php';
    }
    
?>
