
<div class="main-nav"><!--end main-nav -->
	<div class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">

							<li><a href="index.php" class="active">Anasayfa</a><div class="curve"></div></li>

							<?php 
							$menusor=$db->prepare("SELECT * FROM menu WHERE menu_durum=:durum ORDER BY menu_sira limit 6");
							$menusor->execute(array(
								'durum' => 1 ));
							while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {?>
								
							<li><a href="<?php 
								if(!empty($menucek['menu_url'])){
									echo $menucek['menu_url'];
								}else{
									echo "sayfa-".seo($menucek['menu_ad']);
								}

							 ?>"><?php echo $menucek['menu_ad']; ?></a></li>
								
							<?php } ?>
							

						</ul>
					</div>
				</div>
				<div class="col-md-2 machart">
					<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Cart</span>|<span class="allprice">$0.00</span></button>
					<div class="popcart">
						<table class="table table-condensed popcart-inner">
							<tbody>
								<tr>
									<td>
										<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
									</td>
									<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span></td>
									<td>1X</td>
									<td>$138.80</td>
									<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
								</tr>
								<tr>
									<td>
										<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
									</td>
									<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span></td>
									<td>1X</td>
									<td>$138.80</td>
									<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
								</tr>
								<tr>
									<td>
										<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
									</td>
									<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span></td>
									<td>1X</td>
									<td>$138.80</td>
									<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
								</tr>
							</tbody>
						</table>
						<span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> : $36.00 </span>
						<br>
						<div class="btn-popcart">
							<a href="checkout.htm" class="btn btn-default btn-red btn-sm">Checkout</a>
							<a href="cart.htm" class="btn btn-default btn-red btn-sm">More</a>
						</div>
						<div class="popcart-tot">
							<p>
								Total<br>
								<span>$313.60</span>
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="container">
		<?php 
		if(isset($_SESSION['userkullanici_mail'])){
		 ?>
			<ul class="small-menu"><!--small-nav -->
				<li><a href="hesabim" class="myacc">Hesap Bilgilerim</a></li>
				<li><a href="siparislerim" class="myshop">Siparişlerim</a></li>
				<li><a href="logout" class="mycheck">Güvenli Çıkış</a></li>
			</ul><!--small-nav -->
			<?php } ?>