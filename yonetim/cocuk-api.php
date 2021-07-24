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
    echo "Bu çocuğun verilerine ulaşmak için yetkiniz yok!!!";
    return;
}

if ($islem == "getir") {
    $id = $data['id'];
    $cocuk = $db->query("SELECT * FROM cocuk WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($cocuk);
}

if ($islem == "genelbilgiler" && $_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO cocuk (ad,
		yetkili_adi,
        yetkili_soyadi,
        faaliyet_no,
		iletisim,
		sma_tip,
		valilik_izin_baslangic,
		valilik_izin_bitis,
		valilik_izni_url,
        hastalik_raporu_url,
        resim_url,
		toplanacak,
		toplanan,
        yuzde,
		birim,
		kisa_aciklama,
		aciklama,
        hastalik_raporu_turu,
        valilik_izin_turu,
        yetkili_kullanici,
        tamamlandi_mi,
        kardes_sayisi
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data["ad"],
        $data["yetkili_adi"],
        $data["yetkili_soyadi"],
        $data["faaliyet_no"],
        $data["iletisim"],
        $data["sma_tip"],
        $data["valilik_izin_baslangic"],
        $data["valilik_izin_bitis"],
        $data["valilik_izni_url"],
        $data["hastalik_raporu_url"],
        $data["resim_url"],
        $data["toplanacak"],
        $data["toplanan"],
        $data["yuzde"],
        $data["birim"],
        $data["kisa_aciklama"],
        $data["aciklama"],
        $data["hastalik_raporu_turu"],
        $data["valilik_izin_turu"],
        $data["yetkili_id"],
        $data["tamamlandi_mi"],
        0

    ]);
    echo $db->lastInsertId();
}

if ($islem == "genelbilgiler" && $_SERVER['REQUEST_METHOD'] == "PUT") {
    $sql = 'UPDATE cocuk SET ad=?,yetkili_adi=?,yetkili_soyadi=?,faaliyet_no=?,iletisim=?,sma_tip=?,valilik_izin_baslangic=?,valilik_izin_bitis=?,valilik_izni_url=?,hastalik_raporu_url=?,resim_url=?,toplanacak=?,toplanan=?,yuzde=?,birim=?,kisa_aciklama=?,aciklama=?,hastalik_raporu_turu=?,valilik_izin_turu=?,yetkili_kullanici=?,tamamlandi_mi=? WHERE id=?';

    $stmt = $db->prepare($sql);
    $update = $stmt->execute([
        $data["ad"],
        $data["yetkili_adi"],
        $data["yetkili_soyadi"],
        $data["faaliyet_no"],
        $data["iletisim"],
        $data["sma_tip"],
        $data["valilik_izin_baslangic"],
        $data["valilik_izin_bitis"],
        $data["valilik_izni_url"],
        $data["hastalik_raporu_url"],
        $data["resim_url"],
        $data["toplanacak"],
        $data["toplanan"],
        $data["yuzde"],
        $data["birim"],
        $data["kisa_aciklama"],
        $data["aciklama"],
        $data["hastalik_raporu_turu"],
        $data["valilik_izin_turu"],
        $data["yetkili_id"],
        $data["tamamlandi_mi"],
        $data["id"]
    ]);
    if($update){
        echo 1;
    } else {
        echo 0;
    }
    
}
?>