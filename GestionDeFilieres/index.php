<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if ($_SESSION["employe"]) {
    ?>
    <!DOCTYPE html>
    <html lang="FR">

        <head>
            <meta charset="UTF-8">
            <title>Gestion filiere/classe</title>


            <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
            <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
            <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
            <link rel="stylesheet" href="style/style.css">
            <link rel="stylesheet" href="style/theme.css">
            <link rel="stylesheet" href="style/main.css">

            <script src='vendor/jquery-3.2.1.min.js'></script>
            <script src='vendor/bootstrap-4.1/popper.min.js'></script>
            <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
            <script src="script/chart.js" type="text/javascript"></script>

            <script src="script/jquery.js"></script>
            <script src="vendor/datatable/bootstrap1.js" type="text/javascript"></script>
            <script src="vendor/datatable/bootstrap2.js" type="text/javascript"></script>
            <link rel="stylesheet" href="style/bootstrapcss1.css">
            <link rel="stylesheet" href="style/bootstrapcss2.css">


        </head>
        <body>
            <div  class="page-wrapper chiller-theme toggled">
                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <nav style="background-color:#1B5461; width:250px;" id="sidebar" class="sidebar-wrapper">
                    <div class="sidebar-content">
                        <div class="sidebar-brand">
                            <a href="./" class="h2 pt-2">Gestion de filieres et classes</a> 

                        </div>
                        <div class="sidebar-header">
						<div class="user-pic">
                        <img class="img-responsive img-rounded"
                            src="img/<?php if (isset($_SESSION['photo'])) {
                                        echo $_SESSION['photo'];
                                        } else
                                            echo 'no-photo.png'
                                        ?>"
                            alt="User picture">
						</div>
                            <div class="user-info">
                                <span class="user-name">
                                    <strong><?php
                                        if (isset($_SESSION['nom'])) {
                                            echo $_SESSION['nom'];
                                        }
                                        ?></strong>
                                </span>
                                 <span class="user-role"><?php
                                        if (isset($_SESSION['role'])) {
                                            echo $_SESSION['role'];
                                        }
                                    ?></span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                            </div>
                        </div>
                        <!-- sidebar-header  -->

                        <!-- sidebar-search  -->
                        <div class="sidebar-menu">
                            <ul>
                                <li class="header-menu">
                                    <span>Gestion</span>
                                </li>
                                <li >
                                    <a href="./index.php?p=Filieree"> <i class="zmdi zmdi-hc-1x zmdi-group-work"> </i> Filieres</a>
                                </li>
                                <li>

                                </li>
                                <li>
                                    <a href="./index.php?p=classe"><i class="zmdi zmdi-hc-1x zmdi-accounts"> </i> Classes</a>
                                </li>
                                <li>
                                    </br>
                                </li>
                                <li  class="header-menu">
                                    <span>Recherche</span>
                                </li>
                                <li>
                                    <a href="./index.php?p=historique"> <i class="zmdi zmdi-hc-1x zmdi-check"> </i>Les classes de chaque filiere</a>
                                </li>
                                <li >
                                    <a href="./index.php?p=statistiques"> <i class="zmdi zmdi-hc-1x zmdi-group-work"> </i> Statistique</a>
                                </li>
                            </ul>
                        </div>
                        <!-- sidebar-menu  -->
                    </div>
                    <!-- sidebar-content  -->
                    <div class="sidebar-footer">
                        <a href="./logout.php">
                            <i class="fa fa-power-off"></i>
                            <span>Log out</span>
                        </a>
                    </div>
                </nav>
                <!-- sidebar-wrapper  -->
                <main class="page-content">
                    <div class="container-fluid" id="main-content">

                        <?php
                        if (isset($_GET['p']) && $_GET['p'] != "") {
                            if ($_GET['p'] == "Filieree") {
                                include_once './pages/Filieree.php';
                            } elseif ($_GET['p'] == "classe") {
                                include_once './pages/Classe.php';
                            } elseif ($_GET['p'] == "historique") {
                                include_once './pages/historique.php';
                            } elseif ($_GET['p'] == "statistiques") {
                                include_once './pages/statistiques.php';
                            }
                        } else {
                            include_once './pages/statistiques.php';
                        }
                        ?>
                    </div>

                </main>
                <!-- page-content" -->
            </div>
            <!-- page-wrapper -->
            <script src="script/index.js"></script>

        </body>
    </html>
    <?php
} else {
    header('Location:./login.php');
}
?>