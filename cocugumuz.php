<?php include 'util/connect.php'; ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$cocuk = $db->query("SELECT * FROM cocuk WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
$bankalar = $db->query("SELECT * FROM bankaBilgileri WHERE cocuk_id = '{$id}'");
?>

<?php
$orijinalFormat = 'Y-m-d';
$orijinalZamanDamgasiFormat = 'Y-m-d H:i:s'
?>

<?php
function yuzdeRozeti($value)
{
    if ((int) $value <= 30) {
        return "bg-danger";
    } elseif ((int) $value <= 60) {
        return "bg-warning";
    } else {
        return "bg-success";
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>İsim Soyisim</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/cocuklarimiz.css" media="screen">
    <link rel="stylesheet" href="css/custom.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.15.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/anasayfa.css" media="screen">
    <link rel="stylesheet" href="css/card/main.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "SMA Kardeşim",
            "url": "index.php",
            "logo": "images/default-logo.png"
        }
    </script>
    <meta property="og:title" content="Çocuklarımız">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.php">
    <meta property="og:url" content="index.php">
</head>

<body class="u-body">
    <main>
        <header class="u-clearfix u-header u-header" id="sec-2c14">
            <div class="u-clearfix u-sheet u-sheet-1">
                <a href="/" class="u-image u-logo u-image-1">
                    <img src="images/smaKardesimLogo.svg" class="u-logo-image u-logo-image-1">
                </a>
                <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                    <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
                        <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                            <svg>
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                            </svg>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                                        <rect y="1" width="16" height="2"></rect>
                                        <rect y="7" width="16" height="2"></rect>
                                        <rect y="13" width="16" height="2"></rect>
                                    </symbol>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="u-custom-menu u-nav-container">
                        <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                            <li class="u-nav-item"><a class="u-active-palette-1-base u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white" href="index.php" style="padding: 10px 20px;">Anasayfa</a>
                            </li>
                            <li class="u-nav-item"><a class="u-active-palette-1-base u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white" href="biz-kimiz.php" style="padding: 10px 20px;">BİZ KİMİZ</a>
                            </li>
                            <li class="u-nav-item"><a class="u-active-palette-1-base u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white" href="iletisim.php" style="padding: 10px 20px;">İLETİŞİM</a>
                            </li>
                            <li class="u-nav-item"><a class="u-active-palette-1-base u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white" style="padding: 10px 20px;">GİRİŞ YAP</a>
                            </li>
                        </ul>
                    </div>
                    <div class="u-custom-menu u-nav-container-collapse">
                        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                            <div class="u-sidenav-overflow">
                                <div class="u-menu-close"></div>
                                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php" style="padding: 10px 20px;">Anasayfa</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="biz-kimiz.php" style="padding: 10px 20px;">BİZ KİMİZ</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="iletisim.php" style="padding: 10px 20px;">İLETİŞİM</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link" style="padding: 10px 20px;">GİRİŞ YAP</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="u-clearfix u-section-3" id="sec-468f">
            <h1 class="u-text u-title"><?= $cocuk["ad"] ?></h1>
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= $cocuk["resim_url"] ?>" class="w-100">
                        <div class="d-flex justify-content-between mt-2">
                            <!-- modal  -->
                            <!-- Button trigger modal -->

                            <button id="kardes-ol-butonu" onclick="kardesSayisiArttir()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">SMA Kardeşim Ol <i class="fas fa-heart text-danger"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bana Kardeş Olduğun İçin Teşekkür Ederim</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="row">
                                                        <form>
                                                            <label for="card-form-title"><b>İsim Soyisim:</b></label>
                                                            <input type="text" id="card-form-title" class="form-control" name="card-form-title" />
                                                        </form>
                                                    </div>
                                                    <div id="card-container" class="mt-5">
                                                        <img id="card-image" class="img-fluid" src="<?= $cocuk["resim_url"] ?>" />
                                                        <img src="./images/smaKardesimLogo.svg" class="card-logo">
                                                        <p id="card-msg">
                                                            Ben <span id="card-title" class="card-font text-center">*********</span> olarak
                                                            <span class="card-font"><?= $cocuk["ad"] ?></span> isimli çocuğumuzu SMA KARDEŞİM
                                                            olarak seçtim ve destek vererek kardeş oldum. Sizde destek verip kardeş olmak istiyorsanız. <a href="smakardesim.com">smakardesim.com</a>'a giderek
                                                            çocuklarımıza destek vererek kardeş olabilirsiniz.
                                                        </p>
                                                        <img src="./images/qrCodesmakardesim.png" class="qr-code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="save-button-card" type="button" class="btn btn-primary">Belgeyi İndir</button>
                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal -->


                            <div class="p-2 rounded bg-info text-light">
                                <img src="images/kardes.svg" width="20" height="20" alt="">
                                <span class="kardes-sayisi"><?= $cocuk["kardes_sayisi"] ?> </span>Kardeş
                            </div>
                        </div>
                        <div hidden class="fb-share-button" data-href="https://smakardesim.com.com" data-quote="asdasdsadasd" data-layout="button_count" data-size="small">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Paylaş</a>
                        </div>
                        <button id="facebook_share_btn" class="mt-1 share-btn"><i class="fab fa-facebook"></i> Paylaş</button>
                        <button id="twitter_share_btn" class="mt-1 share-btn"><i class="fab fa-twitter"></i> Tweetle</button>
                    </div>
                    <div class="col-md-6 hidden-scroll-bar">
                        <table class="table table-striped text-light">
                            <tr>
                                <td>Yetkili Adı</td>
                                <td><span id="yetkili_adi"><?= $cocuk["yetkili_adi"] ?></span> <span id="yetkili_soyadi"><?= $cocuk["yetkili_soyadi"] ?></span></td>
                            </tr>
                            <tr>
                                <td>Faaliyet No</td>
                                <td><span id="faaliyet_no"><?= $cocuk["faaliyet_no"] ?></span> <button class="btn btn-info" onclick="valilikİzinKontrol()" data-toggle="modal" data-target="#valilik_izni_modal">SORGULA</button></td>
                            <tr>
                                <td>İletişim</td>
                                <td><?= $cocuk["iletisim"] ?></td>
                            </tr>
                            <tr>
                                <td>SMA Tipi</td>
                                <td><?= $cocuk["sma_tip"] ?></td>
                            </tr>
                            <tr>
                                <td>Valilik İzni Başlangıç-Bitiş Tarihi</td>
                                <td><?= DateTime::createFromFormat($orijinalFormat, $cocuk["valilik_izin_baslangic"])->format("d.m.Y")
                                        . "-" . DateTime::createFromFormat($orijinalFormat, $cocuk["valilik_izin_bitis"])->format("d.m.Y") ?></td>
                            </tr>
                            <tr>
                                <td>Toplanacak Miktar</td>
                                <td><?= $cocuk["toplanacak"] . $cocuk["birim"] ?></td>
                            </tr>
                            <tr>
                                <td>Toplanan Miktar</td>
                                <td><?= $cocuk["toplanan"] . $cocuk["birim"] ?>
                                    <span class="badge <?php echo yuzdeRozeti($cocuk["yuzde"]) ?>"><?= "%" . $cocuk["yuzde"] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Son Güncelleme Tarihi</td>
                                <td><?= DateTime::createFromFormat($orijinalZamanDamgasiFormat, $cocuk["guncelleme_ani"])->format("d.m.Y H:i:s") ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-striped table-info">
                                        <thead>
                                            <tr>
                                                <th>Banka Adı</th>
                                                <th>Para Birimi</th>
                                                <th>IBAN No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($banka = $bankalar->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?= $banka["banka"] ?></td>
                                                    <td><?= $banka["birim"] ?></td>
                                                    <td class="kopyalanabilir" data-bs-toggle="tooltip" data-bs-placement="top" title="Kopyalamak için tıklayınız" onload="tooltipTetikle($(this))">
                                                        <div class="d-flex iban-container">
                                                            <span><?= $banka["iban"] ?> </span>&nbsp;
                                                            <button class="btn btn-light d-inline kopyalanabilir"><i class="fas fa-copy"></i></button>
                                                        </div>
                                                    </td>
                                                    <td hidden=""><input type="text" class="iban-input" value="<?= $banka["iban"] ?>"></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row text-light mt-4">
                    <?php if (!empty($cocuk["hastalik_raporu_url"]) || !empty($cocuk["valilik_izni_url"])) { ?>
                        <h3 class="mt-4">Dokümanlar</h3>
                        <ul>

                            <?php if (!empty($cocuk["hastalik_raporu_url"])) { ?>
                                <li class="mx-4 belge-link"><a href="#hastalik_raporu">Hastalık Raporuna Git</a></li>
                            <?php } ?>

                            <?php if (!empty($cocuk["valilik_izni_url"])) { ?>
                                <li class="mx-4 belge-link"><a href="#valilik_izni">Valilik İzin Belgesi'ne Git</a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <h3 class="mt-4">Detaylı Bilgi</h3>
                    <article id="expalaination"><?= $cocuk["aciklama"] ?></article>
                    <?php if (!empty($cocuk["hastalik_raporu_url"])) {  ?>
                        <a href="<?= $cocuk["hastalik_raporu_url"] ?>" class="mt-4">Hastalık Raporu <i class="fas fa-download"></i></a><!-- TODO: Telefonda indirmek istiyor -->
                        <?php if ($cocuk["hastalik_raporu_turu"] == "pdf") { ?>
                            <div style="height: 500px;margin-bottom: 50px;">
                                <iframe id="hastalik_raporu" src="<?= $cocuk["hastalik_raporu_url"] ?>" width="100%" height="500px"></iframe>
                            </div>
                        <?php } else { ?>
                            <img src="<?= $cocuk["hastalik_raporu_url"] ?>" alt="<?= $cocuk["ad"] ?> Hastalık Raporu">
                    <?php }
                    } ?>

                    <?php if (!empty($cocuk["valilik_izni_url"])) { ?>
                        <a href="<?= $cocuk["valilik_izni_url"] ?>" class="mt-4">Valilik İzin Belgesi <i class="fas fa-download"></i></a>
                        <?php if ($cocuk["valilik_izin_turu"] == "pdf") {
                        ?>
                            <div style="height: 500px;margin-bottom: 50px;">
                                <iframe id="valilik_izni" src="<?= $cocuk["valilik_izni_url"] ?>" width="100%" height="500px"></iframe>
                            </div>
                        <?php } else { ?>
                            <img src="<?= $cocuk["valilik_izni_url"] ?>" alt="<?= $cocuk["ad"] ?> Valilik İzni">
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
        <footer class="u-align-left u-clearfix u-footer" id="sec-0463">
            <div class="u-clearfix u-sheet u-sheet-1"></div>
        </footer>



    </main>

    <!-- Modal -->
    <div class="modal fade show" id="valilik_izni_modal" tabindex="-1" role="dialog" aria-labelledby="valilikIzniLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Valilik İzin Detayı</h4>
                </div>
                <div class="modal-body scrollable">
                    <table class="table table-striped" id="valilik_sorgu_tablosu">
                        <thead>
                            <tr>
                                <th>Adı Soyadı</th>
                                <th>Faaliyet Kapsamı (İl-İlçe)</th>
                                <th>İzin Veren Makam</th>
                                <th>Yardım Toplama Amacı</th>
                                <th>Yardım Toplama Türü</th>
                                <th>Yardım Toplama Şekli</th>
                                <th>Yardım Toplama Başlangıç Tarihi</th>
                                <th>Yardım Toplama Bitiş Tarihi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.v3.3.7.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v11.0" nonce="0UA9fOjz"></script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '2801003133494146',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v11.0'
            });
        };
    </script>
    <script>
        document.getElementById('facebook_share_btn').onclick = function() {
            FB.ui({
                display: 'popup',
                method: 'share',
                href: 'http://smakardesim.com/cocugumuz.php?id=<?= $id ?>',
                quote: '<?= $cocuk["ad"] ?> artık benim SMA Kardeşim. Sen de bize katılmak istersen SMA Kardesim sitesinden <?= $cocuk["ad"] ?>\'i kardeş seçerek tedavisine destek olabilirsin.',
                description: "Donate us, please",

            }, function(response) {});
        }

        function panoyaKopyala($arg) {
            let elm = $arg.parent().find(".iban-input")[0];
            elm.select();
            elm.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Kopyalanan IBAN NO: " + elm.value);
        }


        function tooltipTetikle($arg) {
            var tooltip = new bootstrap.Tooltip($arg[0], {});
        }
    </script>

    <!-- Sma KArdeişm ol button fonksiyonu -->
    <script>
        function kardesSayisiArttir() {
            let cocuk = <?php echo (json_encode($cocuk)); ?>;
            $.ajax({
                type: "POST",
                url: "kardes_ol.php",
                data: {
                    cocuk: cocuk
                }
            })

        }

        function valilikİzinKontrol() {

            fetch('yonetim/valilik-izni-api.php', {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        islem: "izin_kontrol",
                        dataList: JSON.stringify({
                            "FaliyetNo": $('#faaliyet_no').text(),
                            "Ad": $('#yetkili_adi').text(),
                            "Soyad": $('#yetkili_soyadi').text()
                        })
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    $('#valilik_sorgu_tablosu tbody').html("");
                    for (datum of data.Data) {
                        $('#valilik_sorgu_tablosu tbody').append(
                            "<tr>" +
                            "<td>" + datum.YardimToplayanAd + "</td>" +
                            "<td>" + datum.FaaliyetKapsamiStr + "</td>" +
                            "<td>" + datum.IzinVerenMakamIlIlce + "</td>" +
                            "<td>" + datum.FaaliyetAmaciStr + "</td>" +
                            "<td>" + datum.YardimToplamaTuruStr + "</td>" +
                            "<td>" + datum.YardimToplamaSekliStr + "</td>" +
                            "<td>" + tarihFormatla(parseInt(datum.DtBaslangic.substring(6, 19))) + "</td>" +
                            "<td>" + tarihFormatla(parseInt(datum.DtBitis.substring(6, 19))) + "</td>" +
                            "</tr>"
                        );

                        console.log(datum.DtBaslangic.substring(6, 19));
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function tarihFormatla(tarih) {
            tarih = new Date(tarih);
            return sifirEkleme(tarih.getDate()) +
                "/" + (sifirEkleme(tarih.getMonth() + 1)) +
                "/" + tarih.getFullYear() +
                " " + sifirEkleme(tarih.getHours()) +
                ":" + sifirEkleme(tarih.getMinutes()) +
                ":" + sifirEkleme(tarih.getSeconds());
        }

        function sifirEkleme(n) {
            return n > 9 ? "" + n : "0" + n;
        }
    </script>
    <!-- Sma KArdeişm ol button fonksiyonu -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/cardModalJs.js"></script>

    <style>
        #facebook_share_btn {
            background: #2d4485;
        }

        #twitter_share_btn {
            background: #1da1f2;
        }

        .share-btn {
            border: none;
            border-radius: 3px;
            color: white;
        }

        #expalaination {
            text-align: justify;
        }

        .iban-container {
            cursor: pointer;
        }

        a,
        .belge-link {
            color: #6e0dbf;
            text-decoration: none;
            font-style: italic;
        }

        .scrollable {
            overflow: scroll;
        }
    </style>
</body>

</html>