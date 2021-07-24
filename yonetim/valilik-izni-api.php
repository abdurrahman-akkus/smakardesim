<?php

$data = json_decode(file_get_contents('php://input'), true);
$islem = $data["islem"];
/*require_once '../util/connect.php';
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
}*/

if ($islem == "izin_kontrol" && $_SERVER['REQUEST_METHOD'] == "POST") {
    // where are we posting to?
    $url = 'https://derbis.dernekler.gov.tr/YardimToplamaYetkiliKisilerWeb/SelectYardimToplamaList';

    // what post fields?
    $fields = array(
        'sort'=> "",
        'page'=>1,
        'pageSize'=>50,
        'group'=>"",
        'filter'=>"",
        'dataList' => $data["dataList"]
    );

    // build the urlencoded data
    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

    // execute post
    $result = curl_exec($ch);

    // close connection
    curl_close($ch);
}
/*
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
}*/
?>