<?php 
	try {
		$db = new PDO("mysql:host=localhost;dbname=eticaret","root","1234");
	} catch (PDOException $e) {

		echo $e->getMessage();

	}


 ?>