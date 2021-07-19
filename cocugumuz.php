<?php include 'util/connect.php'; ?>
<?php 
$id = isset($_GET['id'])?$_GET['id']:1; 
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
    if((int) $value<=30){
        return "bg-danger";
    } elseif ((int) $value<=60) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/anasayfa.css" media="screen">
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
                            <li class="u-nav-item"><a class="u-active-palette-1-base u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white" href="yonetim/index.php" style="padding: 10px 20px;">GİRİŞ YAP</a>
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
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="yonetim/index.php" style="padding: 10px 20px;">GİRİŞ YAP</a>
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
            <h1 class="u-text u-title"><?=$cocuk[ad]?></h1>
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?=$cocuk[resim_url]?>" class="w-100">
                        <div class="d-flex justify-content-between mt-2">
                            <button type="button" class="btn btn-primary">SMA Kardeşim Ol <i class="fas fa-heart text-danger"></i></button>
                            <div class="p-2 rounded bg-info text-light">
                                <img src="images/kardes.svg" width="20" height="20" alt=""> <?=$cocuk[kardes_sayisi]?> Kardeş
                            </div>
                        </div>
                        <div hidden class="fb-share-button" data-href="https://algoritimbilisim.com" data-quote="asdasdsadasd" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Paylaş</a></div>
                        <button id="facebook_share_btn" class="mt-1 share-btn"><i class="fab fa-facebook"></i> Paylaş</button>
                        <button id="twitter_share_btn" class="mt-1 share-btn"><i class="fab fa-twitter"></i> Tweetle</button>
                    </div>
                    <div class="col-md-6 hidden-scroll-bar">
                        <table class="table table-striped text-light">
                            <tr>
                                <td>Yetkili Adı</td>
                                <td><?=$cocuk[yetkili_adi]?></td>
                            </tr>
                            <tr>
                                <td>İletişim</td>
                                <td><?=$cocuk[iletisim]?></td>
                            </tr>
                            <tr>
                                <td>SMA Tipi</td>
                                <td><?=$cocuk[sma_tip]?></td>
                            </tr>
                            <tr>
                                <td>Valilik İzni Başlangıç-Bitiş Tarihi</td>
                                <td><?=DateTime::createFromFormat($orijinalFormat, $cocuk[valilik_izin_baslangic])->format("d.m.Y")
                                ."-".DateTime::createFromFormat($orijinalFormat,$cocuk[valilik_izin_bitis])->format("d.m.Y")?></td>
                            </tr>
                            <tr>
                                <td>Toplanacak Miktar</td>
                                <td><?=$cocuk[toplanacak].$cocuk[birim]?></td>
                            </tr>
                            <tr>
                                <td>Toplanan Miktar</td>
                                <td><?=$cocuk[toplanan].$cocuk[birim]?>
                                    <span class="badge <?php echo yuzdeRozeti($cocuk[yuzde])?>"><?="%".$cocuk[yuzde]?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Son Güncelleme Tarihi</td>
                                <td><?=DateTime::createFromFormat($orijinalZamanDamgasiFormat,$cocuk[guncelleme_ani])->format("d.m.Y H:i:s")?></td>
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
                                                <td><?=$banka[banka]?></td>
                                                <td><?=$banka[birim]?></td>
                                                <td class="kopyalanabilir" data-bs-toggle="tooltip" data-bs-placement="top" title="Kopyalamak için tıklayınız" onload="tooltipTetikle($(this))">
                                                    <div class="d-flex iban-container">
                                                        <span><?=$banka[iban]?> </span>&nbsp;
                                                        <button class="btn btn-light d-inline kopyalanabilir"><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </td>
                                                <td hidden=""><input type="text" class="iban-input" value="<?=$banka[iban]?>"></td>
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
                    <?php if (!empty($cocuk[hastalik_raporu_url])||!empty($cocuk[valilik_izni_url])) { ?>
                        <h3 class="mt-4">Dokümanlar</h3>
                        <ul>
                            
                        <?php if (!empty($cocuk[hastalik_raporu_url])) { ?>
                            <li class="mx-4 belge-link"><a href="#hastalik_raporu">Hastalık Raporuna Git</a></li>
                        <?php } ?>
                        
                        <?php if (!empty($cocuk[valilik_izni_url])) { ?>
                            <li class="mx-4 belge-link"><a href="#valilik_izni">Valilik İzin Belgesi'ne Git</a></li>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                    
                    <h3 class="mt-4">Detaylı Bilgi</h3>
                    <article id="expalaination"><?=$cocuk[aciklama]?></article>                    
                    <?php if (!empty($cocuk[hastalik_raporu_url])) { ?>
                        <a href="<?=$cocuk[hastalik_raporu_url] ?>" class="mt-4">Hastalık Raporu</a><!-- TODO: Telefonda indirmek istiyor -->
                        <div style="height: 500px;margin-bottom: 50px;">
                            <iframe id="hastalik_raporu" src="<?=$cocuk[hastalik_raporu_url] ?>" width="100%" height="500px"></iframe>
                        </div>
                    <?php } ?>
                    
                    <?php if (!empty($cocuk[valilik_izni_url])) { ?>          
                        <a href="<?=$cocuk[valilik_izni_url] ?>" class="mt-4">Valilik İzin Belgesi</a>
                        <div style="height: 500px;margin-bottom: 50px;">
                            <iframe id="valilik_izni" src="<?=$cocuk[valilik_izni_url] ?>" width="100%" height="500px"></iframe>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </section>
        <footer class="u-align-left u-clearfix u-footer" id="sec-0463">
            <div class="u-clearfix u-sheet u-sheet-1"></div>
        </footer>
    </main>
    <div id="fb-root"></div>
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
            href: 'http://smakardesim.com/cocugumuz.php?id=<?=$id?>',
            quote: '<?=$cocuk[ad]?> artık benim SMA Kardeşim. Sen de bize katılmak istersen SMA Kardesim sitesinden <?=$cocuk[ad]?>\'i kardeş seçerek tedavisine destek olabilirsin.',
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
    <style>
    #facebook_share_btn {
        background: #2d4485;
    }
    #twitter_share_btn {
        background:#1da1f2;
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
    a, .belge-link {
        color: #6e0dbf;
        text-decoration: none;
        font-style: italic;
    }
    </style>
</body>

</html>