<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';

/* ------------------------------------------------*/


if (isset($_POST['adminGiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}
/* KULLANICI İŞLEMLERİ  */
/*Kullanıcı Kayıt işlemi */
if (isset($_POST['kullanicikaydet'])) {

	
	$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); 
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 

	 $kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
	$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {


			

			


// Başlangıç

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
	}
	


}

/* kullanıcı Giriş İşlemi  */
if(isset($_POST['kullanicigiris'])){

	
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	$kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		$_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../?durum=basarisizgiris");

	}

}




/*Slider İşlemleri */
/*Slider Ekle */
if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../img/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
		));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}
/*Slider Duzenle */
if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../img/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
			));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
			));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}
/* Slider Silme */

if ($_GET['slidersil']=="ok") {
	
	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
		));

	if ($kontrol) {

		$resimsilunlink=$_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}

/* MENU İŞLEMLERİ */
/*Menu Ekleme */
if (isset($_POST['menuKaydet'])) {
	
	
	$menu_seourl = seo($_POST['menu_ad']);
	$menuKaydet=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_durum=:menu_durum,
		menu_detay=:menu_detay,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_url=:menu_url,
		menu_ust=:menu_ust");

	$update=$menuKaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_durum' => $_POST['menu_durum'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_url' => $_POST['menu_url'],
		'menu_ust' =>0
	));
	if ($update) {

		header("Location:../production/menuler.php?durum=ok");

	} else {

		header("Location:../production/menuler.php?durum=no");
	}
	
}


/*Menu Düzenleme */
if (isset($_POST['menuDuzenle'])) {
	
	$menu_id = $_POST['menu_id'];
	$menu_seourl = seo($_POST['menu_ad']);
	$menuKaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_durum=:menu_durum,
		menu_detay=:menu_detay,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_url=:menu_url
		WHERE menu_id=:id");

	$update=$menuKaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_durum' => $_POST['menu_durum'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_url' => $_POST['menu_url'],
		'id' => $_POST['menu_id']
	));
	if ($update) {

		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}
	
}
/* Menu Silme */ 
if($_GET['menuSil']=="ok"){
	$sil = $db->prepare("DELETE FROM menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
	));
	if($kontrol){
		header("Location:../production/menuler.php?durum=ok");
	}else{
		header("Location:../production/menuler.php?durum=no");
	}
}

/* KULLANICI İŞLEMLERİ     */
/* Kullanıcı Düzenleme */ 
if (isset($_POST['kullaniciDuzenle'])) {
	
	$kullanici_id = $_POST['kullanici_id'];
	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_durum=:kullanici_durum,
		kullanici_yetki=:kullanici_yetki
		WHERE kullanici_id=:id");

	$update=$ayarkaydet->execute(array(
		'kullanici_durum' => $_POST['kullanici_durum'],
		'kullanici_yetki' => $_POST['kullanici_yetki'],
		'id' => $_POST['kullanici_id']
	));
	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
	
}

/* kullanici silme */
if($_GET['kullaniciSil']=="ok"){
	$sil = $db->prepare("DELETE FROM kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));
	if($kontrol){
		header("Location:../production/kullanici.php?durum=ok");
	}else{
		header("Location:../production/kullanici.php?durum=no");
	}
}

if (isset($_POST['userkullaniciDuzenle'])) {
	
	$kullanici_id = $_POST['kullanici_id'];
	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce
		WHERE kullanici_id=:id");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'id' => $_POST['kullanici_id']
	));
	if ($update) {

		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=no");
	}
	
}

/* kullanici silme */
if($_GET['kullaniciSil']=="ok"){
	$sil = $db->prepare("DELETE FROM kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));
	if($kontrol){
		header("Location:../production/kullanici.php?durum=ok");
	}else{
		header("Location:../production/kullanici.php?durum=no");
	}
}

/* kullanici Sifre Düzenleme */


if (isset($_POST['userSifreGuncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
		));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
					));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}





		// Bitiş



			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}

/*Site AYARLARI */
/* logo ayarları */
if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../img';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}

/*genel ayar */
if (isset($_POST['genelAyarKaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=:id");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author'],
		'id' => 0
	));
	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}

