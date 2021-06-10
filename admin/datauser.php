<!doctype php>
<php lang="en">
<?php
include '../db/database.php';
session_start();
    if(!isset($_SESSION['id'])){
        header("location:../datauser.php");
    }   
    // delete
    if (!empty($_POST['delete']) ) {
        $id_user = $_POST['delete'];
        $sql = "DELETE FROM user WHERE id='$id_user'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> localStorage.setItem('success', true); location.href='datauser.php';</script>";
            // header("location:datauser.php");
        
        } else {
            echo "<script>alert('Tidak Berhasil Diupdate');</script>";
            header("location:datauser.php");
        }

        $conn->close();
    }
    // update
    if (!empty($_POST['id']) ) {
        $id = $_POST['id'];
        $id_user = $_POST['id_user'];
        $sql = "select * from user INNER JOIN detail_user ON user.id = detail_user.id_user where detail_user.id='$id_user'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if (isset($row)) {
            $date = date("Y-m-d"); 

            $user =$_POST["username"];
            $pass =md5($_POST["password"]);
            $decode_pass =$_POST["password"];

            $sql_user = "UPDATE user SET username = '$user', password = '$pass', decode_password = '$decode_pass' where id='$id_user'";
            if ($conn->query($sql_user) === TRUE) {

            }
            
            $nama =$_POST["nama_anak"];
            $nama_ortu =$_POST["nama_ortu"];
            $jkelamin =$_POST["jklamin"];
            $tempatlahir =$_POST["tempatlahir"];
            $tgllahir =$_POST["tgllahir"];
            $alamat =$_POST["alamat"];
            $email =$_POST["email"];
            $notlpn =$_POST["notlpn"];
            $umur =$_POST["umur"];

            $sql_detail = "UPDATE detail_user SET  nama_siswa = '$nama', nama_ortu = '$nama_ortu', alamat = '$alamat', no_telp = '$notlpn', umur = '$umur', tempat_lahir = '$tempatlahir', tgl_lahir ='$tgllahir', jenis_kelamin ='$jkelamin', email = '$email', date = '$date' where id='$id'";

                if ($conn->query($sql_detail) === TRUE) {
                    echo "<script> localStorage.setItem('success', true); location.href='datauser.php';</script>";
                    // header("location:datauser.php");
                
                } else {
                    echo "<script>alert('Tidak Berhasil Diupdate');</script>";
                    header("location:datauser.php");
                }

                $conn->close();
                // header("location:datauser.php");
        }
    }
    // add
    if (empty($_POST['id'])){
        
        if (isset($_POST["jklamin"])) {
            
            $date = date("Y-m-d"); 

            $user =$_POST["username"];
            $pass =md5($_POST["password"]);
            $decode_pass =$_POST["password"];

            $sql_user = "INSERT INTO user (username, password, decode_password, date, id_role)
            VALUES ('$user', '$pass', '$decode_pass','$date', '2')";
    
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
                echo "<script> localStorage.setItem('success', true); location.href='datauser.php';</script>";
                
            
                } else {
                echo "<script>alert('Tidak Berhasil Ditambah');</script>";
                header("location:datauser.php");
                }

                $conn->close();
                }
            }
    }
    
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/all.min.css" />

    <link rel="stylesheet" href="../assets/css/lia.css">
    
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">

    <title>UKS - Universitas Keakehan Sambat</title>
</head>

