<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Log-In</title>
</head>

<body>
    <section class="vh-100" style="background-color: #e5e8fd;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="assets\log-in.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="paciente/cita.php" method="POST">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Medical System </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesion</h5>

                                        <div class="form-outline mb-4">
                                            <h6 class="fw-normal">Tipo de usuario</h6>
                                            <select id="dropdown" name="role" class="form-select" name="rol" required>
                                                <option class="dropdowm-item" disabled selected value>Tipo de usuario
                                                </option>
                                                <option class="dropdowm-item" value="asesor">Asesor</option>
                                                <option class="dropdowm-item" value="paciente">Afiliado</option>
                                                <option class="dropdowm-item" value="medico">Médico</option>
                                            </select>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Correo electrónico</label>
                                            <input type="email" id="email" class="form-control form-control-lg" name="email"/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                        </div>

                                        <?php
                                            if(isset($errorLogin)){
                                                echo $errorLogin;
                                            }
                                        ?>

                                        <div class="pt-1 mb-4 ">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Acceder</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

</html>