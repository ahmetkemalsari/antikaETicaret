<?php 
ob_start();
session_start();
include 'admin/ayarlar/baglan.php';
include 'admin/production/fonksiyon.php';
$ayarsor=$db->prepare('SELECT * FROM ayar where ayar_id=:id');
$ayarsor->execute(array('id'=>0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

 $kullanicisor=$db->prepare('SELECT * FROM kullanici WHERE kullanici_mail=:mail');
  $kullanicisor->execute(array(
    'mail'=>$_SESSION['userkullanici_mail']
  ));
  $say=$kullanicisor->rowCount();
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
	<meta name="author" content="<?php echo  $ayarcek['ayar_author'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $ayarcek['ayar_title'] ?></title>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="header"><!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index.php"><img src="<?php echo $ayarcek['ayar_logo'] ?>" alt="logo" class="logo img-responsive"></a>
					</div>


					<div class="col-md-8">
						<div class="pushright">
							<div class="top">

							<?php if(!isset($_SESSION["userkullanici_mail"])){ ?>
								<a href="#" id="reg" class="btn btn-default btn-dark">Giriş Yap<span>-- yada --</span>Kayıt Ol</a>
								<div class="regwrap">
									<div class="row">
										<div class="col-md-6 regform">
											<div class="title-widget-bg">
												<div class="title-widget">Kullanıcı Girişi</div>
											</div>

											<form action="admin/ayarlar/islem.php" method="POST" role="form">


												<div class="form-group">
													<input type="text" class="form-control" name="kullanici_mail" id="username" placeholder="Kullanıcı Adınız (Mail Adresiniz)">
												</div>


												<div class="form-group">
													<input type="password" class="form-control" name="kullanici_password" id="password" placeholder="Şifreniz">
												</div>


												<div class="form-group">
													<button type="submit" name="kullanicigiris" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
												</div>

											</form>

										</div>
										<div class="col-md-6">
											<div class="title-widget-bg">
												<div class="title-widget">Kayıt</div>
											</div>
											<p>
												Yeni Kullanıcımısın Alişverişe Başlamak İçin Önce Kayıt Olmalısın!
											</p>
											<a href="register"><button class="btn btn-default btn-yellow">Kayıt Ol</button></a>
										</div>
									</div>
								</div>
								<?php }else{ ?>
								<a href="#" id="reg" class="btn btn-default btn-dark">Hoşgeldin<span>--  --</span><?php echo $kullanicicek['kullanici_adsoyad'] ?></a>
								<?php } ?>
								<div class="srch-wrap">
									<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
								</div>
								<div class="srchwrap">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label for="search" class="col-sm-2 control-label">Search</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="search">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashed"></div>
		</div>