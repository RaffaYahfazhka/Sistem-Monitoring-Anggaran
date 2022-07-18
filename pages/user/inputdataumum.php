<?php
include 'settings.php'; //include settings

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "sistem";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //Cek Koneksi Database Memastikan tersambung apa tidak
    die("Tidak bisa terkoneksi ke database");
}
$tanggal        = "";
$mataanggaran   = "";
$kodeanggaran   = "";
$nilaikegiatan  = "";
$kegiatan       = "";
$saldoawal      = "";
$saldoakhir     = "";
$pic            = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from rekapitulasi where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from rekapitulasi where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $tanggal       = $r1['tanggal'];
    $mataanggaran       = $r1['mataanggaran'];
    $kodeanggaran     = $r1['kodeanggaran'];
    $nilaikegiatan  = $r1['nilaikegiatan'];
    $saldoawal  = $r1['saldoawal'];
    $kegiatan   = $r1['kegiatan'];
    $saldoakhir =$r1['saldoakhir'];
    $pic =$r1['pic'] = "Umum";

    if ($kodeanggaran == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $tanggal            = $_POST['tanggal'];
    $mataanggaran       = $_POST['mataanggaran'];
    $kodeanggaran       = $_POST['kodeanggaran'];
    $nilaikegiatan      = $_POST['nilaikegiatan'];
    $kegiatan           = $_POST['kegiatan'];
    $saldoawal          = $_POST['saldoawal'];
    $saldoakhir         = $_POST['saldoakhir'];
    $pic                = $_POST['pic'] = "Umum";

    if ($tanggal && $mataanggaran && $kodeanggaran && $nilaikegiatan && $kegiatan && $saldoawal && $saldoakhir && $pic) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update rekapitulasi set tanggal = '$tanggal',mataanggaran='$mataanggaran',kodeanggaran = '$kodeanggaran',nilaikegiatan='$nilaikegiatan',kegiatan='$kegiatan',saldoawal='$saldoawal',saldoakhir='$saldoakhir',pic='$pic' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into rekapitulasi(tanggal,mataanggaran,kodeanggaran,nilaikegiatan,kegiatan,saldoawal,saldoakhir,pic) values ('$tanggal','$mataanggaran','$kodeanggaran','$nilaikegiatan','$kegiatan','$saldoawal','$saldoakhir','$pic')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON LOGO -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    
    <!--Title-->
    <title>Input Data</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/inputdata.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/adminlte.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="../../js/jquery.js"></script>
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <br>
    <section class="content">
        <div class="mx-auto">
        <!-- Untuk Memasukkan Data -->
        <div class="card card-primary">
            
            <div class="card-header">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
              </svg><span style="margin-left: 10px; padding-top: 10px; font-size: 15px;">Data Umum</span>
            </div>

            <div class="card-body">
                
            <?php
                if ($error) {
                ?>

                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                    swal({
                      title: "Gagal Input!",
                      text: "Silahkan isi data terlebih dahulu!",
                      icon: "error",
                      button: "Oke",
                    });
                  </script>

                <?php
                }
                ?>

                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:1;url=dataumum.php");
                }
                ?>


                <form action="" method="POST">

                   <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 500;">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                        </div>
                    </div>

                    <br>

                    <div class="mb-3 row">
                        <label for="mataanggaran" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Mata Anggaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mataanggaran" name="mataanggaran" value="<?php echo $mataanggaran ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kodeanggaran" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Kode Anggaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodeanggaran" name="kodeanggaran" value="<?php echo $kodeanggaran ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kegiatan" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="<?php echo $kegiatan ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="saldoawal" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Saldo Awal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="saldoawal" name="saldoawal" value="<?php echo $saldoawal ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nilaikegiatan" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Nilai Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control number" id="nilaikegiatan" name="nilaikegiatan" value="<?php echo $nilaikegiatan?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="saldoakhir" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 400;">Saldo Akhir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="saldoakhir" name="saldoakhir" value="<?php echo $saldoakhir?>">
                        </div>
                    </div>

                    </div>

                    <a href="">
                    <div class="col-0">
                        <input type="submit" name="simpan" id="simpan"  value="Simpan" class="btn btn-primary" style="position: absolute; margin-left: 15px;"/>
                        <button type="button" class="btn btn-danger" style="margin-left: 110px; margin-bottom: 30px;">Hapus</button>
                    </div>
                    </a>
                </form>
              </div>
            </div>
        </section>
     </body>
</html>



<script type="text/javascript">
 $("#saldoawal").keyup(function(){   
   var a = parseFloat($("#saldoawal").val());
   var b = parseFloat($("#nilaikegiatan").val());
   var c = a-b;
   $("#saldoakhir").val(c);
 });
 
 $("#nilaikegiatan").keyup(function(){
   var a = parseFloat($("#saldoawal").val());
   var b = parseFloat($("#nilaikegiatan").val());
   var c = a-b;
   $("#saldoakhir").val(c);
 });
</script>