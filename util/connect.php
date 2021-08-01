<?php

$host="localhost";
$veritabani = "smakardesim";
$kullanici = "root";
$sifre = "27648Onur";

try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8",$kullanici,$sifre);
	//echo "Bağlantı Başarılı";

}catch(PDOException $error) {
   
   echo $error->getMessage();
}

?>
