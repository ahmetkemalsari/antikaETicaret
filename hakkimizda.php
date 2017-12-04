<?php 
	include 'header.php';
	include 'menu.php';
	$hakkimizdasor=$db->prepare('SELECT * FROM hakkimizda WHERE hakkimizda_id=:id');
	$hakkimizdasor->execute(array(
		'id'=>0
	));
	$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
 ?>
</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Anasayfa</a> &rsaquo; Hakkımızda</div>
							<div class="bigtitle">Hakkımızda Sayfası</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Ürün Satın Al</button>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></div>
				</div>
				<div class="page-content">
					<p>
					<?php echo $hakkimizdacek['hakkimizda_icerik']; ?>
					</p>
				</div>
				<div class="title-bg">
					<div class="title">Misyon</div>
				</div>
				<div class="page-content">
					<p>
					<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>
					</p>
				</div>
				<div class="title-bg">
					<div class="title">Vizyon</div>
				</div>
				<div class="page-content">
					<p>
					<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>
					</p>
				</div>


			</div>
			<div class="col-md-3"><!--sidebar-->
				<div class="title-bg">
					<div class="title">Categories</div>
				</div>
				
				<div class="categorybox">
					<ul>
						<li><a href="category.htm">Women Accessories</a></li>
						<li><a href="category.htm">Men Shoes</a></li>
						<li><a href="category.htm">Gift Specials</a></li>
						<li><a href="category.htm">Electronics</a>
							<ul>
								<li><a href="#">iPhone 4S</a></li>
								<li><a href="#">Samsung Galaxy</a></li>
								<li><a href="#">MacBook Pro 17"</a></li>
							</ul>
						</li>
						<li><a href="category.htm">On sale</a></li>
						<li><a href="category.htm">Summer Specials</a></li>
						<li><a href="category.htm">Electronics</a></li>
						<li class="lastone"><a href="category.htm">Unique Stuff</a></li>
					</ul>
				</div>
				
				<div class="ads">
					<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
				</div>
				
				<div class="title-bg">
					<div class="title">Best Seller</div>
				</div>
				<div class="best-seller">
					<ul>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
					</ul>
				</div>
				
			</div><!--sidebar-->
		</div>
		<div class="spacer"></div>
	</div>
	


 <?php 
 include 'footer.php'
  ?>