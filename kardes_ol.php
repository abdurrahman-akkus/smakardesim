<?php include 'util/connect.php'; ?>
<?php
$cocuk = $_POST["cocuk"];
$artiBirKardes = $cocuk['kardes_sayisi'] + 1;
$id = $cocuk["id"];
$guncelle_cocuk_kardes_sayisi = $cocuk = $db->query("UPDATE cocuk SET kardes_sayisi='$artiBirKardes'  WHERE id = $id");
?>