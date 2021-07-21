 <?php
include 'util/connect.php';

$param        = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'ad-ASC';
$orderBy      = strstr($param, '-', true);
$siralamaTipi = substr(strstr($param, '-'), 1);
// MySQL query that selects all the images
$query        = "SELECT * FROM cocuk ORDER BY {$orderBy} {$siralamaTipi}";
$stmt         = $db->query($query);
$cocuklar     = $stmt->fetchAll(PDO::FETCH_ASSOC);
 

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
      <title>Çocuklarımız</title>
      <link rel="stylesheet" href="css/nicepage.css" media="screen">
      <link rel="stylesheet" href="css/cocuklarimiz.css" media="screen">
      <link rel="stylesheet" href="css/custom.css" media="screen">
      <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
      <meta name="generator" content="Nicepage 3.15.3, nicepage.com">
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
         <div class="content home">
            <h3 class="baslik">TÜM ÇOCUKLARIMIZ</h3>
            <div class="arama row">
               <div class="col-lg-4"><input type="text" id="ara" class="form-control" placeholder="Ara" ></div>
               <!--<button class="fas fa-search btn btn-circle btn-warning arama-butonu">Ara</button>-->
               <div class="col-lg-4">
               <div class="input-group">
                  <select name="" class="form-control" id="siralama_secenekleri" style="z-index: 99;">
                     <option selected="" disabled="">Sıralama Seçiniz</option>
                     <option <?php if ($param=="ad-ASC") { echo "selected"; } ?> value="ad-ASC">İsim(Alfabetik)</option>
                     <option <?php if ($param=="ad-DESC") { echo "selected"; } ?> value="ad-DESC">İsim(Ters)</option>
                     <option <?php if ($param=="sma_tip-ASC") { echo "selected"; } ?> value="sma_tip-ASC">SMA Tipi(Artan)</option>
                     <option <?php if ($param=="sma_tip-DESC") { echo "selected"; } ?> value="sma_tip-DESC">SMA Tipi(Azalan)</option>
                     <option <?php if ($param=="yuzde-ASC") { echo "selected"; } ?> value="yuzde-ASC">Toplanan Yüzde(Artan)</option>
                     <option <?php if ($param=="yuzde-DESC") { echo "selected"; } ?> value="yuzde-DESC">Toplanan Yüzde(Azalan)</option>
                     <option <?php if ($param=="valilik_izin_bitis-ASC") { echo "selected"; } ?> value="valilik_izin_bitis-ASC">Kampanya Bitiş Tarihi(Artan)</option>
                     <option <?php if ($param=="valilik_izin_bitis-DESC") { echo "selected"; } ?> value="valilik_izin_bitis-DESC">Kampanya Bitiş Tarihi(Azalan)</option>
                  </select>
                  <i class="fas fa-sort-amount-down-alt bg-primary text-light sirala" disabled></i>
               </div>
               </div>
            </div>
            <div class="cocuklar">
               <?php foreach ($cocuklar as $cocuk): ?>
                  <?php if (file_exists($cocuk['resim_url'])): ?>
                  <a href="/smakardesim/cocugumuz.php?id=<?=$cocuk['id'] ?>" data-title="<?=$cocuk['ad'] ?>" class="cocuk-class">
                     <img src="<?=$cocuk['resim_url'] ?>" alt="<?=$cocuk['kisa_aciklama'] ?>" data-id="<?=$cocuk['id'] ?>" data-title="<?=$cocuk['ad'] ?>" width="450" height="300">
                     <span class="cocuk cocuk-ad badge"><?=$cocuk['ad'] ?></span>
                     <div class="cocuk-sma-tipi">
                        <span class="badge badge-pill bg-info"><?=$cocuk['sma_tip'] ?></span>
                        <span class="badge badge-pill <?php echo yuzdeRozeti($cocuk["yuzde"])?>">%<?=$cocuk['yuzde'] ?></span>
                        <span class="badge badge-pill bg-secondary"><?=$cocuk['valilik_izin_bitis'] ?></span>
                     </div>
                     <span class="cocuk cocuk-aciklama"><?=$cocuk['kisa_aciklama'] ?></span>
                  </a>
                  <?php endif; ?>
               <?php endforeach; ?>
            </div>
         </div>
         <footer class="u-align-left u-clearfix u-footer" id="sec-0463">
            <div class="u-clearfix u-sheet u-sheet-1"></div>
         </footer>
      </main>
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script>
         $(function() {
             $('#ara').keyup(function() {
                 var val = $(this).val().toLowerCase();

                 $(".cocuk-class").hide();

                 $(".cocuk-class").each(function() {
                     var text = $(this).attr("data-title").toLowerCase();
                     if (text.indexOf(val) != -1) {

                         $(this).show();
                     }
                 });
             });
         });

         $('select').on('change', function () {
            window.location.href="/smakardesim/cocuklarimiz.php?orderBy="+this.value;
         });
      </script>
   </body>
</html>

