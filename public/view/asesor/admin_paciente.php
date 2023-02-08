<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/admin.css?1.2" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
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
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars"></i></button>
            </div>
            <ul class="list-unstyled px-2 text-white">
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="admin.php"><i class="fa-solid fa-house px-3 py-2"></i>Inicio</a></li>
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="#"><i class="fa-solid fa-envelope px-3 py-2"></i>Citas</a></li>
                <li class="active"><a class="px-1 text-decoration-none d-block nav-link" href=""><i class="fa-solid fa-user px-3 py-2"></i>Pacientes</a></li>
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="admin_medico.php"><i class="fa-solid fa-user-doctor px-3 py-2"></i>Médicos</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="mt-4 pt-2 registrar">
                    <a class="btn btn-primary" href="?c=paciente&a=Crud">Nuevo paciente</a>
                </div>
                </div>
                <div class="table mt-2 pt-2">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Género</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($this->model->Listar() as $r): ?>
                        <tr>
                        <td><?php echo $r->nombre; ?></td>
                        <td class="passhidden"><?php echo $r->password; ?></td>
                        <td><?php echo $r->email; ?></td>
                        <td><?php echo $r->cedula; ?></td>
                        <td><?php echo $r->genero; ?></td>
                        <td><?php echo $r->telefono; ?></td>
                            <td>
                                <a href="?c=paciente&a=Crud&id_paciente=<?php echo $r->id_paciente; ?>" class="btn btn-small btn-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=paciente&a=Eliminar&id_paciente=<?php echo $r->id_paciente; ?>" class="btn btn-small btn-dark"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--Fonts-Awesome-->
    <script src="https://kit.fontawesome.com/f6c4a53415.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--<script src='.\..\assets\js\datatable.js'></script>-->
    <script>
    $(".sidebar ul li").on('click', function() {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    })
    </script>

</body>

</html>