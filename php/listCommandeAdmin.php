<?php
require_once('commande.php');
$com = new commande();
$res = $com->listCommandeAdmin();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Commande</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KMOON ADMIN <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="listProduitAdmin.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Produit</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Commande</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Users</span></a>
            </li>

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
                    
                   <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                     
                     
                        <li>
                            <a href='../logout.php' class='btn btn-danger'>Déconnecter</a>
                        </li>



                    </ul>

                </nav>
                <!-- End of Topbar -->

            </div>
            <!-- End of Main Content -->

            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Commande</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Commande disponible</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th> 
                                        <th>Nom et Prénom</th>
                                        <th>adresse</th>
                                        <th>Prix_totale</th>
                                        <th>date</th>
                                        <th>region</th>
                                        <th>email</th>
                                        <th>num_tel</th>
                                        <th>remarque</th>
                                        <th>status</th>
                                        
                                        <th>Modifier status</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    foreach ($res as $row) {
                                        $prix = (int)$row[3] * (int)$row[12];
                                        echo "<tr><td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
                                        echo "<td>$row[4] $row[5]</td>";
                                        echo "<td>$row[9]</td>";
                                        echo "<td>$prix DT</td>";
                                        echo "<td>$row[6]</td>";
                                        echo "<td>$row[8]</td>";
                                        echo "<td>$row[10]</td>";
                                        echo "<td>$row[11]</td>";
                                        echo "<td>$row[14]</td>";
                                        if($row[13] == 'Confirmé'){
                                        echo "<td style='color:cyan;'><strong>$row[13]</strong></td>";
                                        }else if($row[13] == 'Préparation'){
                                            echo "<td style='color:orange;'><strong>$row[13]</strong></td>";
                                        }else if($row[13] == 'Livraison'){
                                            echo "<td style='color:red;'><strong>$row[13]</strong></td>";
                                        }else if($row[13] == 'Livré'){
                                            echo "<td style='color:green;'><strong>$row[13]</strong></td>";
                                        }
                                        
                                        echo "<td><a href ='modifierStatusCommande.php?id={$row[0]}' class='btn btn-primary'>Modifier</td>";
                                        echo "<td><a href ='#' class='btn btn-danger'>Supprimer</td></tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>













            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; KMOON 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</body>

</html>