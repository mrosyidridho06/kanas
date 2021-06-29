<?php 
require_once "config.php"; 
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Header-Blue.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Map-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/Pretty-Registration-Form.css">
    <!-- Custom fonts for this template -->
    <link href="<?=base_url()?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>/index.php">
      <div class="sidebar-brand-icon">
        <i><img src="<?=base_url()?>/assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7-removebg-preview.png" style="height: 50px;padding: 0px;"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Kana's Kitchen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>/dashboard.php">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Bahan -->
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>/bahan/bahan.php">
        <i class="fas fa-fw fa-cubes"></i>
        <span>Bahan</span></a>
    </li>

    <!-- Nav Item - Resep -->
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>/resep/resep.php">
        <i class="fas fa-fw fa-cube"></i>
        <span>Resep</span></a>
    </li>
    <?php if ($_SESSION['role'] == 'admin') {?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>HR Management</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gaji</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Pegawai</h6>
                <a class="collapse-item" href="">Hari</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    <?php }else { ?>
      <?php } ?>
    <!-- Nav Item - Pegawai -->
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>/pegawai/pegawai.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Pegawai</span></a>
    </li>

    <!-- Nav Item - Supplier -->
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>/supplier/supplier.php">
        <i class="fas fa-fw fa-id-badge"></i>
        <span>Supplier</span></a>
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
        <form class="form-inline">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </form>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

        
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama']?></span>
              <img class="img-profile rounded-circle" src="<?=base_url()?>/assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7-removebg-preview.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <p class="text-muted text-center">Role: <?=$_SESSION['role']?></p>
              <div class="dropdown-divider"></div>
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
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                <div class="col-xl-6 col-lg-6">
            
            
            <!-- Page Heading -->

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Kana's Kitchen 2021</span>
                </div>
            </div>
        </footer> -->
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a class="btn btn-primary" href="<?=base_url()?>/logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
</body>
<script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>/assets/js/sb-admin-2.min.js"></script>
</html>
<?php }else{
	header("Location: index.php");
} ?>