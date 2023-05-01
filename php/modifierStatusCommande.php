<?php
require_once('../server/connection.php');
$cnx = new connexion;
$pdo = $cnx->cnxDB();

$id = $_GET['id'];
$sql = "SELECT status FROM commande WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produit</title>

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
                <a class="nav-link" href="listCommandeAdmin.php">
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
                            <a href='#' class='btn btn-danger'>Déconnecter</a>
                        </li>



                    </ul>

                </nav>
                <!-- End of Topbar -->

            </div>
            <!-- End of Main Content -->

            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Modifier Produit</h1>

                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->


                            <div class="row">

                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Modifier Status commande!</h1>
                                        </div>
                                        <form class="produit" method="post" action="updateCommande.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                                            <div class="form-group row">
                                               

                                                <div class="col-sm-6">
                                                    <select class="form-control form-control-user" name="status" id="type">
                                                        <option value="" disabled selected>Sélectioner un type</option>
                                                        <option value="Confirmé" <?php echo $row['status'] === 'Confirmé' ? 'selected' : '' ?> >Confirmé</option>
                                                        <option value="Préparation" <?php echo $row['status'] === 'Préparation' ? 'selected' : '' ?>>Préparation</option>
                                                        <option value="Livraison" <?php echo $row['status'] === 'Livraison' ? 'selected' : '' ?>>Livraison</option>
                                                        <option value="Livré" <?php echo $row['status'] === 'Livré' ? 'selected' : '' ?>>Livré</option>
                                                       
                                                    </select>
                                                </div>

                                            </div>


                                            <input type="Submit" name="submit" class="btn btn-success btn-user btn-block">

                                            </a>
                                            <hr>

                                        </form>
                                        <hr>
                                        
                                    </div>
                                </div>
                            </div>
                            


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