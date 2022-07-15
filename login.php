<?php 
include 'settings.php'; //include settings 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />

    <!-- FAVICON LOGO -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    
    <!--Title-->
    <title>Sign in</title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <!--Form Field -->

        <form action="includes/login.php" method="POST" class="sign-in-form">
          <!--Username Field -->
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>

              <input name="login" placeholder="Email" style="border-radius: 0px 30px 30px 0px;  width: 103%;
             height: 55px; font-family: 'Arial';" required />
            </div>

            <!--Password Field -->
            <div class="input-field">
              <i class="fas fa-lock" ></i>

              <input type="password" name="password" id="submit" placeholder="Password" style="border-radius: 0px 30px 30px 0px;  width: 103%;
             height: 55px; font-family: 'Arial';" required />
            </div>
			<br>
            <!--Remember Password Field -->
			<div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Ingat password</label>
              </div>
			  <br>
            <!--Submit Field -->
            <input type="submit" name="submit" value="LOGIN" class="btn solid" />
            
          </form>

          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <!--Judul Field -->
            <h3 style="text-align: center;">Sistem Monitoring Anggaran</h3>
            <p>
              Sistem monitor anggaran adalah sistem yang berisi anggaran
               pengeluaran mengenai program kegiatan bidang / unit / SPI RKAP Tahun 2022.
            </p>
          </div>
          <img src="assets/img/money.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div>
            <img src="assets/img/Paljaya.png" style="width: 320px; height: 70px; margin-bottom: 550px;">
          </div>
          <img src="" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
