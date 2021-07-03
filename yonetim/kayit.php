<?php
require_once '../util/connect.php';
session_start();
@$yetki=$_SESSION["yetki"];
if(@$_SESSION ["girisKontrol"]!=1) {

header("Location: index.php?info=nosession");
}
if($yetki<1) {

header("Location: anasayfa.php");
}


$cocuklarQuery = $db->query("SELECT * FROM cocuk WHERE yetkili_kullanici = '{$_SESSION ["kullanici_id"]}'");


$cocuklar = array();
while ($cocuk = $cocuklarQuery->fetch(PDO::FETCH_ASSOC)) {
    array_push($cocuklar,$cocuk);
}
$cocukSayisi = sizeof($cocuklar);
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Yeni Kullanıcı</title>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.v3.3.7.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/trumbowyg.min.css">
        <link rel="stylesheet" href="../css/trumbowyg.colors.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        if(@$_POST["submit"]){
        $k_adi = htmlspecialchars($_POST["k_adi"],ENT_QUOTES, 'UTF-8');
        $k_sifre = htmlspecialchars($_POST["k_sifre"],ENT_QUOTES, 'UTF-8');
        $yetki = htmlspecialchars($_POST["yetki"],ENT_QUOTES, 'UTF-8');
        $aktif = htmlspecialchars($_POST["aktif"],ENT_QUOTES, 'UTF-8');
        $ek = $db -> prepare ("INSERT INTO users (username,password,yetki,aktif_mi) VALUES (:k_adi,:k_sifre,:yetki,:aktif)");
        $ek->bindValue(":k_adi",$k_adi,PDO::PARAM_STR);
        $ek->bindValue(":k_sifre",$k_sifre,PDO::PARAM_STR);
        $ek->bindValue(":yetki",$yetki,PDO::PARAM_INT);
        $ek->bindValue(":aktif",$aktif,PDO::PARAM_INT);
        if($ek->execute()){
        header("Location: kllnclar.php?i=ekle");
        } else{
        header("Location: kllnclar.php?i=hata");
        }
        }
        ?>
        <div id="wrapper">
            <?php
            require_once('inc_menu.php')
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Çocuğa Ait Bilgiler</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="basvurular.php">< Geri Dön</a>
                            </div>
                            <div class="panel-body">
                                <div class="px-2">
                                    <label for="">İşlemini Yapmak İstediğiniz Çocuğu Seçiniz:</label>
                                    <select name="" id="cocuk_id" class="form-control" onchange="cocugunBilgileriniCek();">
                                        <option value="">Yeni Kayıt</option>
                                        <?php foreach ($cocuklar as $cocuk) { ?>
                                        <option value="<?=$cocuk[id]?>"><?=$cocuk[ad]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <br>
                                <hr>
                                <div class="row mt-4">
                                    <h3 style="margin-left: 1rem;"> Genel Bilgiler</h3>
                                    <form role="form" action ="" method='POST'enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Çocuğun Adı</label>
                                                <input class="form-control" name="ad" id="ad" placeholder="Çocuğun Adı">
                                            </div>
                                            <div class="form-group">
                                                <label>Yetkili Adı</label>
                                                <input class="form-control" name="yetkili_adi" id="yetkili_adi"  placeholder="********">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefon No</label>
                                                <input class="form-control" name="iletisim" id="iletisim" placeholder="+90 123 456 78 90">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefon No</label>
                                                <select name="sma_tip" id="sma_tip" id="" class="form-control">
                                                    <option value="SMA-1">SMA-1</option>
                                                    <option value="SMA-2">SMA-2</option>
                                                    <option value="SMA-3">SMA-3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Valilik İzin Başlangıcı</label>
                                                <input type="date" class="form-control" name="valilik_izin_baslangic" id="valilik_izin_baslangic" placeholder="01.01.2021">
                                            </div>
                                            <div class="form-group">
                                                <label>Valilik İzin Başlangıcı</label>
                                                <input type="date" class="form-control" name="valilik_izin_bitis" id="valilik_izin_bitis" placeholder="01.06.2021">
                                            </div>
                                            <div class="form-group">
                                                <label>Toplanacak</label>
                                                <input type="number" class="form-control" name="toplanacak" id="toplanacak">
                                            </div>
                                            <div class="form-group">
                                                <label>Toplanan</label>
                                                <input type="number" class="form-control" name="toplanan" id="toplanan">
                                            </div>
                                            <div class="form-group">
                                                <label>Para Birimi</label>
                                                <select name="birim" id="birim" id="" class="form-control">
                                                    <option value="USD">$ Amerikan Doları</option>
                                                    <option value="EUR">€ Euro</option>
                                                    <option value="TRY">₺ Türk Lirası</option>
                                                </select>
                                            </div>
                                            <input type="button" name="submit" value="Kaydet" class="btn btn-default" onclick="kaydet()">
                                            <button type="reset" class="btn btn-default">Temizle</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kısa Açıklama</label>
                                                <textarea class="form-control trumbowyg" name="kisa_aciklama" id="kisa_aciklama" placeholder="Çocuğumuzla ilgili kısa özet bilgi veriniz. En fazla 255 karakterle sınırlıdır." rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Açıklama</label>
                                                <textarea class="form-control trumbowyg" name="aciklama" id="aciklama" placeholder="Çocuğumuzla ilgili genel bilgi veriniz. Çocuğumuzun hikayesini paylaşarak SMA kardeşi adaylarının çocuğumuzu doğru tanımasına yardımcı olunuz." rows="8"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="row">
                                    <h3 style="margin-left: 1rem;"> Belgeler</h3>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fotoğraf</label>
                                            <input type="file" class="form-control" name="resim" id="resim">
                                        </div>
                                        <div class="form-group">
                                            <label>Hastalık Raporu Formatı</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="hastalik_raporu_turu" value="pdf" checked>PDF
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="hastalik_raporu_turu" value="resim">Resim
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Hastalık Raporu</label>
                                            <input type="file" class="form-control" name="hastalik_raporu">
                                            <button class="btn btn-default">Yükle</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Valilik İzni Formatı</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="valilik_izin_turu" value="pdf" checked>PDF
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="valilik_izin_turu" value="resim">Resim
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Valilik İzni</label>
                                            <input type="file" class="form-control" name="valilik_izni" id="valilik_izni">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <style>
            .rounded {
                border-radius: 50%;
            }
            .p-0 {
                padding: 1px;
            }
            .my-btn {
                border: unset;

            }
        </style>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.v3.3.7.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../js/sb-admin-2.min.js"></script>
        <script src="../js/trumbowyg.min.js"></script>
        <script src="../js/trumbowyg.colors.min.js"></script>
        <script type="text/javascript" src="../js/tr.min.js"></script>
        <script>
        $.trumbowyg.svgPath = '../images/icons.svg';
        $('.trumbowyg').trumbowyg({
            lang: 'tr',
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['foreColor', 'backColor']
            ]
        });

        function cocugunBilgileriniCek() {
            let id = $('#cocuk_id').val();
            if (id==="") return;
            let data= {
                    "id": id,
                    "yetkili_id":<?=$_SESSION["kullanici_id"]?>
                };

            fetch('cocukbilgileri.php', {
                method: 'POST', // or 'PUT'
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem:"getir",
                    id: id,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>
                }),
            })
            .then(response => response.json())
            .then(data => {
                    $("#ad").val(data.ad);
                    $("#yetkili_adi").val(data.yetkili_adi);
                    $("#iletisim").val(data.iletisim);
                    $("#sma_tip").val(data.sma_tip);
                    $("#valilik_izin_baslangic").val(data.valilik_izin_baslangic);
                    $("#valilik_izin_bitis").val(data.valilik_izin_bitis);
                    $("#toplanacak").val(data.toplanacak);
                    $("#toplanan").val(data.toplanan);
                    $("#birim").val(data.birim);
                    $("#kisa_aciklama").val(data.kisa_aciklama);
                    $("#kisa_aciklama").prev().html(data.kisa_aciklama);
                    $("#aciklama").val(data.aciklama);
                    $("#aciklama").prev().html(data.aciklama);
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        
        }

        function kaydet() {
            
            let id = $('#cocuk_id').val();
            let method=(id==="")?'POST':'PUT';

            fetch('cocukbilgileri.php', {
                method: method,
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem:"genelbilgiler",
                    id: id,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>,
                    ad: $("#ad").val(),
                    yetkili_adi: $("#yetkili_adi").val(),
                    iletisim: $("#iletisim").val(),
                    sma_tip: $("#sma_tip").val(),
                    valilik_izin_baslangic: $("#valilik_izin_baslangic").val(),
                    valilik_izin_bitis: $("#valilik_izin_bitis").val(),
                    toplanacak: $("#toplanacak").val(),
                    toplanan: $("#toplanan").val(),
                    birim: $("#birim").val(),
                    kisa_aciklama: $("#kisa_aciklama").val(),
                    aciklama: $("#aciklama").val()
                })
            })
            .then(response => response.json())
            .then(data => {
                if (method=='POST'&&data!=0) {
                    $('#cocuk_id').append('<option value='+data+'>'+$("#ad").val()+'</option>');
                    $('#cocuk_id').val(data);
                    alert("Kayıt Başarılı");
                } else if(method=='PUT'&&data==1){
                    alert("Kayıt Başarılı");
                } else {
                    alert("Birşeyler Ters Gitti!");
                }
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }
        </script>
    </body>
</html>