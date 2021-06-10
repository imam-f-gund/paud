<!doctype php>
<php lang="en">
<?php
include 'db/database.php';
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    
}
$id = $_SESSION['id'];
$id_role = $_SESSION['id_role'];


$periode = $_GET['periode'];  //Output: myquery
// echo $_GET['periode']; 
// echo $_GET['siswa'];    
if (isset( $_GET['siswa'])) {
    
    $siswa = $_GET['siswa'];  //Output: myquery
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/lia.css">

    <!-- <title>UKS - Universitas Keakehan Sambat</title> -->

</head>

<body>
<?php if ($id_role == 1) {?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card ">
                <div class="card-body">
                        <div class="card-title text-center"><strong>Nilai Siswa</strong></div>
                        <div class="table-responsive"> 
                        <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Orang Tua</th>
                            <th>Alamat</th>
                            <th>Nilai</th>
                            <th>Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        if (empty($siswa)) {
                            $sql = "select guru.nama_guru, nilai.id, nilai.nilai, nilai.date, nilai.id_siswa, nilai.id_pelajaran, detail_user.nama_siswa, detail_user.alamat,detail_user.nama_ortu, detail_user.umur, kelas.nama_kelas, pelajaran.nama_pelajaran, kelas.nama_kelas from (((((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id) INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) INNER JOIN kelas ON siswa.id_kelas = kelas.id) INNER JOIN guru ON pelajaran.id_guru = guru.id ) where pelajaran.id_periode = '$periode'";
                               
                        }else{
                            $sql = "select guru.nama_guru, nilai.id, nilai.nilai, nilai.date, nilai.id_siswa, nilai.id_pelajaran, detail_user.nama_siswa, detail_user.alamat,detail_user.nama_ortu, detail_user.umur, kelas.nama_kelas, pelajaran.nama_pelajaran, kelas.nama_kelas from (((((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id) INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) INNER JOIN kelas ON siswa.id_kelas = kelas.id) INNER JOIN guru ON pelajaran.id_guru = guru.id ) where pelajaran.id_periode = '$periode' and  detail_user.nama_siswa = '$siswa'";
                        }
                        
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
                            <td><?php echo $row["nama_ortu"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><?php echo $row["nilai"]; ?></td>
                            <td><?php echo $row["nama_pelajaran"]; ?></td>
                            <td><?php echo $row["nama_guru"]; ?></td>
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
                    </div    
                </div>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card ">
                <div class="card-body">
                        <div class="card-title text-center"><strong>Nilai Siswa</strong></div>
                        <?php
                            $sql = "select nilai.id, nilai.nilai, nilai.date, nilai.id_siswa, nilai.id_pelajaran, detail_user.nama_siswa, detail_user.alamat, detail_user.nama_ortu, detail_user.umur, pelajaran.nama_pelajaran, kelas.nama_kelas ,guru.nama_guru from (((((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id) INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) INNER JOIN kelas ON siswa.id_kelas = kelas.id)INNER JOIN guru ON kelas.id_guru = guru.id) where detail_user.id_user = '$id'";
                            $result = $conn->query($sql);
                            $no = 1;
                           
                            if ($result->num_rows > 0) {

                                // output data of each row
                                $row = $result->fetch_assoc();
                               
                        ?>
                        <div class="form-group">
                        <label for=""><strong>Nama Siswa : </strong><?php echo $row["nama_siswa"]; ?> </label><br>
                        <label for=""><strong>Nama Kelas : </strong><?php echo $row["nama_kelas"]; ?> </label><br>
                        <label for=""><strong>Nama Wali Kelas : </strong><?php echo $row["nama_guru"]; ?> </label><br>
                        <label for=""><strong>Nama Orang Tua : </strong><?php echo $row["nama_ortu"]; ?> </label><br>
                        <label for=""><strong>Alamat : </strong><?php echo $row["alamat"]; ?> </label>
                        <p></p>
                        </div>
                        <?php
                                
                            }
                          
                        ?>
                        <div class="table-responsive"> 
                        <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nilai</th>
                            <th>Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                            $total = array();

                            $sql = "select guru.nama_guru, nilai.id, nilai.nilai, nilai.date, nilai.id_siswa, nilai.id_pelajaran, detail_user.nama_siswa, detail_user.alamat, detail_user.umur, pelajaran.nama_pelajaran, kelas.nama_kelas from (((((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id) INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id) INNER JOIN detail_user ON siswa.id_detail_user = detail_user.id) INNER JOIN kelas ON siswa.id_kelas = kelas.id) INNER JOIN guru ON pelajaran.id_guru = guru.id ) where detail_user.id_user = '$id' AND pelajaran.id_periode = '$periode'";
                            $result = $conn->query($sql);
                            $no = 1;
                           
                            if ($result->num_rows > 0) {

                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                                                
                                    array_push($total,$row["nilai"]);
                        
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["nilai"]; ?></td>
                            <td><?php echo $row["nama_pelajaran"]; ?></td>
                            <td><?php echo $row["nama_guru"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                        </tr>
                               
                        <?php
                        
                                }
                            }
                           
                        ?>
                        <td><strong> Nilai Rata - Rata :</strong></td>
                        <?php if(!empty($total)){?>
                        <td><strong><?php echo substr(array_sum($total)/count($total),0,4); ?></strong></td>
                        <?php } ?>
                           </tbody>
                        </table>
                        </div>
                           
                        </div>
                    </div    
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
</body>

</php>