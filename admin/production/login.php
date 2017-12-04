<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Ticaret Dersi | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">


            <form action="../ayarlar/islem.php" method="POST">
              <h1>Admin Panel</h1>
              <div>
                <input type="text" class="form-control" name="kullanici_mail" placeholder="Kullanıcı Adınız(Mail)" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="kullanici_password" placeholder="Sifrenizi" required="" />
              </div>
              <div>
                <button class="form-control btn-btn-default" style="background-color:#73879C; color:white" type="submit" name="adminGiris" >Giriş</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <?php if($_GET['durum'] == 'no'){ ?>
                <p class="change_link">Hatalı giris yaptınız
                </p>
                  <?php } ?>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class=""></i> E-TİCARET PROJESİ  </h1>
                   <h1><i class=""></i>   </h1>
                   
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
