<?php
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
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON LOGO -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <!-- Title -->
    <title>Print Umum</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!---->
    <script src="https://cdn.datatables.net/plug-ins/1.12.1/sorting/currency.js"></script>

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../../assets/css/print.css" media="print">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 0px;
        }
    </style>
</head>
<body>

<br>
  <div class="row">
    <div class="col-md-10">
      <script>
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
 
 
toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})
 
searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})
    </script>
    

    <main>
        <!-- Tabel Card -->
                <div class="card-body" style="width: 115%;">
    
                    <!-- The Modal -->
                <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                <div class="modal-content">
          
            
            </div>
          </div>
        </div>

        <div class="row">

        <img src="../../assets/img/PaljayaLogo2.png" style="position: absolute; width: 180px;  margin-top: 40px; margin-left: 60px;">

        <span style="position: relative; left: 335px; top: 150px;"><h1><strong>MONITORING ANGGARAN</strong></h1></span>
        <br>
        <span style="position: relative; left:-24px; top: 210px;"><h1><strong>TAHUN 2022</strong></h1></span>
</div>

<div class="text-left" style="position: relative; margin-left: 88%; margin-top: 20px;">
  <a href="rekapumum.php">
    <button class="btn btn-outline-danger col-sm-11" id="print-btn">Kembali</button>
  </a>
</div>

<div class="text-left" style="position: relative; margin-left: 88%; margin-top: 30px;">
        <button onclick="window.print();" class="btn btn-outline-primary col-sm-11" id="print-btn">Print</button>
</div>
<br>
<div class="create-btn" style="margin-left: 88%;">
        <form action="" method="post">
                <table>
                    <tr>
                        <tr><input type="date" name="dari_tgl" id="dari_tgl" class="form-control mb-2"></tr>
                        <tr><input type="date" name="sampai_tgl" id="sampai_tgl" class="form-control  mb-2"></tr>
                        <td>
                            <input type="submit" class="btn btn-info" name="filter" value="Filter">
                            <input type="submit"  class="btn btn-danger" name="reset" value="Reset">
                        </td>
                        
                    </tr>
                </table>
            </form>
                      

        </div>

<br><br><br>
<div class="table-responsive">
            <table class="table table-bordered bg-light text-dark" id="dataTable" width="82%" height="99%" cellspacing="0" style="margin-left: 2.5%; z-index: 0;">
            <style>
            </style>
                <thead class="table-light">
                    <tr class="texttables" style="font-size: 16px;">
                        <th style="font-family: Arial, Helvetica, sans-serif;">No</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Tanggal</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Mata Anggaran</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Kode Anggaran</th>
                        <th style="font-family: Arial, Helvetica, sans-serif; text-align: center;">Kegiatan</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Saldo Awal</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Nilai Kegiatan</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Saldo Akhir</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">P.I.C</th>
                    </tr>
                </thead>
        <tbody>
        <?php
            if(isset($_POST['Reset'])){
                $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
                $sql2   = mysqli_query($koneksi, "SELECT * FROM rekapitulasi ORDER BY id DESC");
            }

            if(isset($_POST['filter'])){
                $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);

            if($dari_tgl !=null || $sampai_tgl !=null){    
                $sql2   = mysqli_query($koneksi, "SELECT * FROM rekapitulasi WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl' ORDER BY kodeanggaran ASC");
            }else{
                $sql2   = mysqli_query($koneksi, "SELECT * FROM rekapitulasi ORDER BY kodeanggaran ASC");
            }
            }else{
            $sql2   = mysqli_query($koneksi, "SELECT * FROM rekapitulasi ORDER BY kodeanggaran ASC");
            }
            $urut =1;
            while ($r2 = mysqli_fetch_array($sql2)) {
                            $id         = $r2['id'];
                            $tanggal        = $r2['tanggal'];
                            $mataanggaran      = $r2['mataanggaran'];
                            $kodeanggaran     = $r2['kodeanggaran'];
                            $nilaikegiatan   = $r2['nilaikegiatan'];
                            $saldoawal  = $r2['saldoawal'];
                            $kegiatan   = $r2['kegiatan'];
                            $saldoakhir = $r2['saldoakhir'];
                            $pic   = $r2['pic'] = "Umum"

                        ?>

                <tr class="text" style="font-size: 15px;">
                <th scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $urut++ ?></th>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?=tgl_indo($tanggal); ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $mataanggaran ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $kodeanggaran ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $kegiatan ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo "Rp.". number_format($saldoawal,0,',','.'); ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo "Rp.". number_format($nilaikegiatan,0,',','.'); ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo "Rp.". number_format($saldoakhir,0,',','.'); ?></td>
                                <td scope="row" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $pic ?></td>
  
                    </th>
                    
                  </tr>
                  <?php
                        }
                        ?>
                
        </tbody>
        
                    
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
    
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="../../js/sidebar.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>
    
    
</div>
</body>
</html>