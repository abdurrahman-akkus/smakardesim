<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$sonuc = '';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
{
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))
    {
        echo 'Lütfen boş yer bırakmayın!';
    }
    else
    {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $message = strip_tags($_POST['message']);

        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'mail.smakardesim.com';
        $mail->Port = 465;
        $mail->Username = 'sistem@smakardesim.com';
        $mail->Password = 'Sinaps++42';
        $mail->setFrom($mail->Username, 'SMA Kardeşim');
        $mail->AddAddress('iletisim@smakardesim.com', 'SMA Kardeşim');
        $mail->AddAddress('ahmedakkus.42@gmail.com', 'Ahmet AKKUŞ');
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'SMA Kardeşim';
        /*$mail->SMTPDebug = SMTP::DEBUG_SERVER; */
        $mail->isHTML(true);
        $mail->Body = '<table>
						<tr><td>İsim:</td><td>' . $_POST['name'] . '</td></tr>
						<tr><td>E-Posta:</td><td>' . $_POST['email'] . '</td></tr>
						<tr><td>Mesaj:</td><td>' . $_POST['message'] . '</td></tr></table>';

        if ($mail->Send())
        {
            $sonuc = 'Mesajınız başarıyla gönderildi.';
        }
        else
        {
            $sonuc = 'Mesaj gönderirken bir hata oluştu ve girmiş olduğunuz bilgiler alınamadı.' . $mail->ErrorInfo;
        }

    }
}
else
{
    $sonuc = 'Lütfen Formu Kullanın!';
}
return $sonuc;
?>
