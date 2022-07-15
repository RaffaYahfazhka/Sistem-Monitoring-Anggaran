<?php 
include 'settings.php'; //include settings 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/pilihdata.css">
    <!-- FAVICON LOGO -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    
    <!--Title-->
    <title>Pilih Data</title>

    <img src="../../assets/img/Paljaya-logo.png" class="paljaya_logo">
</head>

<body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                    swal({
                      title: "Selamat Datang!",
                      text: "Login Berhasil!",
                      icon: "success",
                      button: "Oke",
                    });
                  </script>

    <a href="datahpp.php">
        <div class="glow-on-hover">
            <span class="recap_text">HPP</span>
        </div>
    </a>

    <a href="dataumum.php">
        <div class="blue_recap2 glow-on-hover-2">
            <span class="input_text">Umum</span>
        </div>
    </a>
    
</body>
</html>