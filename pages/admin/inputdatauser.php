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
$name = "";
$login = "";
$password = "";
$role = "";
$error = "";
$sukses ="";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $id         = $_GET['id'];
    $sql2       = "delete from user where id = '$id'";
    $q2         = mysqli_query($koneksi,$sql2);
    if($q2){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}


if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql2       = "select * from user where id = '$id'";
    $q2         = mysqli_query($koneksi, $sql2);
    $r2         = mysqli_fetch_array($q2);
    $name           = $r2['name'];
    $login           = $r2['login'];
    $password      = $r2['password'];
    $role      = $r2['role'];

    if ($name == '') {
        $error = "Data tidak ditemukan";
    }
}


//Create Data

if (isset($_POST['simpan'])) { 
    $name            = $_POST['name'];
    $login            = $_POST['login'];
    $password       = md5($_POST['password']);
    $role       = $_POST['role'];




    if ($name && $login && $password && $role) {
        if ($op == 'edit') { //Update Data
            $sql2       = "select user set name = '$name',login='$login',password = '$password',role = '$role' where id = '$id'";
            $q2         = mysqli_query($koneksi, $sql2);
            if ($q2) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //Insert Data
            $sql2   = "insert into user(name,login,password,role) values ('$name','$login','$password','$role')";
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
        <!-- FAVICON LOGO -->
        <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
        
        <!--Title-->
        <title>Input User</title>
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
    <br>
<section class="content">
    <div class="mx-auto">
        <!-- Untuk Memasukkan Data -->
        <div class="card card-primary">
            
            <div class="card-header">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </svg><span style="margin-left: 10px; padding-top: 10px; font-size: 15px;">Data User</span>
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
                    header("refresh:1;url=registrasi.php");
                }
                ?>

                
                <form action="" method="POST">
<br>
                   <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 500;">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                        </div>
                    </div>
<br>
                    <div class="mb-3 row">
                        <label for="mataanggaran" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 500;">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login" name="login" value="<?php echo $login ?>">
                        </div>
                    </div>
<br>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 500;">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control number" id="password" name="password" value="<?php echo $password?>">
                        </div>
                    </div>
<br>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label" style="font-family: Arial; font-weight: 500;">Role</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control number" id="role" name="role" placeholder="[ 1 Sebagai Admin , 2 Sebagai User ]" value="<?php echo $role?>">
                        </div>
                    </div>
                    
                    </div>
                    <a href="">
                    <div class="col-0">
                        <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary" style="position: absolute; margin-left: 15px;"/>
                        <button type="button" class="btn btn-danger" style="margin-left: 120px; margin-bottom: 30px;">Hapus</button>
 
                    </div>
                    </a>
                </form>
            </div>
        </div>
       </section>
     </body>
</html>


