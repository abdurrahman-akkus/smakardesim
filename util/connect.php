<?php
$host="localhost";
$veritabani = [VERİTABANI];
$kullanici = [KULLANICI];
$sifre = [ŞİFRE];

try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8",$kullanici,$sifre);
	//echo "Bağlantı Başarılı";

}catch(PDOException $error) {
   
   echo $error->getMessage();
}

?>
