<!doctype php>
<php lang="en">
<?php
include 'db/database.php';
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/lia.css">

    <title>UKS - Universitas Keakehan Sambat</title>

</head>

<body class="bgtotal">
    <div class="navbar-light bgnav">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/logo2.png" alt="" style="max-width:50%; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <img src="assets/img/logo1.jpg" alt="" style="max-width:52%; object-fit: cover; margin-left: -50%;">
                        </div>
                    </div>
                </div> 
                 <?php if (isset($_SESSION["id"])){
                   $id = $_SESSION['id'];
                   $sql = "select * from user INNER JOIN detail_user ON user.id = detail_user.id_user where user.id='$id'";
                   $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                       $user = $row["nama_siswa"];
                   ?>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md">
                            <ul class="navbar-nav atas">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-question-circle"></i> Butuh
                                        Bantuan?</a>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link" href="#"><i class="fas fa-phone-alt"></i> 021-786-445-90</div>
                                </li>
                                <li class="nav-item ">
                                <a class="nav-link" href="login.php"><i class="fas fa-address-card"></i> <?php echo $user; ?>
                                        </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <ul class="navbar-nav atas">
                                <li class="nav-item">
                                    <div class="nav-link"><i class="fas fa-envelope"></i>
                                        paudmelatiharapan@gmail.com</div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><i class="fas fa-address-card"></i> Logout
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <?php  }else{?>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md">
                            <ul class="navbar-nav atas">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-question-circle"></i> Butuh
                                        Bantuan?</a>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link" href="#"><i class="fas fa-phone-alt"></i> 021-786-445-90</div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"><i class="fas fa-address-card"></i> Login
                                        Siswa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <ul class="navbar-nav atas">
                                <li class="nav-item">
                                    <div class="nav-link"><i class="fas fa-envelope"></i>
                                        paudmelatiharapan@gmail.com</div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pendaftaran.php"><i class="fas fa-user-plus"></i>
                                        Pendaftaran Siswa
                                        Baru</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               <?php  }?>
            </div>
        </div>
        <hr style="margin-bottom:-3px;">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profil</a>
                        </li>
                        <?php if (isset($_SESSION["id"])){?>

                            <li class="nav-item">
                                <a class="nav-link" href="datasiswa.php">Data Siswa</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="nilaisiswa.php">Nilai Siswa</a>
                            </li> -->
                        <?php  }?>
                        <li class="nav-item">
                            <a class="nav-link" href="datajadwal.php">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-twitter fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
        
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card border-3 border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah</h5><br>
                        <?php $sql = "select * from page where nama_page='sejarah'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc(); ?>
                        <p class="card-text"> <?php echo $row["deskripsi"]; ?> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Visi & Misi</h5><br>
                        <p class="card-text"> Visi :<br>
                        <?php $sql = "select * from page where nama_page='visi'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc(); ?>
                        <p class="card-text"> <?php echo $row["deskripsi"]; ?> </p><br><br>


                            Misi :<br><?php $sql = "select * from page where nama_page='misi'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc(); ?>
                        <p class="card-text"> <?php echo $row["deskripsi"]; ?> </p><br>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
</body>

</php>