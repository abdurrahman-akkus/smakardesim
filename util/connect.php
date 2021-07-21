<?php
$host="localhost";
//$veritabani = "ebjhfnlb_smakardesim";
//$kullanici = "ebjhfnlb_root";
$veritabani = "sma_kardesim";
$kullanici = "root";
//$sifre = "Sinaps++42";
$sifre = "";

try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8",$kullanici,$sifre);
	//echo "Bağlantı Başarılı";

}catch(PDOException $error) {
   
   echo $error->getMessage();
}

?>
