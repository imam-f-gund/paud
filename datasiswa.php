<!doctype php>
<php lang="en">
<?php
include 'db/database.php';
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/lia.css">

    <title>Paud - Melati Harapan</title>
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

    
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-3 border-dark">
                    <div class="card-body">
                        <div class="card-title text-center"><strong>Data Siswa</strong></div>
                        <div class="table-responsive"> 
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $sql = "select siswa.id, siswa.id_kelas, siswa.id_detail_user, siswa.date, kelas.nama_kelas, detail_user.nama_siswa, detail_user.alamat, detail_user.umur  from ((siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) where detail_user.id_user = '$id'";
                            $result = $conn->query($sql);
                            $no = 1;
                           
                            if ($result->num_rows > 0) {

                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    // var_dump($row);
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["nama_siswa"]; ?></td>
                            <td><?php echo $row["umur"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><?php echo $row["nama_kelas"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            
                        </tr>
                                
                               
                        <?php
                                }
                            }
                          
                        ?>
                           
                           </tbody>
                        </table>
                        </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-3 border-dark">
                    <div class="card-body">
                            <div class="card-title text-center"><strong>Data Siswa</strong></div>
                                <td>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="periode" >
                                        <option >peiode ajaran</option>
                                        <?php
                                            $sql = "select * from periode";
                                            $result = $conn->query($sql);
                                           
                                            if ($result->num_rows > 0) {
                                                
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["periode"]; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                       </select>
                                            
                                        <button id='print'onclick=printIt() class="btn btn-secondary" >Print</button>
                                        
                                    </div>
                               
                            <div class="table-responsive"> 
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                            <th>Pelajaran</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                            $sql = "select nilai.id, nilai.nilai, nilai.date, nilai.id_siswa, nilai.id_pelajaran, detail_user.nama_siswa, detail_user.alamat, detail_user.umur, pelajaran.nama_pelajaran, kelas.nama_kelas from ((((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id) INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) INNER JOIN kelas ON siswa.id_kelas = kelas.id) where detail_user.id_user = '$id'";
                            $result = $conn->query($sql);
                            $no = 1;
                           
                            if ($result->num_rows > 0) {

                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    // var_dump($row);
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["nama_siswa"]; ?></td>
                            <td><?php echo $row["nilai"]; ?></td>
                            <td><?php echo $row["nama_pelajaran"]; ?></td>
                            <td><?php echo $row["nama_kelas"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                        </tr>
                               
                        <?php
                                }
                            }
                          
                        ?>
                           </tbody>
                        </table>
                        </div>
                           
                        </div>
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
    <script>
   
    //  localStorage.setItem("periode", 1);
        function printIt() {
            var periode = $("#periode").val();
          
            // periode
          
            var wnd = window.open('./printnilai.php?periode='+periode);
            wnd.print();
            
        }
       
    </script>
    
</body>

</php>
