<!doctype php>
<php lang="en">
<?php
     include 'db/database.php';
     
    if (isset($_POST["jklamin"])) {
        
     $date = date("Y-m-d"); 

     $user =$_POST["username"];
     $pass =md5($_POST["password"]);
     $decode_pass =$_POST["password"];

     $sql_user = "INSERT INTO user (username, password, decode_password, date, id_role)
     VALUES ('$user', '$pass', '$decode_pass', '$date', '2')";
 
        if ($conn->query($sql_user) === TRUE) {
            $last_id = $conn->insert_id;
            // echo "New record created successfully. Last inserted ID is: " . $last_id;
                
            $nama =$_POST["nama_anak"];
            $nama_ortu =$_POST["nama_ortu"];
            $jkelamin =$_POST["jklamin"];
            $tempatlahir =$_POST["tempatlahir"];
            $tgllahir =$_POST["tgllahir"];
            $alamat =$_POST["alamat"];
            $email =$_POST["email"];
            $notlpn =$_POST["notlpn"];
            $umur =$_POST["umur"];

            $sql_detail = "INSERT INTO detail_user (nama_siswa, nama_ortu, alamat, no_telp, id_user, umur, tempat_lahir, tgl_lahir, jenis_kelamin, email, date)
            VALUES ('$nama', '$nama_ortu', '$alamat', '$notlpn','$last_id','$umur','$tempatlahir', '$tgllahir', '$jkelamin', '$email','$date')";

            if ($conn->query($sql_detail) === TRUE) {
            echo "<script> localStorage.setItem('success', true); location.href = 'index.php';</script>";
        
            } else {
            echo "<script>alert('Tidak Berhasil Ditambah');</script>";
            }

            $conn->close();
            }
        }
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
                                    <a class="nav-link" href="login.php"><i class="fas fa-address-card"></i> Login
                                        Mahasiswa</a>
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
                <div class="card border-3 border-dark">
                    <div class="card-body">
                        <div class="card-title text-center">PENDAFTARAN MAHASISWA</div>
                        <form class="mt-5" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Nama Anak</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama_anak" name="nama_anak">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Nama Ortu</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="studi" class="col-sm-5 col-form-label">Umur</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="umur" name="umur">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                            <!-- <input type="password" class="form-control" id="inputPassword"> -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jklamin"
                                                    id="inlineRadio1" value="laki-laki">
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jklamin"
                                                    id="inlineRadio2" value="perempuan">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="tgllahir" name="tgllahir">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-7">
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Email</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">No. Telpon</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="notlpn" name="notlpn">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">username</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">password</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 justify-content-center d-flex align-items-center">
                                    <div class="row ">
                                        <div class="col-md">
                                            <button type="submit" class="btn btn-outline-dark btn-lg">Daftar</button>
                                        </div>
                                    </div>
                                    <div class="row ml-4">
                                        <div class="col-md">
                                            <a href="" class="btn btn-outline-dark btn-lg">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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