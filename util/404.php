<!DOCTYPE html>
<html lang="tr-TR">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex">
		<title>Sayfa Bulunamadı</title>
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body style="background-color: #dcc4ed; text-align: center;">
		<div class="logo">
			<a class="logo" href="index.php">
				<img alt="Algoritim Logo" height="60" src="img/logo.png" width="200" >
			</a>
		</div>
		
		<div style="margin: 10% auto;">
			<img src="img/404.png" alt="Sayfa Bulunamadı" width="496" height="149">
			<h2 style="color: #0b8383;">Not Found</h2>
			<h3 style="color: #0b8383;">Sayfa Bulunamadı</h3>
		</div>
		<button onclick="goBack()">Geriye Dön</button>
		
		<script>
		function goBack() {
		window.history.back();
		}
		</script>

		<style>
			@media all and (max-width: 500px){
				img {
					width: 200px;
					height: 60px;
				}
			}
		</style>
	</body>
</html>