<?php
    include_once 'sesionUsuario.php';

    $userSession = new UserSession();
    $userSession->CerrarSesion();
    
    header("Location: ../../index.php");

?>