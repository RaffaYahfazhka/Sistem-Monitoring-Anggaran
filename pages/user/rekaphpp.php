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
    $sql2       = "delete from input where id = '$id'";
    $q2         = mysqli_query($koneksi,$sql2);
    if($q2){
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
    $id                = $_GET['id'];
    $sql2              = "select * from input where id = '$id'";
    $q2                = mysqli_query($koneksi, $sql2);
    $r2                = mysqli_fetch_array($q2);
    $tanggal           = $r2['tanggal'];
    $mataanggaran      = $r2['mataanggaran'];
    $kodeanggaran      = $r2['kodeanggaran'];
    $nilaikegiatan     = $r2['nilaikegiatan'];
    $kegiatan          = $r2['kegiatan'];
    $saldoawal         = $r2['saldoawal'];
    $saldoakhir        = $r2['saldoakhir'];
    $pic               = $r2['pic'] = "HPP";

    if ($kodeanggaran == '') {
        $error = "Data tidak ditemukan";
    }
}

//Create Data

if (isset($_POST['simpan'])) { 
    $tanggal            = $_POST['tanggal'];
    $mataanggaran       = $_POST['mataanggaran'];
    $kodeanggaran       = $_POST['kodeanggaran'];
    $nilaikegiatan      = $_POST['nilaikegiatan'];
    $kegiatan           = $_POST['kegiatan'];
    $saldoawal          = $_POST['saldoawal'];
    $saldoakhir         = $_POST['saldoakhir'];
    $pic                = $_POST['pic'] = "HPP";

    if ($tanggal && $mataanggaran && $kodeanggaran && $nilaikegiatan && $kegiatan && $saldoawal && $saldoakhir && $pic) {
        if ($op == 'edit') { //untuk update
            $sql2       = "update input set tanggal = '$tanggal',mataanggaran='$mataanggaran',kodeanggaran = '$kodeanggaran',nilaikegiatan='$nilaikegiatan',kegiatan='$kegiatan',saldoawal='$saldoawal',saldoakhir='$saldoakhir',pic='$pic' where id = '$id'";
            $q2         = mysqli_query($koneksi, $sql2);
            if ($q2) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //Insert Data
            $sql2   = "insert into input(tanggal,mataanggaran,kodeanggaran,nilaikegiatan,kegiatan,saldoawal,saldoakhir,pic) values ('$tanggal','$mataanggaran','$kodeanggaran','$nilaikegiatan','$kegiatan','$saldoawal','$saldoakhir','$pic')";
            $q2     = mysqli_query($koneksi, $sql2);
            if ($q2) {
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
    <title>Rekap HPP</title> 
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
            <i class="bx bx-money bx-tada mr-0 imgdark" style="margin-left: 10px;"></i>
            <span class="textp" style="font-family: Arial, Helvetica, sans-serif; font-size: 15px;">Rekap HPP</span> 

            <!-- DROPDOWN PROFILE -->
            <div class="dropdown">

            <span class="textp" style="position: absolute; left: 940px; top: -15px; width:40px; height:40px; cursor: pointer; border-radius: 50px;">
                User
            </span>

                <div class="dropdown-content" style="position: absolute; left: 940px; top: 15.8px; border-radius: 3px;">

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

        <div class="create-btn">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Dari Tanggal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="Sampai Tanggal" readonly>
                        </div>
                         <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                         <button id="reset" class="btn btn-outline-warning btn-sm" style="margin-left: 4px;">Reset</button>
                         <a href="printhpp.php"><button class="btn btn-outline-dark btn-sm" style="margin-left: 4px;">Print PDF</button></a>
                    </div>
                </div>
            </div>
            
          </div>

        <div class="table-responsive">
            <table class="table table-bordered " id="dataTables" width="99%" cellspacing="0">
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
            $sql2   = "SELECT * FROM input ORDER BY kodeanggaran ASC";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $tanggal        = $r2['tanggal'];
                            $mataanggaran      = $r2['mataanggaran'];
                            $kodeanggaran     = $r2['kodeanggaran'];
                            $nilaikegiatan   = $r2['nilaikegiatan'];
                            $saldoawal  = $r2['saldoawal'];
                            $kegiatan   = $r2['kegiatan'];
                            $saldoakhir = $r2['saldoakhir'];
                            $pic   = $r2['pic'] = "HPP"

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="../../js/sidebar.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- PHP AJAX DATATABLES DATEPICKER NGAB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- Currencyjs -->

<script>
$(function() {
    $("#start_date").datepicker({
        "dateFormat": "yy-mm-dd"
    });
    $("#end_date").datepicker({
        "dateFormat": "yy-mm-dd"
    });
});
</script>

<script>

// Fetch records

function fetch(start_date, end_date) {
    $.ajax({
        url: "recordshpp.php",
        type: "POST",
        data: {
            start_date: start_date,
            end_date: end_date
        },
        dataType: "json",
        success: function(data) {
            // Datatables
            var i = "1";

            $('#dataTables').DataTable({
                "data": data, 
                "info": true,
                "paging": true, 
                
                // buttons
                "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        'copy', 'csv', 'excel'
                    ],
                
                // responsive
                "responsive": true,
                "columns": [{
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return i++;
                        }
                    },

                    {
                        "data": "tanggal",
                        "render": function(data, type, row, meta) {
                            return moment(row.tanggal).format('D MMMM YYYY');
                        }
                    },
                    {
                        "data": "mataanggaran"
                    },
                    {
                        "data": "kodeanggaran"
                    },
                    {
                        "data": "kegiatan"
                    },
                    {
                        "data": "saldoawal",
                        "render": function(data, type, row, meta) {
                            var number = $.fn.dataTable.render
                            .number('.', ',', 0, 'Rp.')
                            .display(data);

                        if (type === 'display') {
                          let color = 'black';
                          if (data < 250000) {
                          color = 'black';
                        } else if (data < 500000) {
                          color = 'black';
                        }

                        return '<span style="color:' + color + '">' + number + '</span>';
                    }

                     return number;}
                    },
                    {
                        "data": "nilaikegiatan",
                        "render": function(data, type, row, meta) {
                            var number = $.fn.dataTable.render
                            .number('.', ',', 0, 'Rp.')
                            .display(data);

                        if (type === 'display') {
                          let color = 'black';
                          if (data < 250000) {
                          color = 'black';
                        } else if (data < 500000) {
                          color = 'black';
                        }

                        return '<span style="color:' + color + '">' + number + '</span>';
                    }

                     return number;}
                    },
                    {
                        "data": "saldoakhir",
                        "render": function(data, type, row, meta) {
                            var number = $.fn.dataTable.render
                            .number('.', ',', 0, 'Rp.')
                            .display(data);

                        if (type === 'display') {
                          let color = 'black';
                          if (data < 250000) {
                          color = 'black';
                        } else if (data < 500000) {
                          color = 'black';
                        }

                        return '<span style="color:' + color + '">' + number + '</span>';
                    }

                     return number;}
                    },
                    {
                        "data": "pic"
                    }
                ]
            });
        }
    });
}
fetch();

// Filter

$(document).on("click", "#filter", function(e) {
    e.preventDefault();

    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    if (start_date == "" || end_date == "") {
        alert("both date required");
    } else { 
        $('#dataTables').DataTable().destroy();
        fetch(start_date, end_date);
    }
});


// Reset

$(document).on("click", "#reset", function(e) {
    e.preventDefault();

    $("#start_date").val(''); // empty value
    $("#end_date").val('');

    $('#dataTables').DataTable().destroy();
    fetch();
});
</script>