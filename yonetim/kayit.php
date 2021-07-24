    <?php
    require_once '../util/connect.php';
    session_start();
    @$yetki = $_SESSION["yetki"];
    if (@$_SESSION ["girisKontrol"] != 1) {

        header("Location: index.php?info=nosession");
    }
    if ($yetki < 1) {

        header("Location: anasayfa.php");
    }


    $cocuklarQuery = $db->query("SELECT * FROM cocuk WHERE yetkili_kullanici = '{$_SESSION ["kullanici_id"]}'");


    $cocuklar = array();
    while ($cocuk = $cocuklarQuery->fetch(PDO::FETCH_ASSOC)) {
        array_push($cocuklar, $cocuk);
    }
    $cocukSayisi = sizeof($cocuklar);
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                                <select name="" id="cocuk_id" class="form-control" onchange="bilgileriCek();">
                                    <option value="">Yeni Kayıt</option>
                                    <?php foreach ($cocuklar as $cocuk) { ?>
                                        <option value="<?= $cocuk["id"] ?>"><?= $cocuk["ad"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <h3 style="margin-left: 1rem;"> Genel Bilgiler</h3>
                                <form role="form" id="genel_bilgiler" action="" method='POST' enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Çocuğun Adı</label>
                                            <input class="form-control" name="ad" id="ad" required placeholder="Çocuğun Adı">
                                        </div>
                                        <div class="form-group">
                                            <label>SMA Tipi</label>
                                            <select name="sma_tip" id="sma_tip" class="form-control">
                                                <option value="SMA-1">SMA-1</option>
                                                <option value="SMA-2">SMA-2</option>
                                                <option value="SMA-3">SMA-3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Yetkili Adı</label>
                                            <input class="form-control" name="yetkili_adi" id="yetkili_adi"
                                            placeholder="Yetkili Adı" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Yetkili Soyadı</label>
                                            <input class="form-control" name="yetkili_soyadi" id="yetkili_soyadi"
                                            placeholder="Yetkili Soyadı" required>
                                        </div>
                                        <div class="form-group">
                                            <label title="Valilik İzin Formu'nda bulunan faaliyet kodunu girmeniz gerekmektedir. Aksi halde kaydınız onaylanmayacaktır.">Faaliyet Kodu <i class="far fa-question-circle"></i></label>
                                            <input class="form-control" name="faaliyet_no" id="faaliyet_no"
                                            placeholder="Valilik İzin Faaliyet No" required onchange="valilikİzinKontrol()">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefon No</label>
                                            <input class="form-control" name="iletisim" id="iletisim"
                                            placeholder="+90 123 456 78 90">
                                        </div>
                                        <div class="form-group">
                                            <label>Valilik İzin Başlangıcı</label>
                                            <input type="date" class="form-control" name="valilik_izin_baslangic"
                                            id="valilik_izin_baslangic" placeholder="01.01.2021" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Valilik İzin Başlangıcı</label>
                                            <input type="date" class="form-control" name="valilik_izin_bitis"
                                            id="valilik_izin_bitis" placeholder="01.06.2021" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Toplanacak</label>
                                            <input type="number" class="form-control" name="toplanacak" id="toplanacak" value="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Toplanan</label>
                                            <input type="number" class="form-control" name="toplanan" id="toplanan" value="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Para Birimi</label>
                                            <select name="birim" id="birim" class="form-control">
                                                <option value="USD">$ Amerikan Doları</option>
                                                <option value="EUR">€ Euro</option>
                                                <option value="TRY">₺ Türk Lirası</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="kisa_aciklama_blogu">
                                            <label>Kısa Açıklama</label>
                                            <textarea class="form-control trumbowyg" name="kisa_aciklama" id="kisa_aciklama"
                                            placeholder="Çocuğumuzla ilgili kısa özet bilgi veriniz. En fazla 255 karakterle sınırlıdır."
                                            rows="3"></textarea>
                                            <span class="alert">Kalan Karakter Sayısı: <span id="kisa_aciklama_uzunlugu_kalan">255</span></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control trumbowyg" name="aciklama" id="aciklama"
                                            placeholder="Çocuğumuzla ilgili genel bilgi veriniz. Çocuğumuzun hikayesini paylaşarak SMA kardeşi adaylarının çocuğumuzu doğru tanımasına yardımcı olunuz."
                                            rows="8"></textarea>
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
                                        <input form="genel_bilgiler" type="file" required class="form-control" name="resim" id="resim" accept=".jpg, .jpeg, .png">
                                        <div class="input-group mt-2">
                                            <span id="foto_yukle_buton" class="input-group-addon btn">Yükle</span> 
                                            <input form="genel_bilgiler" readonly id="resim_url" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hastalık Raporu Formatı</label>
                                        <div class="radio">
                                            <label>
                                                <input form="genel_bilgiler" type="radio" name="hastalik_raporu_turu" value="pdf" checked onclick="kabulTuruDegistir($(this),'#hastalik_raporu')">PDF
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input form="genel_bilgiler" type="radio" name="hastalik_raporu_turu" value="image" onclick="kabulTuruDegistir($(this),'#hastalik_raporu')">Resim
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hastalık Raporu</label>
                                        <input form="genel_bilgiler" type="file" required class="form-control" id="hastalik_raporu" accept=".pdf">
                                        <div class="input-group mt-2">
                                            <span id="rapor_yukle_buton" class="input-group-addon btn">Yükle</span> 
                                            <input form="genel_bilgiler" readonly id="hastalik_raporu_url" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valilik İzni Formatı</label>
                                        <div class="radio">
                                            <label>
                                                <input form="genel_bilgiler" type="radio" name="valilik_izin_turu" value="pdf" checked onclick="kabulTuruDegistir($(this),'#valilik_izni')">PDF
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input form="genel_bilgiler" type="radio" name="valilik_izin_turu" value="image" onclick="kabulTuruDegistir($(this),'#valilik_izni')">Resim
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Valilik İzni</label>
                                        <input form="genel_bilgiler" type="file" required class="form-control" id="valilik_izni" name="valilik_izni" accept=".pdf">
                                        <div class="input-group mt-2">
                                            <span id="izin_yukle_buton" class="input-group-addon btn">Yükle</span> 
                                            <input form="genel_bilgiler" readonly id="valilik_izni_url" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="button" value="Kaydet" class="btn btn-success"
                                    onclick="kaydet()">
                                    <button type="reset" class="btn btn-warning" form="genel_bilgiler">Temizle</button>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                            <hr>
                            <div class="row mt-4">
                                <form id="banka_form">
                                    <h3 style="margin-left: 1rem;"> Banka Bilgileri</h3>
                                    <div class="col-lg-6">
                                        <input readonly id="banka_id" hidden></input>
                                        <div class="form-group">
                                            <label>Banka</label>
                                            <input class="form-control" id="banka" placeholder="Banka Adı">
                                        </div>
                                        <div class="form-group">
                                            <label>Para Birimi</label>
                                            <select id="banka_birim" class="form-control">
                                                <option value="USD">$ Amerikan Doları</option>
                                                <option value="EUR">€ Euro</option>
                                                <option value="TRY">₺ Türk Lirası</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>IBAN</label>
                                            <input class="form-control" id="iban" placeholder="IBAN Numarası">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="button" value="Kaydet" class="btn btn-success"
                                    onclick="bankaBilgisiKaydet()">
                                    <button type="reset" class="btn btn-primary" form="banka_form">Yeni</button>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="padding-right: 15px;padding-left: 15px;">
                                <div class="col-12" >
                                    <table id="banka_tablosu" class="table table-striped table-info">
                                        <thead>
                                            <tr>
                                                <th>Banka Adı</th>
                                                <th>Para Birimi</th>
                                                <th>IBAN No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

    #kisa_aciklama_blogu .trumbowyg-editor,
    #kisa_aciklama_blogu .trumbowyg-box {
        min-height: 10px !important;
    }

    .form-control {
        line-height: 1.42857143 !important;
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
        let MIME_TYPES = {
            pdf:".pdf",
            image:".jpg, .jpeg, .png"
        }
        // file upload kısmı
        $("#izin_yukle_buton").click(function () { //dosya seçildiğinde
            if(!tekilUygunlukKontrolu($("#ad")[0])) return; // Çocuk İsmi Kontrol Edilir
            if(!tekilUygunlukKontrolu($("#valilik_izni")[0])) return; // Dosya'nın varlığı kontrol edilir.
            var file_button = $(this); //butonu al
            var my_files = document.getElementById("valilik_izni"); //valilik_izni id li elemanı al, file input
            if (my_files.files && my_files.files[0]) { //dosya var ise
                var reader = new FileReader(); //FileReader class kur
                reader.onload = function () { //veriyi yükle
                    var file_data = reader.result; //dosya verisi
                    $.ajax({ //dosya data sını ajax.php ye postala
                        url: "upload_file.php",
                        type: "POST",
                        data: {"veri": file_data,"tur":"valilik-izni","cocuk":$("#ad").val().replace(" ","-")},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.message == "success") {
                                if ($('[name="valilik_izin_turu"]:checked').val()=="image") {
                                    file_button.after('<img class="yuklenen" src="' + file_data + '" width="350px">'); //file input elemanının sonrasına ekle
                                } else {
                                    file_button.after('<iframe class="yuklenen" src="' + file_data + '" width="350px" frameborde="0">'); //file input elemanının sonrasına ekle
                                }

                                $('#valilik_izni_url').val(data.path);
                            } else {
                                alert(data.message); //hata mesajini goster
                            }
                        }
                    });
                }
                reader.readAsDataURL(my_files.files[0]); //oku
            }
        });
        $("#rapor_yukle_buton").click(function () { //dosya seçildiğinde
            if(!tekilUygunlukKontrolu($("#ad")[0])) return; // Çocuk İsmi Kontrol Edilir
            if(!tekilUygunlukKontrolu($("#hastalik_raporu")[0])) return; // Dosya'nın varlığı kontrol edilir.
            var file_button = $(this); //butonu al
            var my_files = document.getElementById("hastalik_raporu"); //hastalik_raporu id li elemanı al, file input
            if (my_files.files && my_files.files[0]) { //dosya var ise
                var reader = new FileReader(); //FileReader class kur
                reader.onload = function () { //veriyi yükle
                    var file_data = reader.result; //dosya verisi
                    $.ajax({ //dosya data sını ajax.php ye postala
                        url: "upload_file.php",
                        type: "POST",
                        data: {"veri": file_data,"tur":"hastalık-raporu","cocuk":$("#ad").val().replace(" ","-")},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.message == "success") {
                                if ($('[name="hastalik_raporu_turu"]:checked').val()=="image") {
                                    file_button.after('<img class="yuklenen" src="' + file_data + '" width="350px">'); //file input elemanının sonrasına ekle
                                } else {
                                    file_button.after('<iframe class="yuklenen" src="' + file_data + '" width="350px" frameborde="0">'); //file input elemanının sonrasına ekle
                                }
                                $('#hastalik_raporu_url').val(data.path);
                            } else {
                                alert(data.message); //hata mesajini goster
                            }
                        }
                    });
                }
                reader.readAsDataURL(my_files.files[0]); //oku
            }
        });
        let resim_path = "";
        $("#foto_yukle_buton").click(function () { //dosya seçildiğinde
            if(!tekilUygunlukKontrolu($("#ad")[0])) return; // Çocuk İsmi Kontrol Edilir
            if(!tekilUygunlukKontrolu($("#resim")[0])) return; // Dosya'nın varlığı kontrol edilir.
            var file_button = $(this); //butonu al
            var my_files = document.getElementById("resim"); //resim id li elemanı al, file input
            if (my_files.files && my_files.files[0]) { //dosya var ise
                var reader = new FileReader(); //FileReader class kur
                reader.onload = function () { //veriyi yükle
                    var file_data = reader.result; //dosya verisi
                    $.ajax({ //dosya data sını ajax.php ye postala
                        url: "upload_file.php",
                        type: "POST",
                        data: {"veri": file_data,"tur":"fotograf","cocuk":$("#ad").val().replace(" ","-")},
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.message == "success") {
                                resim_path = data.path
                                file_button.after('<img class="yuklenen" src="' + file_data + '" width="350px">'); //file input elemanının sonrasına ekle
                                $('#resim_url').val(data.path);
                            } else {
                                alert(data.message); //hata mesajini goster
                            }
                        }
                    });
                }
                reader.readAsDataURL(my_files.files[0]); //oku
            }
        });
        // file upload kısmı


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

        function bilgileriCek() {
            document.getElementById("genel_bilgiler").reset();
            editoruTemizle($("#kisa_aciklama"));
            editoruTemizle($("#aciklama"));
            $(".yuklenen").remove();
            document.getElementById("banka_form").reset();
            cocugunBilgileriniCek();
            bankaBilgileriniCek();
        }

        function cocugunBilgileriniCek() {
            let id = $('#cocuk_id').val();
            if (id === "") return;
            let data = {
                "id": id,
                "yetkili_id":<?=$_SESSION["kullanici_id"]?>
            };

            fetch('cocuk-api.php', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "getir",
                    id: id,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>
                }),
            })
            .then(response => response.json())
            .then(data => {
                $("#ad").val(data.ad);
                $("#yetkili_adi").val(data.yetkili_adi);
                $("#yetkili_soyadi").val(data.yetkili_soyadi);
                $("#faaliyet_no").val(data.faaliyet_no);
                $("#iletisim").val(data.iletisim);
                $("#sma_tip").val(data.sma_tip);
                $("#valilik_izin_baslangic").val(data.valilik_izin_baslangic);
                $("#valilik_izin_bitis").val(data.valilik_izin_bitis);
                $("#toplanacak").val(data.toplanacak);
                $("#toplanan").val(data.toplanan);
                $("#birim").val(data.birim);
                $("#kisa_aciklama").val(data.kisa_aciklama);
                $("#kisa_aciklama").prev().html(data.kisa_aciklama);
                karakterKontrol();
                $("#aciklama").val(data.aciklama);
                $("#aciklama").prev().html(data.aciklama);
                $('#valilik_izni_url').val(data.valilik_izni_url);
                $('#hastalik_raporu_url').val(data.hastalik_raporu_url);
                $('#resim_url').val(data.resim_url);
                $('[name="hastalik_raporu_turu"][value="'+data.hastalik_raporu_turu+'"]').prop("checked",true);
                $('[name="valilik_izin_turu"][value="'+data.valilik_izin_turu+'"]').prop("checked",true);
                $('#valilik_izni').attr("accept", MIME_TYPES[data.valilik_izin_turu]);
                $('#hastalik_raporu').attr("accept", MIME_TYPES[data.hastalik_raporu_turu]);
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        }

        function bankaBilgileriniCek() {
            let cocuk_id = $('#cocuk_id').val();
            if (cocuk_id === "") return;
            let data = {
                "cocuk_id": cocuk_id,
                "yetkili_id":<?=$_SESSION["kullanici_id"]?>
            };

            fetch('banka-api.php', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "getir",
                    cocuk_id: cocuk_id,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                bankaTablosuDoldur(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        }

        function kaydet() {
            let $elemanlar = $("#genel_bilgiler").find('input');
            for(let e=0;e<$elemanlar.length;e++) {
                if(!tekilUygunlukKontrolu($elemanlar[e])) return;
            }

            let id = $('#cocuk_id').val();
            let method = (id === "") ? 'POST' : 'PUT';
            let yuzde = $("#toplanan").val()*100/$("#toplanacak").val();

            fetch('cocuk-api.php', {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "genelbilgiler",
                    id: id,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>,
                    ad: $("#ad").val(),
                    yetkili_adi: $("#yetkili_adi").val(),
                    yetkili_soyadi: $("#yetkili_soyadi").val(),
                    faaliyet_no: $("#faaliyet_no").val(),
                    iletisim: $("#iletisim").val(),
                    sma_tip: $("#sma_tip").val(),
                    valilik_izin_baslangic: $("#valilik_izin_baslangic").val(),
                    valilik_izin_bitis: $("#valilik_izin_bitis").val(),
                    valilik_izni_url: $('#valilik_izni_url').val(),
                    hastalik_raporu_url: $("#hastalik_raporu_url").val(),
                    resim_url: $('#resim_url').val(),
                    toplanacak: $("#toplanacak").val(),
                    toplanan: $("#toplanan").val(),
                    yuzde: parseInt(yuzde),
                    birim: $("#birim").val(),
                    kisa_aciklama: $("#kisa_aciklama").val(),
                    aciklama: $("#aciklama").val(),
                    hastalik_raporu_turu: $('[name="hastalik_raporu_turu"]:checked').val(),
                    valilik_izin_turu: $('[name="valilik_izin_turu"]:checked').val(),
                    tamamlandi_mi:(yuzde>=100?1:0)
                })
            })
            .then(response => response.json())
            .then(data => {
                if (method == 'POST' && data != 0) {
                    $('#cocuk_id').append('<option value=' + data + '>' + $("#ad").val() + '</option>');
                    $('#cocuk_id').val(data);
                    alert("Kayıt Başarılı");
                } else if (method == 'PUT' && data == 1) {
                    alert("Kayıt Başarılı");
                } else {
                    alert("Birşeyler Ters Gitti!");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        function bankaBilgisiKaydet() {

            let bankaId = $('#banka_id').val();
            let method = (bankaId === "") ? 'POST' : 'PUT';

            fetch('banka-api.php', {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "banka",
                    id: bankaId,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>,
                    cocuk_id: $('#cocuk_id').val(),
                    banka: $('#banka').val(),
                    birim: $('#banka_birim').val(),
                    iban: $('#iban').val()
                })
            })
            .then(response => response.json())
            .then(data => {
                if (method == 'POST' && data != 0) {
                    $('#banka_id').val(data);
                    //alert("Kayıt Başarılı");
                    bankaBilgileriniCek();

                } else if (method == 'PUT' && data == 1) {
                    //alert("Kayıt Başarılı");
                    bankaBilgileriniCek();
                } else {
                    alert("Birşeyler Ters Gitti!");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        function tekilUygunlukKontrolu($elm) {
            if($elm.checkValidity()) return true;
            $elm.reportValidity();
            return false;
        }

        function kabulTuruDegistir(_this, arg) {
            $(arg).attr("accept", MIME_TYPES[$('[name="' + _this.attr("name") + '"]:checked').val()]);
        }

        function bankaTablosuDoldur(data) {
            $('#banka_tablosu tbody').html("");
            for(datum of data){
                $('#banka_tablosu tbody').append("<tr>"
                    +"<td class='id-satiri' hidden>"+datum.id+"</td>"
                    +"<td class='banka-satiri'>"+datum.banka+"</td>"
                    +"<td class='birim-satiri'>"+datum.birim+"</td>"
                    +"<td class='iban-satiri'>"+datum.iban+"</td>"
                    +"<td><button onclick='bankaBilgisiDuzenle($(this))' class='btn btn-info'><i class='far fa-edit'></i></button> "
                    +"<button onclick='bankaBilgisiSil($(this))' class='btn btn-danger'><i class='far fa-trash-alt'></i></button></td>"
                    +"</tr>");
            }
        }

        function bankaBilgisiDuzenle($arg) {
            let $parent = $arg.parents('tr');
            $('#banka_id').val($parent.find('.id-satiri').text());
            $('#banka').val($parent.find('.banka-satiri').text());
            $('#banka_birim').val($parent.find('.birim-satiri').text());
            $('#iban').val($parent.find('.iban-satiri').text());
        }

        function bankaBilgisiSil($arg){

            let bankaId = $arg.parents("tr").find('.id-satiri').text();

            fetch('banka-api.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "sil",
                    id: bankaId,
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>
                })
            })
            .then(response => response.json())
            .then(data => {
                if ( data == 1) {
                    bankaBilgileriniCek();
                } else {
                    alert("Birşeyler Ters Gitti!");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        }

        function editoruTemizle($arg) {
            $arg.prev(".trumbowyg-editor").html("");
        }

        const istisnaTuslar = ["Delete","Backspace","ArrowLeft","ArrowRight","ArrowDown","ArrowUp","Home","End"];

        // Editör içerisinde kısa açıklama sınırlandırılamadığı için burada ayrıca kodla işlem engellenmiştir.
        $(document).on("keydown", "#kisa_aciklama_blogu .trumbowyg-editor", function(event) {

          var element = $(this);

          if (event.type == "keydown") {

            var maximumLength = 254;
            var currentLength = element.text().length;
              
            if (currentLength > maximumLength) {
                //$('#kisa_aciklama_uzunlugu_kalan').text(maximumLength-currentLength);
                if (istisnaTuslar.includes(event.key)) return; // İstisna tuşlara basılırsa tuş özeliğini kullanmaya devam eder.
                event.preventDefault();
            }
            
          }

        });

        // Editör içerisinde kısa açıklama sınırlandırılamadığı için burada ayrıca kodla işlem engellenmiştir.
        $(document).on("keyup", "#kisa_aciklama_blogu .trumbowyg-editor", function(event) {


          if (event.type == "keyup") {

            karakterKontrol();
            
          }

        });

        function karakterKontrol() {
            var element = $("#kisa_aciklama_blogu .trumbowyg-editor");
            var maximumLength = 254;
            var currentLength = element.text().length;
              
            if (currentLength > maximumLength + 1) {
                $('#kisa_aciklama_uzunlugu_kalan').parent().addClass("alert-danger");
            } else {
                $('#kisa_aciklama_uzunlugu_kalan').parent().removeClass("alert-danger");
            }
            $('#kisa_aciklama_uzunlugu_kalan').text(maximumLength-currentLength+1);
        }

        function valilikİzinKontrol() {
            
            fetch('valilik-izni-api.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    islem: "izin_kontrol",
                    yetkili_id:<?=$_SESSION["kullanici_id"]?>,
                    dataList: JSON.stringify({
                        "FaliyetNo":$('#faaliyet_no').val(),
                        "Ad":$('#yetkili_adi').val(),
                        "Soyad":$('#yetkili_soyadi').val()
                    })
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
    </body>
    </html>