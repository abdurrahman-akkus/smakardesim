<?php
$host="localhost";
//$veritabani = "ebjhfnlb_smakardesim";
//$kullanici = "ebjhfnlb_root";
$veritabani = "smakardesim";
$kullanici = "root";
$sifre = "Sinaps++42";

try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8",$kullanici,$sifre);
	//echo "Bağlantı Başarılı";

}catch(PDOException $error) {
   
   echo $error->getMessage();
}
?>
