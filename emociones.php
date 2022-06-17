<?php
    
    require 'conexion.php';
    require 'funcs.php';
    session_start();

    if(!isset($_SESSION['id_usuario'])){
        header("Location: login.php");
    }
    
    $id = $_SESSION['id_usuario'];
    $nombre = $_SESSION['nombre'];

    $errors = array();

if (!empty($_POST)){
    $user = $mysqli->real_escape_string($_POST['user']);
    $namor = $mysqli->real_escape_string($_POST['namor']);
    $nmiedo = $mysqli->real_escape_string($_POST['nmiedo']);
    $nenojo = $mysqli->real_escape_string($_POST['nenojo']);
    $ntristeza = $mysqli->real_escape_string($_POST['ntristeza']);
    $nfelicidad = $mysqli->real_escape_string($_POST['nfelicidad']);
    $nsorpresa = $mysqli->real_escape_string($_POST['nsorpresa']);
    $nrepugnancia = $mysqli->real_escape_string($_POST['nrepugnancia']);
    if(count($errors == 0)){
        $validar = "SELECT * FROM emociones WHERE id_usuario2 = '$user'";
        $validando = $mysqli->query($validar);
        if($validando->num_rows > 0){
            echo '<script language="javascript">alert("Este integrante ya ha sido registrado");window.location.href="ingresarequipo.php"</script>';        
        } else {
        $registro = registraEmociones($user, $namor, $nmiedo, $nenojo, $ntristeza, $nfelicidad, $nsorpresa, $nrepugnancia);
            if($registro > 0){
            header("Location: emociones.php");
            } else {
                header("Location: emociones.php");
            }
        } 
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mis emociones</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Usuario</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Personal
            </div>



            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Hábitos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actividades</h6>
                        <a class="collapse-item" href="social.html">Social</a>
                        <a class="collapse-item" href="utilities-border.html">Aficiones</a>
                        <a class="collapse-item" href="utilities-animation.html">Sueño</a>
                        <a class="collapse-item" href="utilities-other.html">Alimento</a>
                        <a class="collapse-item" href="utilities-other.html">Salud</a>
                        <a class="collapse-item" href="utilities-other.html">Mejor yo</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Otros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Recursos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="login.html">Atención psicológica</a>
                        <a class="collapse-item" href="register.html">Música relajante</a>
                        <a class="collapse-item" href="forgot-password.html">Meditación guiada</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Seguimiento</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Conoce tus emociones:</h1>
                    <p>¡Hola <?php echo $nombre ?>!</p>
                    <p>Bienvenido a la sección de emociones, aquí podrás conocer todas las emociones que puedes experimentar en tu día a día, gracias a la <b>ruleta de las 
                    emociones.</b> Puedes llevar un registro de las emociones que has sentido dependiendo del día de la semana, así podrás <b>reconocer</b> de mejor manera
                    cuales son las emociones que más influyen en tu vida diaria. No temas a <b>experimentar</b> cualquier tipo de emoción que esta dentro de la ruleta (O fuera de ella), 
                    es hora de mejorar nuestra <b>inteligencia emocional</b> y aprender a reconocer nuestros sentimientos.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">¡Ruleta de las emociones!</h6>
                                </div>
                                <div class="card-body text-center">
                                <input type="image" src="img/ruletaem.png" width="500" height="500" style="float:justify">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mis emociones hoy: <h id="current_date"></h></h6>
                                    <script>
                                        date = new Date();
                                        year = date.getFullYear();
                                        month = date.getMonth() + 1;
                                        day = date.getDate();
                                        document.getElementById("current_date").innerHTML = day + "/" + month + "/" + year;
                                    </script>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group row">			
                                            <input type="hidden" class="form-control" name="user" value="<?php echo $id;?>" />
                                        </div>
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Amor
                                            </h6>
                                            <select name="namor" class="custom-select my-1 mr-sm-2" id="namor">
                                            <?php
                                                include ("conexion1.php");
                                                $con = connect(); 
                                                $amor="SELECT * FROM amor";
                                                $love=@mysqli_query($con, $amor);
                                                while($conamor=mysqli_fetch_array($love))  { ?>
                                                <option value="<?php echo $conamor['id_amor']?> ">
                                                <?php echo $conamor['emamor']?></option><?php } ?>  
                                            </select>
                                        </div>
                        
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Miedo
                                            </h6>
                                            <select name="nmiedo" class="custom-select my-1 mr-sm-2" id="nmiedo">
                                            <?php 
                                                $miedo="SELECT * FROM miedo";
                                                $fear=@mysqli_query($con, $miedo);
                                                while($conmiedo=mysqli_fetch_array($fear))  { ?>
                                                <option value="<?php echo $conmiedo['id_miedo']?> ">
                                                <?php echo $conmiedo['emmiedo']?></option><?php } ?>  
                                            </select>
                                        </div>
                        
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Enojo
                                            </h6>
                                            <select name="nenojo" class="custom-select my-1 mr-sm-2" id="nenojo">
                                            <?php 
                                                $enojo="SELECT * FROM enojo";
                                                $angry=@mysqli_query($con, $enojo);
                                                while($nojao=mysqli_fetch_array($angry))  { ?>
                                                <option value="<?php echo $nojao['id_enojo']?> ">
                                                <?php echo $nojao['emenojo']?></option><?php } ?>  
                                            </select>
                                        </div>
                            
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Tristeza
                                            </h6>
                                            <select name="ntristeza" class="custom-select my-1 mr-sm-2" id="ntristeza">
                                            <?php 
                                                $triste="SELECT * FROM tristeza";
                                                $sad=@mysqli_query($con, $triste);
                                                while($troste=mysqli_fetch_array($sad))  { ?>
                                                <option value="<?php echo $troste['id_tristeza']?> ">
                                                <?php echo $troste['emtristeza']?></option><?php } ?>  
                                            </select>
                                        </div>
                        
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Felicidad
                                            </h6>
                                            <select name="nfelicidad" class="custom-select my-1 mr-sm-2" id="nfelicidad">
                                            <?php 
                                                $feliz="SELECT * FROM felicidad";
                                                $happy=@mysqli_query($con, $feliz);
                                                while($lombriz=mysqli_fetch_array($happy))  { ?>
                                                <option value="<?php echo $lombriz['id_felicidad']?> ">
                                                <?php echo $lombriz['emfelicidad']?></option><?php } ?>  
                                            </select>
                                        </div>
                  
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Sorpresa
                                            </h6>
                                            <select name="nsorpresa" class="custom-select my-1 mr-sm-2" id="nsorpresa">
                                            <?php 
                                                $sorpresa="SELECT * FROM sorpresa";
                                                $surprise=@mysqli_query($con, $sorpresa);
                                                while($salv=mysqli_fetch_array($surprise))  { ?>
                                                <option value="<?php echo $salv['id_sorpresa']?> ">
                                                <?php echo $salv['emsorpresa']?></option><?php } ?>  
                                            </select>
                                        </div>
                        
                                        <div class="form-group row">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                                Repugnancia
                                            </h6>
                                            <select name="nrepugnancia" class="custom-select my-1 mr-sm-2" id="nrepugnancia">
                                            <?php 
                                                $wakala="SELECT * FROM repugnancia";
                                                $wtf=@mysqli_query($con, $wakala);
                                                while($pollo=mysqli_fetch_array($wtf))  { ?>
                                                <option value="<?php echo $pollo['id_repugnancia']?> ">
                                                <?php echo $pollo['emrepugnancia']?></option><?php } ?>  
                                            </select>
                                        </div>
                                        <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Registrar Emociones</button>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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