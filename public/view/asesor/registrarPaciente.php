<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/admin.css?1.2" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pacientes</title>

</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-3 pt-3 pb-4">
                <h1 class="fs-4">
                    <span class="bg-white text-dark rounded shadow px-2 md-2">MS</span>
                    <span class="text-white">Medical System</span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fa-solid fa-bars"></i></button>
            </div>
            <ul class="list-unstyled px-2 text-white">
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="admin.php"><i
                            class="fa-solid fa-house px-3 py-2"></i>Inicio</a></li>
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="#"><i
                            class="fa-solid fa-envelope px-3 py-2"></i>Citas</a></li>
                <li class="active"><a class="px-1 text-decoration-none d-block nav-link" href="paciente.php"><i
                            class="fa-solid fa-user px-3 py-2"></i>Pacientes</a></li>
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href=""><i
                            class="fa-solid fa-user-doctor px-3 py-2"></i>Médicos</a></li>
            </ul>
        </div>
        <div class="content">
            <h1 class="page-header">
                <?php echo $paciente->id_paciente!=null ? $paciente->nombre: 'Nuevo Registro'; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?c=paciente">Paciente/ </a></li>
                <li class="active"><?php echo $paciente->id_paciente!=null ? $paciente->nombre: 'Nuevo Registro'; ?></li>
            </ol>
            <div class="container-fluid col-6 mt-4 pt-2">
            <form action="?c=paciente&a=Guardar" method="POST" enctype="multipart/form-data" id="frm-alumno">
                <input type="hidden" name="id_paciente" value="<?php echo $paciente->id_paciente; ?>"/>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $paciente->nombre; ?>" placeholder="Nombre-Apellidos"/>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="email" value="<?php echo $paciente->email; ?>" placeholder="name@example.com"/>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="contraseña" value="<?php echo $paciente->password; ?>"/>
                </div>
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="number" class="form-control" id="cedula" name="cedula" value="<?php echo $paciente->cedula; ?>" max="10000000000"/>
                </div>
                <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="genero" required>
                    <option disabled selected >Seleccionar</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Número telefónico</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $paciente->telefono; ?>" max="10000000000"/>
                </div>
                <button type="submit"  class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    
    <!--Fonts-Awesome-->
    <script src="https://kit.fontawesome.com/f6c4a53415.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    $(".sidebar ul li").on('click', function() {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    })
    </script>

    <script>
        $(document).ready(function(){
            $("#frm-alumno").submit(function(){
                return $(this).validate();
            });
        })
    </script>

</body>

</html>