if(isset($_POST['iletisimAyarKaydet'])){
	$ayarkaydet =$db->prepare("UPDATE ayar SET 
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=:id ");
	$update=$ayarkaydet->execute(array(
		'ayar_tel'=>$_POST['ayar_tel'],
		'ayar_gsm'=>$_POST['ayar_gsm'],
		'ayar_faks'=>$_POST['ayar_faks'],
		'ayar_mail'=>$_POST['ayar_mail'],
		'ayar_ilce'=>$_POST['ayar_ilce'],
		'ayar_il'=>$_POST['ayar_il'],
		'ayar_adres'=>$_POST['ayar_adres'],
		'ayar_mesai'=>$_POST['ayar_mesai'],
		'id' =>0
	));
	if($update){
		header('Location:../production/iletisim-ayar.php?durum=ok');
	}else
	{
		header('Location:../production/iletisim-ayar.php?durum=no');
	}
}

if(isset($_POST['apiAyarKaydet'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=:id');
	
	$update=$ayarkaydet->execute(array(
		'ayar_analystic'=>$_POST['ayar_analystic'],
		'ayar_maps'=>$_POST['ayar_maps'],
		'ayar_zopim'=>$_POST['ayar_zopim'],
		'id' =>0
	));
	if($update){
		header('Location:../production/api-ayar.php?durum=ok');
	}else{
		header('Location:../production/api-ayar.php?durum=no');
	}

}

if(isset($_POST['sosyalAyarKaydet'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET 
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google
		WHERE ayar_id=:id ');
	$update=$ayarkaydet->execute(array(
		'ayar_facebook' =>$_POST['ayar_facebook'],
		'ayar_twitter' =>$_POST['ayar_twitter'],
		'ayar_youtube' =>$_POST['ayar_youtube'],
		'ayar_google' =>$_POST['ayar_google'],
		'id' =>0
	));
	if($update){
		header('Location:../production/sosyal-ayar.php?durum=ok');
	}else{
		header('Location:../production/sosyal-ayar.php?durum=no');
	}
}


if(isset($_POST['mailAyarKaydet'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET 
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=:id');
	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=>$_POST['ayar_smtphost'],
		'ayar_smtpuser'=>$_POST['ayar_smtpuser'],
		'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
		'ayar_smtpport'=>$_POST['ayar_smtpport'],
		'id'=> 0
	));
	if($update){
		header('Location:../production/mail-ayar.php?durum=ok');
	}
	else{
		header('Location:../production/mail-ayar.php?durum=no');
	}
}

if(isset($_POST['hakkimizdaKaydet'])){
	$kaydet=$db->prepare('UPDATE hakkimizda SET 
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=:id');
	$update=$kaydet->execute(array(
		'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
		'hakkimizda_icerik'=>$_POST['hakkimizda_icerik'],
		'hakkimizda_video'=>$_POST['hakkimizda_video'],
		'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon'=>$_POST['hakkimizda_misyon'],
		'id'=>0
	));
	if($update){
		header('Location:../production/hakkimizda.php?durum=ok');
	}else{
		header('Location:../production/hakkimizda.php?durum=no');
	}
}























































/*
if(isset($_POST['apiAyarSil'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=:id');
	
	$update=$ayarkaydet->execute(array(
		'ayar_analystic'=>'',
		'ayar_maps'=>'',
		'ayar_zopim'=>'',
		'id' =>0
	));
	if($update){
		header('Location:../production/api-ayar.php?durum=ok');
	}else{
		header('Location:../production/api-ayar.php?durum=no');
	}

}

if(isset($_POST['genelAyarSil'])){
		$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=:id");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => '',
		'ayar_description' =>'',
		'ayar_keywords' => '',
		'ayar_author' => '',
		'id' => 0
	));
	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}

}

if(isset($_POST['iletisimAyarSil'])){
	$ayarkaydet =$db->prepare("UPDATE ayar SET 
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=:id ");
	$update=$ayarkaydet->execute(array(
		'ayar_tel'=>'',
		'ayar_gsm'=>'',
		'ayar_faks'=>'',
		'ayar_mail'=>'',
		'ayar_ilce'=>'',
		'ayar_il'=>'',
		'ayar_adres'=>'',
		'ayar_mesai'=>'',
		'id' =>0
	));
	if($update){
		header('Location:../production/iletisim-ayar.php?durum=ok');
	}else
	{
		header('Location:../production/iletisim-ayar.php?durum=no');
	}
}
if(isset($_POST['sosyalAyarSil'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET 
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google
		WHERE ayar_id=:id ');
	$update=$ayarkaydet->execute(array(
		'ayar_facebook' =>'',
		'ayar_twitter' =>'',
		'ayar_youtube' =>'',
		'ayar_google' =>'',
		'id' =>0
	));
	if($update){
		header('Location:../production/sosyal-ayar.php?durum=ok');
	}else{
		header('Location:../production/sosyal-ayar.php?durum=no');
	}
}
if(isset($_POST['mailAyarSil'])){
	$ayarkaydet=$db->prepare('UPDATE ayar SET 
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=:id');
	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=>'',
		'ayar_smtpuser'=>'',
		'ayar_smtppassword'=>'',
		'ayar_smtpport'=>'',
		'id'=> 0
	));
	if($update){
		header('Location:../production/mail-ayar.php?durum=ok');
	}
	else{
		header('Location:../production/mail-ayar.php?durum=no');
	}
}



*/
?>