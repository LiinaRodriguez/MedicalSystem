<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\css\admin.css" rel="stylesheet">
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
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href=""><i
                            class="fa-solid fa-house px-3 py-2"></i>Inicio</a></li>
                <li class=""><a class="px-1 text-decoration-none d-block nav-link" href="reservarCita.php"><i
                            class="fa-solid fa-envelope px-3 py-2"></i>Citas</a></li> 
            </ul>
        </div>
        <div class="content">
            <h1 class="page-header">
                <?php echo $cita->id_cita!=null ? $cita->id_paciente: 'Reserva Cita'; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?c=cita">Cita/ </a></li>
                <li class="active"><?php echo $cita->id_cita!=null ? $cita->id_paciente: 'Nueva Cita'; ?></li>
            </ol>
            <div class="container-fluid col-6 mt-4 pt-2">
            <form action="?c=cita&a=Guardar" method="POST" enctype="multipart/form-data" id="frm-alumno">
                <input type="hidden" name="id_cita" value="<?php echo $cita->id_cita; ?>"/>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $cita->fecha; ?>" />
                </div>
               
                <div class="mb-3"> Seleccione especialidad
                <select class="form-select" aria-label="Default select example" name="id_especialidad" required>
                    <option disabled selected >Seleccionar</option>
                    <option value="">------</option>
                    <?php foreach ($this->model->selectMedico() as $m) :?>
                        <option value="<?php echo $m->id_especialidad; ?>"><?php echo $m->id_especialidad ."" ; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="mb-3"> Seleccione médico
                <select class="form-select" aria-label="Default select example" name="id_medico" required>
                    <option disabled selected >Seleccionar</option>
                    <option value="">------</option>
                    <?php foreach ($this->model->selectMedico() as $m) :?>
                        <option value="<?php echo $m->id_medico; ?>"><?php echo $m->nombre ."" ; ?></option>
                    <?php endforeach; ?>
                </select>
                 </div>
                <div class="mb-3"> Seleccione sede
                <select class="form-select" aria-label="Default select example" name="id_sede" required>
                    <option disabled selected >Seleccionar</option>
                    <option value="">------</option>
                    <?php foreach ($this->model->selectMedico() as $m) :?>
                        <option value="<?php echo $m->id_sede ?>"><?php echo $m->id_sede ."" ; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="mb-3"> Seleccione paciente
                <select class="form-select" aria-label="Default select example" name="id_paciente" required>
                    <option disabled selected >Seleccionar</option>
                    <option value="">------</option>
                    <?php foreach ($this->model->selectPaciente() as $m) :?>
                        <option value="<?php echo $m->id_paciente; ?>"><?php echo $m->id_paciente ."" ; ?></option>
                    <?php endforeach; ?>
                </select>
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