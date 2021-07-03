
<?php 

session_start(); 
if(@$_SESSION ["girisKontrol"]==1) {
   
    header("Location: anasayfa.php");
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Sinaps IK·Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/smaKardesimLogo.svg"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->	
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/index-util.css">
	<link rel="stylesheet" type="text/css" href="../css/index-main.css">
<!--===============================================================================================-->
</head>
<body style="position:relative">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/background.png');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="">
					<img src="../images/smaKardesimLogo.svg" class="login100-form-logo" >

					<span class="login100-form-title p-b-34 p-t-27">
						Sinaps İnsan Kaynakları
					</span>

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
			</div>
		</div>
	</div>


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
		$_SESSION["kullanici_adi"] = $_POST ["kullanici_adi"];
		$_SESSION ["yetki"] = $ytk;
		$_SESSION ["kullanici_id"] = $row["id"];
		echo " <p style = 'text-align : center; color: black';> Giriş Başarılı </p>" ;
		header("Location: anasayfa.php");
		return true;
		}
		else{
		echo " <p style = 'position:absolute;bottom:0;width:100%;z-index:9999;text-align : center; color: red';> Kullanıcı adı veya parola yanlış girildi </p>" ;
		return false;
		}
	}else{
		echo " <p style = 'position:absolute;bottom:0;width:100%;z-index:9999;text-align : center; color: red';> Kullanıcı adı veya parola yanlış girildi </p>" ;
		return false;
		}
}else {
	if(@$_GET["info"] == "sessiondestroyed") 
	{
	
	echo " <p style = 'position:absolute;bottom:0;width:100%;z-index:9999;text-align : center; color: green';> Başarı ile Çıkış Yaptınız </p>" ;
	}
	elseif (@$_GET["info"] == "nosession") {
	# code...
	echo " <p style = 'position:absolute;bottom:0;width:100%;z-index:9999;text-align : center; color:red';> Öncelikle giriş yapmalısınız. </p>" ;
	}
}




 ?>

</body>
</html>