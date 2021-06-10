<!doctype php>
<php lang="en">
<?php
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
                                    <a class="nav-link" href="login.php"><i class="fas fa-address-card"></i> Login Siswa
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
                                    <a class="nav-link" href="pendaftaran.php"><i class="fas fa-user-plus"></i>
                                        Pendaftaran Mahasiswa
                                        Baru</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-3 border-dark" style="max-width:500px;margin:0 auto;">
                    <div class="card-body">
                        <div class="card-title text-center text-white"><b>LOGIN SISWA</b></div>
                        <form class="mt-5" method="post">
                            <div class="form-group">
                                <input type="user" class="form-control text-center" name="user" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control text-center" name="password" id="exampleInputPassword1"
                                    placeholder="kata sandi">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">ingat saya</label>
                                <a href="" style="float:right;"><span style="color:black;">Lupa kata
                                sandi?</span></a>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
  include 'db/database.php';
    if (isset($_POST["user"]) && isset($_POST["password"])) {
        $user =$_POST["user"];
        $pass =md5($_POST["password"]);
        // echo $user.$pass;
        $hasil = $conn -> query("select * from user where username='$user' and password='$pass'");
        $baris = $hasil -> fetch_array(MYSQLI_BOTH);
        // var_dump($baris);
       
        $_SESSION["id"] = $baris[0];
        $_SESSION["id_role"] = $baris[5];

        if ($baris[5] == 1) {
            echo '<script>'.
            ' window.location.href="admin/index.php";'.
            '</script>';
        }else{
            echo '<script>'.
            ' window.location.href="index.php";'.
            '</script>';
        }
    }
    // echo $user.$pass;
    ?>

    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
</body>

</php>