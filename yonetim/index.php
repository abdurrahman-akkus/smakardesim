<?php
ob_start(); // bu olmayınca header Location çalışmıyor
?>
<?php 

session_start(); 
if(@$_SESSION ["girisKontrol"]==1) {
   
    header("Location: anasayfa.php");
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>SMA Kardeşim·Yönetim</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/smaKardesimLogo.svg"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index-util.css">
	<link rel="stylesheet" type="text/css" href="../css/index-main.css">
</head>
<body style="position:relative">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/background.png');">
			<div class="wrap-login100">
					<img src="../images/smaKardesimLogo.svg" class="login100-form-logo" >

					<span class="login100-form-title p-b-34 p-t-27">
						SMA Kardeşim Yönetim Girişi
					</span>
				<form id="giris_form" class="login100-form validate-form" method="POST" action="">


					<div class="wrap-input100 validate-input" data-validate = "Kullanıcı Adı bilgisi boş geçilemez...">
						<input class="input100" type="text" name="kullanici_adi" placeholder="Kullanıcı Adı">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input " data-validate="Şifre bilgisi boş geçilemez...">
						<input class="input100" type="password" name="sifre" placeholder="Şifre">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="submit">Giriş</button>
							
					</div>

				</form>

				<div id="kayit_form" class="login100-form validate-form d-none">


					<div class="wrap-input100 validate-input" data-validate = "Kullanıcı Adı bilgisi boş geçilemez...">
						<input class="input100" type="text" name="yeni_kullanici_adi" id="yeni_kullanici_adi" placeholder="Kullanıcı Adı">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="yeni_eposta" id="yeni_eposta" placeholder="E-Posta">
						<span class="focus-input100" data-placeholder="&#xf15a;"></span>
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="yeni_sifre" id="yeni_sifre" onchange="sifreKontrol()" placeholder="Şifre">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input " data-validate="Şifre bilgisi boş geçilemez...">
						<input class="input100" type="password" name="yeni_sifre_onay" id="yeni_sifre_onay" onchange="sifreKontrol()" placeholder="Şifre(Tekrar)">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="button" onclick="yeniKullaniciKayit()">Kayıt Ol</button>
					</div>

				</div>
				<input type="checkbox" onchange="panelDegistir()" id="panel_degistirici" hidden="">
				<label for="panel_degistirici" class="d-block w-100 text-right"><span id="giris_form_etiketi" class="d-none">Giriş Yap</span><span id="kayit_form_etiketi">Kayıt Ol</span></label>
			</div>
		</div>
	</div>

<script src="../js/jquery.js"></script>
<script>
	let seciliPanel = "#giris_form";
	function panelDegistir() {
		if (seciliPanel== "#giris_form") {
			$(seciliPanel).addClass("d-none");
			$(seciliPanel+"_etiketi").removeClass("d-none");
			seciliPanel="#kayit_form";
			$(seciliPanel).removeClass("d-none");
			$(seciliPanel+"_etiketi").addClass("d-none");
		} else {
			$(seciliPanel).addClass("d-none");
			$(seciliPanel+"_etiketi").removeClass("d-none");			
			seciliPanel="#giris_form";
			$(seciliPanel).removeClass("d-none");			
			$(seciliPanel+"_etiketi").addClass("d-none");
		}
		$('#gosterge').remove();
	}

	function sifreKontrol() {
		if($('#yeni_sifre_onay').val()==="")return;
		if($('#yeni_sifre').val()!==$('#yeni_sifre_onay').val()){
			$('#yeni_sifre').parent('.wrap-input100').addClass("invalid");
			$('#yeni_sifre_onay').parent('.wrap-input100').addClass("invalid");
			return false;
		} else {
			$('#yeni_sifre').parent('.wrap-input100').removeClass("invalid");
			$('#yeni_sifre_onay').parent('.wrap-input100').removeClass("invalid");
			return true;
		}
	}

	function yeniKullaniciKayit() {
		if (!sifreKontrol())return;

        fetch('kullanici-api.php', {
            method: 'POST', // or 'PUT'
            headers: {
            'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                kullanici_adi:$('#yeni_kullanici_adi').val(),
                eposta:$('#yeni_eposta').val(),
                sifre:$('#yeni_sifre').val()
            }),
        })
        .then(response => response.json())
        .then(data => {
                if(data==0){
					$('body').append(" <p id='gosterge' style = 'position:fixed;bottom:0;width:100%;z-index:9999;text-align : center; color: red';>Kayıt Gerçekleştirilemedi</p>");
					setTimeout(()=>{$('#gosterge').remove();},3000);
                }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
	}
</script>

<?php
require_once('../util/connect.php');
//session_start();

if(@$_POST ["submit"]) {
	$kadi=$_POST["kullanici_adi"];
	$sfre=$_POST["sifre"];
	$cek=$db->prepare("SELECT * FROM kullanici WHERE kullanici_adi=:kadi AND sifre=:sfre");
	$cek->bindValue(":kadi", $kadi, PDO::PARAM_STR);
	$cek->bindValue(":sfre", $sfre, PDO::PARAM_STR);
	$row=$cek->execute();

	if($row= $cek->fetch(PDO::FETCH_ASSOC)){
		$vt_kadi=$row["kullanici_adi"];
		$vt_sifre=$row["sifre"]; 
		$ytk=$row["yetki"];

		if($kadi == $vt_kadi && $sfre == $vt_sifre)
		{
			$_SESSION ["girisKontrol"] = 1; //giriş yapmış.
			$_SESSION ["kullanici_adi"] = $_POST ["kullanici_adi"];
			$_SESSION ["yetki"] = $ytk;
			$_SESSION ["kullanici_id"] = $row["id"];
			echo " <p style = 'text-align : center; color: black';> Giriş Başarılı </p>" ;

			header("Location:anasayfa.php");
			return true;
		}
		else{
			echo " <p id='gosterge' style = 'position:fixed;bottom:0;width:100%;z-index:9999;text-align : center; color: red';> Kullanıcı adı veya parola yanlış girildi </p>" ;
			return false;
		}
	} else{
		echo " <p id='gosterge' style = 'position:fixed;bottom:0;width:100%;z-index:9999;text-align : center; color: red';> Kullanıcı adı veya parola yanlış girildi </p>" ;
		return false;
		}
} else {
	if(@$_GET["info"] == "sessiondestroyed") 
	{
	
	echo " <p id='gosterge' style = 'position:fixed;bottom:0;width:100%;z-index:9999;text-align : center; color: green';> Başarı ile Çıkış Yaptınız </p>" ;
	}
	elseif (@$_GET["info"] == "nosession") {
	# code...
	echo " <p id='gosterge' style = 'position:fixed;bottom:0;width:100%;z-index:9999;text-align : center; color:red';> Öncelikle giriş yapmalısınız. </p>" ;
	}
}
?>
</body>
</html>