<body class="bgtotal">
    <div class="navbar-light bgnav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../assets/img/logo2.png" alt="" style="max-width:50%; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <img src="../assets/img/logo1.jpg" alt="" style="max-width:52%; object-fit: cover; margin-left: -50%;">
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
                                <a class="nav-link" ><i class="fas fa-address-card"></i> <?php echo $user; ?>
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
                                    <a class="nav-link" href="../logout.php"><i class="fas fa-address-card"></i> Logout
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profil</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="datasiswa.php">Data Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="nilaisiswa.php">Nilai Siswa</a>
                        </li>
                        
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                        </li> -->
                        <?php if (isset($_SESSION["id"])){?>
                        <!-- admin -->
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Setting
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="datauser.php">Data User</a>
                                <a class="dropdown-item" href="datapelajaran.php">Data pelajaran</a>
                                <a class="dropdown-item" href="dataguru.php">Data Guru</a>
                                <a class="dropdown-item" href="datakelas.php">Data kelas</a>
                                <a class="dropdown-item" href="jadwal.php">Jadwal</a>
                                <a class="dropdown-item" href="datahalaman.php">Data Halaman</a>
                                <a class="dropdown-item" href="periode.php">Periode</a>
                            </div>
                        </li>
                       
                         <!-- admin -->
                        <?php  }?>
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
    <div class="notif ">

    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-3 border-dark">
                    <div class="card-body">
                        <div class="card-title text-center">Data User</div>
                        <form class="mt-5" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Nama Anak</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="id" name="id" hidden>
                                            <input type="text" class="form-control" id="id_user" name="id_user" hidden>
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
                                            <button type="submit" class="btn btn-outline-dark btn-lg">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="row ml-4">
                                        <div class="col-md">
                                            <a href="" class="btn btn-outline-dark btn-lg">Batal</a>
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
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-3 border-dark">
                    <div class="card-body">
                        <div class="card-title text-center">Data Siswa</div>
                        <div class="table-responsive"> 
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Orang Tua</th>
                            <th>alamat</th>
                            <th>No Telpon</th>
                            <th>Umur</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Date</th>
                            <th class="text-center" colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $sql = "select * from user INNER JOIN detail_user ON user.id = detail_user.id_user where user.id !='$id'";
                            $result = $conn->query($sql);
                            $no = 1;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                     
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["nama_siswa"]; ?></td>
                            <td><?php echo $row["nama_ortu"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><?php echo $row["no_telp"]; ?></td>
                            <td><?php echo $row["umur"]; ?></td>
                            <td><?php echo $row["tempat_lahir"]; ?></td>
                            <td><?php echo $row["tgl_lahir"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["jenis_kelamin"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["decode_password"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><button type="submit" class=" ubahdata btn btn-outline-dark btn-lg" value="<?php echo $row['nama_siswa'].'|'.$row['nama_ortu'].'|'.$row['alamat'].'|'.$row['no_telp'].'|'.$row['umur'].'|'.$row['tempat_lahir'].'|'.$row['tgl_lahir'].'|'.$row['email'].'|'.$row['jenis_kelamin'].'|'.$row['username'].'|'.$row['id'].'|'.$row['id_user'].'|'.$row['decode_password'];?>" >Ubah</button></td>
                            <form class="mt-5" method="post">
                            <input type="text" name="delete" value="<?php echo $row['id_user'];?>" hidden>
                            <td><button type="submit" class="btn btn-outline-warning btn-lg" >Hapus</button></td>
                            </form>
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

    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/scroll.js"></script>
    <script src="../assets/js/jquery.easing.1.3.js"></script>
    <script>
    $(document).ready(function() {

        var data = localStorage.getItem("success");
        if (data == 'true') {
            // $('.notif').show();
            $(".notif").html('<div class="alert alert-warning alert-dismissible" role="alert" hide><strong>Success</strong> Berhasil Disimpan <button type="button" class="close" id="btnnotif" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else{
            $('.notif').remove();
        }
        
        $("#btnnotif").click(function(){
            localStorage.clear();
        });
   
    $(".ubahdata").on( "click", function() {
      var data = $(this).attr('value');
      data = data.split('|');
       console.log(data);
  
    $("#nama_anak").val(data[0]);
    $("#nama_ortu").val(data[1]);
    $("#alamat").val(data[2]);
    $("#notlpn").val(data[3]);
    $("#umur").val(data[4]);
    $("#tempatlahir").val(data[5]);
    $("#tgllahir").val(data[6]);
    $("#email").val(data[7]);
    if (data[8] == 'laki-laki') {
        $("#inlineRadio1").attr('checked', true);
    }else{
        $("#inlineRadio2").attr('checked', true);
    }
    
    $("#username").val(data[9]);
    $("#id").val(data[10]);
    $("#id_user").val(data[11]);
    $("#password").val(data[12]);
    
    });

    });</script>
</body>

</php>
