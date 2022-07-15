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
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../assets/css/data.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

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
    
        <!-- FAVICON LOGO -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    
    <!--Title-->
    <title>Rekap Umum</title> 
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../assets/img/PaljayaLogo2.png" alt="Logo Paljaya" style="width: 80%; padding-top: 7%;">
                </span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="search-box">
                        <a href="datahpp.php">
                            <i class='bx bx-arrow-from-top -alt icon'></i>
                            <span class="text nav-text">Data HPP</span>
                        </a>
                    </li>

                    <li class="search-box">
                        <a href="dataumum.php">
                            <i class='bx bx-arrow-from-top -alt-2 icon' ></i>
                            <span class="text nav-text">Data Umum</span>
                        </a>
                    </li>

                    <li class="search-box">
                        <a href="rekaphpp.php">
                            <i class='bx bx-money icon'></i>
                            <span class="text nav-text">Rekap HPP</span>
                        </a>
                    </li>

                    <li class="search-box">
                        <a href="rekapumum.php">
                            <i class='bx bx-world -alt icon' ></i>
                            <span class="text nav-text"> Rekap Umum</span>
                        </a>
                    </li>

                    <li class="search-box">
                        <a href="registrasi.php">
                            <i class='bx bx-user -alt icon' ></i>
                            <span class="text nav-text"> Data User</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="search-box">
                    <a href="../../includes/logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    </div>
  </div>
</div>
            
</div>
</div>

    <section class="home" style="width: 94.5%; height: auto;">
        <div class="card-header">
            <i class="bx bx-globe bx-spin mr-0 imgdark" style="margin-left: 10px;"></i>
            <span class="textp" style="font-family: Arial, Helvetica, sans-serif; font-size: 15px;">Rekap Umum</span> 

            <span class="textp" style="position: absolute; left: 81.7%; top: 11px; width:150px; height:40px; font-family: 'Poppins'; font-weight: 500; font-style: normal;">
                Admin
            </span>
            <!-- DROPDOWN PROFILE -->
            <div class="dropdown">

                <img src="../../assets/img/admin.png" id="imgprofile" alt="Profile Picture" style="position: absolute; left: 920px; top: -25px; width:40px; height:40px; cursor: pointer; border-radius: 50px;">

                <div class="dropdown-content" style="position: absolute; left: 930px; top: 15.8px; border-radius: 3px;">

                    <a href="">
                        <span style="margin-left: 0%; text-align: left;"><?php echo $_SESSION['name'] ?></span>
                      </a>

                  <a href="inputdatauser.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-bottom: 2.4px;" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                      <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <span style="margin-left: 12%;">Add User</span>
                  </a>

                  <a href="../../includes/logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-bottom: 2.4px;" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                    </svg><span style="margin-left: 12%;">Logout</span>
                  </a>
                </div>
            </div>
        </div>

        <br>

        <div class="create-btn" style="margin-left: 2%;">
        <form action="" method="post">
                <table>
                    <tr>
                        <td><input type="date" name="dari_tgl" id="dari_tgl" class="form-control mb-2"></td>
                        <td><input type="date" name="sampai_tgl" id="sampai_tgl" class="form-control ml-3 mb-2"></td>
                        <td><input type="submit" class="btn btn-outline-info ml-4 mb-2" name="filter" value="Filter"></td>
                        <td><input type="submit" class="btn btn-outline-danger ml-2 mb-2" name="reset" value="Reset"></td>
                        <td><a href="printumum.php"><input type="button" class="btn btn-light ml-2 mb-2" name="print" value="Print"></a></td>
                        
                    </tr>
                </table>
            </form>
                      

        </div>

        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="99%" cellspacing="0" style="margin-left: 1.5%;">
                <thead class="table-light">
                    <tr class="texttables" style="font-size: 15px;">
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

                <tr class="text" style="font-size: 16px;">
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
        <style>
        .dropbtn {
          background-color: #04AA6D;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
          border-radius: 10px 0px 0px 10px;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #2B6ABA;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          color: white;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          border-radius: 3px;
        }
        
        .dropdown-content a:hover {background-color: #19385F; }
        
        .dropdown:hover .dropdown-content {display: block; }
        
        .dropdown:hover .dropbtn {background-color: #3e8e41; }
        </style>
        
    </table>
</div>
    </section>

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


</body>
</html>