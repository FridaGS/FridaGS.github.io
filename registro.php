<?php

require 'conexion.php';
require 'funcs.php';


$errors = array();

if (!empty($_POST)){
    $nombre = $mysqli->real_escape_string($_POST['Nombre']);
    $mail = $mysqli->real_escape_string($_POST['Correo']);
    $telefono = $mysqli->real_escape_string($_POST['Telefono']);
    $boleta = $mysqli->real_escape_string($_POST['boleta']);
    $password = $mysqli->real_escape_string($_POST['Contraseña']);

    if(count($errors == 0)){
        $validar = "SELECT * FROM usuario WHERE email = '$mail' || boleta = '$boleta'";
        $validando = $mysqli->query($validar);
        if($validando->num_rows > 0){
            echo '<script language="javascript">alert("La boleta y/o email ya están registrados");window.location.href="registro.php"</script>';        
        } else {
            $pass_hash = sha1($password);
            $registro = registraAlumno($nombre, $mail, $telefono, $boleta, $pass_hash);
            if($registro > 0){
                header("Location: login.php");
            } else {
                $errors[] = "Error al Registrar";
            }
        
    }

    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro - Alumno</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                    <img src="img/logoescom.png" width="500" height="500">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <br>
                                <h1 class="h4 text-gray-900 mb-4">Crea tu cuenta!</h1>
                            </div> 
                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Nombre"
                                            name="Nombre" placeholder="Nombre Completo"required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="boleta"
                                            name="boleta" placeholder="Boleta"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="Correo"
                                        name="Correo" placeholder="Correo Electronico"required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="Telefono" name="Telefono" placeholder="Telefono"required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="Contraseña" name="Contraseña" placeholder="Contraseña"required>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button></div>
                            </form>
                            <?php echo resultBlock($errors); ?>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login2.php">Tienes una cuenta? Ingresa!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>