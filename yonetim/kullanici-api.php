<?php 

require_once '../util/connect.php';
$data = json_decode(file_get_contents('php://input'), true);
//session_start();


if($_SERVER['REQUEST_METHOD'] == "GET"){
	$id=$data['id'];
	$kullanici = $db->query("SELECT * FROM kullanici WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');
	echo json_encode($kullanici);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$sql = "INSERT INTO kullanici (
		kullanici_adi,
		eposta,
		sifre,
		yetki,
		aktif_mi) VALUES (?,?,?,?,?)";
	$stmt= $db->prepare($sql);
	$stmt->execute([
		$data["kullanici_adi"],
		$data["eposta"],
		$data["sifre"],
		1,
		1
	]);
	echo $db->lastInsertId();
}

if($_SERVER['REQUEST_METHOD'] == "PUT"){
	$sql = 'UPDATE kullanici SET kullanici_adi=?,eposta=?,sifre=?,yetki=?,aktif_mi=? WHERE id=?';

	$stmt= $db->prepare($sql);
	$update=$stmt->execute([
		$data["kullanici_adi"],
		$data["eposta"],
		$data["sifre"],
		$data["yetki"],
		$data["aktif_mi"],
		$data["id"]
		]);
	if ($update) {
		echo 1;
	} else {
		echo 0;
	}
}
?>