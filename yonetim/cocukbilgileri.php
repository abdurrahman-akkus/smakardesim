<?php 

require_once '../util/connect.php';
$data = json_decode(file_get_contents('php://input'), true);
$islem=$data[islem];
session_start();
@$yetki=$_SESSION["yetki"];


if(@$_SESSION ["girisKontrol"]!=1) {
echo "Veri çekmek/işlemek için giriş yapmalısınız!!!";
return;
}

if($yetki<1) {
echo "Veri çekmek/işlemek için yetkiniz yok!!!";
return;
}

if ($_SESSION ["kullanici_id"]!=$data['yetkili_id']) {
	echo "Bu çocuğun verilerine ulaşmak için yetkiniz yok!!!";
	return;
}

if($islem=="getir"){
	$id=$data['id'];
	$cocuk = $db->query("SELECT * FROM cocuk WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');
	echo json_encode($cocuk);
}


?>