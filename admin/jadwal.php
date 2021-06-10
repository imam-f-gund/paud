<!doctype php>
<php lang="en">
<?php
include '../db/database.php';
session_start();
if(!isset($_SESSION['id'])){
    header("location:../index.php");
}
// delete
if (!empty($_POST['delete']) ) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM jadwal WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script> localStorage.setItem('success', true); location.href='jadwal.php';</script>";
        // header("location:datauser.php");
    
    } else {
        echo "<script>alert('Tidak Berhasil Diupdate');</script>";
        header("location:jadwal.php");
    }

    $conn->close();
}
// add
if (empty($_POST['id'])){
  
    if (isset($_POST["hari"])) {
        $date = date("Y-m-d"); 

        $hari =$_POST["hari"];
        $pelajaran =$_POST["pelajaran"];
        $jam =$_POST["jam"];

        $sql = "INSERT INTO jadwal (hari, jam, id_pelajaran, date)
        VALUES ('$hari', '$jam','$pelajaran', '$date')";

        if ($conn->query($sql) === TRUE) {
           
            echo "<script> localStorage.setItem('success', true); location.href='jadwal.php';</script>";
            
        
        } else {
            echo "<script>alert('Tidak Berhasil Ditambah');</script>";
            header("location:jadwal.php");
        }
            $conn->close();     
    }
}

// update
if (!empty($_POST['id']) ) {
    $id = $_POST['id'];
    $sql = "select * from jadwal where id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if (isset($row)) {
        $date = date("Y-m-d"); 

        $hari =$_POST["hari"];
        $pelajaran =$_POST["pelajaran"];
        $jam =$_POST["jam"];

        $sql_jadwal = "UPDATE jadwal SET hari = '$hari', jam = '$jam', id_pelajaran = '$pelajaran' where id='$id'";
        if ($conn->query($sql_jadwal) === TRUE) {

                echo "<script> localStorage.setItem('success', true); location.href='jadwal.php';</script>";
                // header("location:datauser.php");
            
            } else {
                echo "<script>alert('Tidak Berhasil Diupdate');</script>";
                header("location:jadwal.php");
            }

            $conn->close();
            // header("location:datauser.php");
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/all.min.css" />

    <link rel="stylesheet" href="../assets/css/lia.css">

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
                        <div class="card-title text-center">Data Jadwal</div>
                        <form class="mt-5" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="studi" class="col-sm-5 col-form-label">Nama Hari</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="id" name="id" hidden>
                                            <input type="text" class="form-control" id="hari" name="hari">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="studi" class="col-sm-5 col-form-label">Jam</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="jam" name="jam">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Pilih Pelajaran</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" id="pelajaran" name="pelajaran">
                                        <option>-- pilih pelajaran --</option>
                                        <?php
                                            $sql = "select * from pelajaran";
                                            $result = $conn->query($sql);
                                           
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["nama_pelajaran"]; ?></option>
                                        <?php
                                                }
                                            }
                                        
                                        ?>
                                       </select>
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
                        <div class="card-title text-center">Data Jadwal</div>
                        <div class="table-responsive"> 
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Pelajaran</th>
                            <th>Date</th>
                            <th class="text-center" colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $sql = "select jadwal.hari, jadwal.id, jadwal.jam, jadwal.id_pelajaran, jadwal.date, pelajaran.nama_pelajaran from jadwal INNER JOIN pelajaran on jadwal.id_pelajaran =  pelajaran.id";
                            $result = $conn->query($sql);
                            $no = 1;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                     
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["hari"]; ?></td>
                            <td><?php echo $row["jam"]; ?></td>
                            <td><?php echo $row["nama_pelajaran"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><button type="submit" class=" ubahdata btn btn-outline-dark btn-lg" value="<?php echo $row['hari'].'|'.$row['jam'].'|'.$row['id_pelajaran'].'|'.$row['id'];?>" >Ubah</button></td>
                            <form class="mt-5" method="post">
                            <input type="text" name="delete" value="<?php echo $row['id'];?>" hidden>
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
  
        $("#hari").val(data[0]);
        $("#jam").val(data[1]);
         $("#pelajaran").val(data[2]);
        $("#id").val(data[3]);
    
        });

    });
    </script>
</body>

</php>
