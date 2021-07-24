<?php

require_once '../util/connect.php';
$data = json_decode(file_get_contents('php://input'), true);
$islem = $data["islem"];
session_start();
@$yetki = $_SESSION["yetki"];


if (@$_SESSION ["girisKontrol"] != 1) {
    echo "Veri çekmek/işlemek için giriş yapmalısınız!!!";
    return;
}

if ($yetki < 1) {
    echo "Veri çekmek/işlemek için yetkiniz yok!!!";
    return;
}

if ($_SESSION ["kullanici_id"] != $data['yetkili_id']) {
    echo "Bu çocuğun banka verilerine ulaşmak için yetkiniz yok!!!";
    return;
}

if ($islem == "getir") {
    $cocuk_id = $data['cocuk_id'];
    $bankaQuery = $db->query("SELECT * FROM bankaBilgileri WHERE cocuk_id = '{$cocuk_id}'");
    $bankalar = array();
    while ($banka = $bankaQuery->fetch(PDO::FETCH_ASSOC)) {
        array_push($bankalar,$banka);
    }
    header('Content-Type: application/json');
    echo json_encode($bankalar);
}

if ($islem == "banka" && $_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO bankaBilgileri (
        cocuk_id,
		banka,
		birim,
		iban
    ) VALUES (?,?,?,?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data["cocuk_id"],
        $data["banka"],
        $data["birim"],
        $data["iban"]
    ]);
    echo $db->lastInsertId();
}

if ($islem == "banka" && $_SERVER['REQUEST_METHOD'] == "PUT") {
    $sql = 'UPDATE bankaBilgileri SET cocuk_id=?,banka=?,birim=?,iban=? WHERE id=?';

    $stmt = $db->prepare($sql);
    $update = $stmt->execute([
        $data["cocuk_id"],
        $data["banka"],
        $data["birim"],
        $data["iban"],
        $data["id"]
    ]);
    if($update){
        echo 1;
    } else {
        echo 0;
    }
}

if($islem=="sil") {
    $sql = 'DELETE FROM bankaBilgileri WHERE id=?';

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data["id"]
    ]);
    echo 1;
}
?>