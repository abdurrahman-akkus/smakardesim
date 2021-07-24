<?php
//$target_dir = "../dosyalar/";
//$target_file = $target_dir . basename($_FILES["valilik_izni"]["name"]);
//$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["valilik_izni"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
//
//// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//
//// Check file size
//if ($_FILES["valilik_izni"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["valilik_izni"]["tmp_name"], $target_file)) {
//        echo "The file ". htmlspecialchars( basename( $_FILES["valilik_izni"]["name"])). " has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}

// Bu üsk kısım farklı bir yol

error_reporting(0);
$data = $_POST['veri']; //post edilen dosya verisi
$tur = $_POST['tur'];
$cocuk = $_POST['cocuk'];
$date = new DateTime();
if (isset($data)) {
    $dir = '../dosyalar'; //dosyalarin kaydedileceği klasor yolu
    $size_limit = 5000000; //dosya boyutu en fazla kac KB boyutunda olmali
    $extension = explode('/', explode(';', $data)[0])[1]; //dosya uzantisi
    if ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg' || $extension == 'pdf') { //dosya uzantisi jped, png veya gif olmalı
        $image = file_get_contents($data); //veriyi oku
        if (strlen($image) < $size_limit) { //dosya boyutu uygunsa
            $file_name = $dir . "/". $cocuk. "-" . $tur . "-". $date->getTimestamp() . '.' . $extension; //
            $create_file = touch($file_name); //belirtilen klasöre belirtilen isimde icerigi bos bir dosya oluştur
            if ($create_file) { //dosya olusturma basarili ise
                $create_image = file_put_contents($file_name, $image); //olusturulan dosyanin içerigine resim verilerini isle, ekle
                if ($create_image) { //eklendiyse
                    $result = 'success';
                } else {
                    $result = 'error';
                }
            } else {
                $result = 'ERROR MESSAGE: Dosya oluşturulamadı';
            }
        } else {
            $result = 'ERROR MESSAGE: Dosya boyutu ' . $size_limit . ' byte\'dan küçük olmalı';
        }
    } else {
        $result = 'ERROR MESSAGE: Dosya uzantısı uygun değil';
    }
} else {
    $result = 'POST sırasında bir hata meydana geldi';
}
$dataArray = array('message' => $result, 'path' => ltrim($file_name,"../"));
echo json_encode($dataArray); //json formatında veriyi geri gönder

?>


